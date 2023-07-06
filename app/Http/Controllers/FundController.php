<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundRequest;
use App\Models\Fund;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_fund($row, $status, $message)
    {
        $data = Fund::orderBy('id', 'desc')->paginate($row);

        $funds = '';

        $count = DB::table('funds')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                switch ($item->form_type) {
                    case ('1'):
                        $form_type = 'درآمد';
                        break;
                    case ('2'):
                        $form_type = 'هزینه';
                        break;
                    case ('3'):
                        $form_type = 'صندوق';
                        break;
                    default:
                        $form_type = '-';
                }

                $funds .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $form_type . '</td>
                        <td>' . $item->daramad_code . '</td>
                        <td>' . $item->daramad_name . '</td>
                        <td>' . $item->chk_system . '</td>
                        <td>' . $item->chk_active . '</td>

                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_fund btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/fund/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $funds,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_fund(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $funds = Fund::where('daramad_code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('daramad_name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($funds) {
                foreach ($funds as $index => $item) {
                    switch ($item->form_type) {
                        case ('1'):
                            $form_type = 'درآمد';
                            break;
                        case ('2'):
                            $form_type = 'هزینه';
                            break;
                        case ('3'):
                            $form_type = 'صندوق';
                            break;
                        default:
                            $form_type = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $form_type . '</td>
                            <td>' . $item->daramad_code . '</td>
                            <td>' . $item->daramad_name . '</td>
                            <td>' . $item->chk_system . '</td>
                            <td>' . $item->chk_active . '</td>
    
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_fund btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/fund/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$funds->links(),
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
        if (Gate::allows('fund')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_fund($row, 200, '');
            }
            return view('taarife-payeh/fund.index');
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
    public function store(FundRequest $request)
    {
        if (Gate::allows('fund')) {
            $fund = new Fund();
            $fund->chk_system = $request->chk_system;
            $fund->chk_active = $request->chk_active;
            $fund->form_type = $request->input('form_type');
            $fund->daramad_code = $request->input('daramad_code');
            $fund->daramad_name = $request->input('daramad_name');
            $fund->save();
            $row = $request["row"];
            return self::index_fetch_fund($row, 200, 'درآمد، هزینه، صندوق جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('fund')) {
            $fund = Fund::find($id);
            if ($fund) {
                return response()->json([
                    'status' => 200,
                    'fund' => $fund,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'درآمد، هزینه، صندوق یافت نشد',
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
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('fund')) {
            $fund = Fund::find($id);
            if ($fund) {
                $fund->chk_system = $request->chk_system;
                $fund->chk_active = $request->chk_active;
                $fund->form_type = $request->input('form_type');
                $fund->daramad_code = $request->input('daramad_code');
                $fund->daramad_name = $request->input('daramad_name');
                $fund->update();
                $row = $request["row"];
                return self::index_fetch_fund($row, 200, 'درآمد، هزینه، صندوق ویرایش شد');
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
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('fund')) {
            $fund = Fund::find($id);
            $fund->delete();
            return self::index_fetch_fund(10, 200, 'درآمد، هزینه، صندوق حذف شد');
        } else {
            return abort(401);
        }
    }
}
