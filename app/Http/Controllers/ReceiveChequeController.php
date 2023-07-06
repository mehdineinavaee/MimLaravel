<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveChequeRequest;
use App\Models\ReceiveCheque;
use App\Models\TarafHesab;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReceiveChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_receive_cheque($row, $status, $message)
    {
        $data = ReceiveCheque::orderBy('id', 'desc')->paginate($row);

        $receive_cheques = '';

        $count = DB::table('receive_cheques')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $receive_cheques .=
                    '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>POSHT NOMREH</td>
                            <td>' . $item->serial_number . '</td>
                            <td>' . number_format($item->amount) . '</td>
                            <td>' . $item->due_date . '</td>
                            <td>MOSHAKHASAT</td>

                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_receive_cheques btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/receive-cheques/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $receive_cheques,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_receive_cheque(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $receive_cheques = ReceiveCheque::where('amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('issue_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('bank_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('account_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($receive_cheques) {
                foreach ($receive_cheques as $index => $item) {
                    $search .=
                        '
                            <tr>
                                <td>' . $index + 1 . '</td>
                                <td>POSHT NOMREH</td>
                                <td>' . $item->serial_number . '</td>
                                <td>' . number_format($item->amount) . '</td>
                                <td>' . $item->due_date . '</td>
                                <td>MOSHAKHASAT</td>

                                <td>
                                    <button type="button" value=' . $item->id . ' class="edit_receive_cheques btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/receive-cheques/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                        <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$receive_cheques->links(),
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
        if (Gate::allows('receive_cheques')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_receive_cheque($row, 200, '');
            }
            $taraf_hesabs = TarafHesab::all();
            return view('first-period/receive-cheques.index')
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
    public function store(ReceiveChequeRequest $request)
    {
        if (Gate::allows('receive_cheques')) {
            $receive_cheques = new ReceiveCheque();
            $receive_cheques->amount = str_replace(",", "", $request->input('amount'));
            $receive_cheques->issue_date = $request->input('issue_date');
            $receive_cheques->due_date = $request->input('due_date');
            $receive_cheques->serial_number = $request->input('serial_number');
            $receive_cheques->bank_name = $request->input('bank_name');
            $receive_cheques->account_number = $request->input('account_number');
            $receive_cheques->considerations = $request->input('considerations');
            $receive_cheques->payer()->associate($request->payer);
            $receive_cheques->save();
            $row = $request["row"];
            return self::index_fetch_receive_cheque($row, 200, 'چک دریافتی اول دوره ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveCheque $receiveCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('receive_cheques')) {
            $receive_cheque = ReceiveCheque::find($id);
            if ($receive_cheque) {
                return response()->json([
                    'status' => 200,
                    'receive_cheque' => $receive_cheque,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'چک دریافتی اول دوره یافت نشد',
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
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveChequeRequest $request, $id)
    {
        if (Gate::allows('receive_cheques')) {
            $receive_cheques = ReceiveCheque::find($id);
            if ($receive_cheques) {
                $receive_cheques->amount = str_replace(",", "", $request->input('amount'));
                $receive_cheques->issue_date = $request->input('issue_date');
                $receive_cheques->due_date = $request->input('due_date');
                $receive_cheques->serial_number = $request->input('serial_number');
                $receive_cheques->bank_name = $request->input('bank_name');
                $receive_cheques->account_number = $request->input('account_number');
                $receive_cheques->considerations = $request->input('considerations');
                $receive_cheques->payer()->associate($request->payer);
                $receive_cheques->update();
                $row = $request["row"];
                return self::index_fetch_receive_cheque($row, 200, 'چک دریافتی اول دوره ویرایش شد');
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
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('receive_cheques')) {
            $receive_cheque = ReceiveCheque::find($id);
            $receive_cheque->delete();
            return self::index_fetch_receive_cheque(10, 200, 'چک دریافتی اول دوره حذف شد');
        } else {
            return abort(401);
        }
    }
}
