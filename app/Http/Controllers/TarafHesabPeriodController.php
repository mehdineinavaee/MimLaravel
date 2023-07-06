<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabPeriodRequest;
use App\Models\TarafHesab;
use App\Models\TarafHesabPeriod;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TarafHesabPeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_taraf_hesab_period($row, $status, $message)
    {
        $data = TarafHesabPeriod::orderBy('id', 'desc')->paginate($row);

        $taraf_hesab_periods = '';

        $count = DB::table('taraf_hesab_periods')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $taraf_hesab_periods .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->taraf_hesab->fullname . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->opt_debtor . '</td>
                        <td>' . $item->opt_creditor . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_taraf_hesab_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/taraf-hesab-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $taraf_hesab_periods,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_taraf_hesab_period(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $taraf_hesab_periods = TarafHesabPeriod::where('amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($taraf_hesab_periods) {
                foreach ($taraf_hesab_periods as $index => $item) {
                    $search .=
                        '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->taraf_hesab->fullname . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->opt_debtor . '</td>
                        <td>' . $item->opt_creditor . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_taraf_hesab_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/taraf-hesab-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$taraf_hesab_periods->links(),
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
        if (Gate::allows('taraf_hesab_period')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_taraf_hesab_period($row, 200, '');
            }
            $taraf_hesabs = TarafHesab::all();
            return view('first-period/taraf-hesab-period.index')
                ->with('taraf_hesabs', $taraf_hesabs);
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
    public function store(TarafHesabPeriodRequest $request)
    {
        if (Gate::allows('taraf_hesab_period')) {
            $taraf_hesab_period = new TarafHesabPeriod();
            $taraf_hesab_period->amount = str_replace(",", "", $request->input('amount'));
            $taraf_hesab_period->opt_debtor = $request->input('opt_debtor');
            $taraf_hesab_period->opt_creditor = $request->input('opt_creditor');
            $taraf_hesab_period->considerations = $request->input('considerations');
            $taraf_hesab_period->taraf_hesab()->associate($request->taraf_hesab);
            $taraf_hesab_period->save();
            $row = $request["row"];
            return self::index_fetch_taraf_hesab_period($row, 200, 'اول دوره طرف حساب ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabPeriod $tarafHesabPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('taraf_hesab_period')) {
            $taraf_hesab_period = TarafHesabPeriod::find($id);
            if ($taraf_hesab_period) {
                return response()->json([
                    'status' => 200,
                    'taraf_hesab_period' => $taraf_hesab_period,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اول دوره طرف حساب یافت نشد',
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
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(TarafHesabPeriodRequest $request, $id)
    {
        if (Gate::allows('taraf_hesab_period')) {
            $taraf_hesab_period = TarafHesabPeriod::find($id);
            if ($taraf_hesab_period) {
                $taraf_hesab_period->amount = str_replace(",", "", $request->input('amount'));
                $taraf_hesab_period->opt_debtor = $request->input('opt_debtor');
                $taraf_hesab_period->opt_creditor = $request->input('opt_creditor');
                $taraf_hesab_period->considerations = $request->input('considerations');
                $taraf_hesab_period->taraf_hesab()->associate($request->taraf_hesab);
                $taraf_hesab_period->update();
                $row = $request["row"];
                return self::index_fetch_taraf_hesab_period($row, 200, 'اول دوره طرف حساب ویرایش شد');
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
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('taraf_hesab_period')) {
            $taraf_hesab_period = TarafHesabPeriod::find($id);
            $taraf_hesab_period->delete();
            return self::index_fetch_taraf_hesab_period(10, 200, 'اول دوره طرف حساب حذف شد');
        } else {
            return abort(401);
        }
    }
}
