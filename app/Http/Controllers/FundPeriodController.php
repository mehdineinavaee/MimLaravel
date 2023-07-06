<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundPeriodRequest;
use App\Models\Fund;
use App\Models\FundPeriod;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FundPeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_fund_period($row, $status, $message)
    {
        $data = FundPeriod::orderBy('id', 'desc')->paginate($row);

        $fund_periods = '';

        $count = DB::table('fund_periods')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $fund_periods .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->fund->daramad_name . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_fund_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/fund-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
            }
            return response()->json([
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $fund_periods,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_fund_period(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $fund_periods = FundPeriod::where('amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($fund_periods) {
                foreach ($fund_periods as $index => $item) {
                    $search .=
                        '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->fund->daramad_name . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_fund_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/fund-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$fund_periods->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('fund_period')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_fund_period($row, 200, '');
            }
            $funds = Fund::where('chk_active', '=', 'فعال')->where('form_type', '=', '3')->get();
            return view('first-period/fund-period.index')
                ->with('funds', $funds);
        } else {
            return abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FundPeriodRequest $request)
    {
        if (Gate::allows('fund_period')) {
            $fund_period = new FundPeriod();
            $fund_period->amount = str_replace(",", "", $request->input('amount'));
            $fund_period->considerations = $request->input('considerations');
            $fund_period->fund()->associate($request->fund);
            $fund_period->save();
            $row = $request["row"];
            return self::index_fetch_fund_period($row, 200, 'اول دوره صندوق ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(FundPeriod $fundPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('fund_period')) {
            $fund_period = FundPeriod::find($id);
            if ($fund_period) {
                return response()->json([
                    'status' => 200,
                    'fund_period' => $fund_period,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اول دوره صندوق یافت نشد',
                ]);
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(FundPeriodRequest $request, $id)
    {
        if (Gate::allows('fund_period')) {
            $fund_period = FundPeriod::find($id);
            if ($fund_period) {
                $fund_period->amount = str_replace(",", "", $request->input('amount'));
                $fund_period->considerations = $request->input('considerations');
                $fund_period->fund()->associate($request->fund);
                $fund_period->update();
                $row = $request["row"];
                return self::index_fetch_fund_period($row, 200, 'اول دوره صندوق ویرایش شد');
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اطلاعاتی یافت نشد',
                ]);
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('fund_period')) {
            $fund_period = FundPeriod::find($id);
            $fund_period->delete();
            return self::index_fetch_fund_period(10, 200, 'اول دوره صندوق حذف شد');
        } else {
            return abort(401);
        }
    }
}
