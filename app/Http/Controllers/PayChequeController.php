<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayChequeRequest;
use App\Models\BankAccount;
use App\Models\PayCheque;
use App\Models\TarafHesab;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PayChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_pay_cheque($row, $status, $message)
    {
        $data = PayCheque::orderBy('id', 'desc')->paginate($row);

        $pay_cheques = '';

        $count = DB::table('pay_cheques')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $pay_cheques .=
                    '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->serial_number . '</td>
                            <td>' . number_format($item->amount) . '</td>
                            <td>' . $item->due_date . '</td>
                            <td>' . $item->bank_account->account_number . '</td>
                            <td>' . $item->receiver->fullname . '</td>

                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_pay_cheques btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/pay-cheques/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $pay_cheques,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_pay_cheque(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $pay_cheques = PayCheque::where('amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('issue_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($pay_cheques) {
                foreach ($pay_cheques as $index => $item) {
                    $search .=
                        '
                            <tr>
                                <td>' . $index + 1 . '</td>
                                <td>' . $item->serial_number . '</td>
                                <td>' . number_format($item->amount) . '</td>
                                <td>' . $item->due_date . '</td>
                                <td>' . $item->bank_account->account_number . '</td>
                                <td>' . $item->receiver->fullname . '</td>

                                <td>
                                    <button type="button" value=' . $item->id . ' class="edit_pay_cheques btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/pay-cheques/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                        <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$pay_cheques->links(),
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
        if (Gate::allows('pay_cheques')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_pay_cheque($row, 200, '');
            }
            $taraf_hesabs = TarafHesab::all();
            $bank_accounts = BankAccount::all();
            return view('first-period/pay-cheques.index')
                ->with('taraf_hesabs', $taraf_hesabs)
                ->with('bank_accounts', $bank_accounts);
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
    public function store(PayChequeRequest $request)
    {
        if (Gate::allows('pay_cheques')) {
            $pay_cheques = new PayCheque();
            $pay_cheques->amount = str_replace(",", "", $request->input('amount'));
            $pay_cheques->issue_date = $request->input('issue_date');
            $pay_cheques->due_date = $request->input('due_date');
            $pay_cheques->serial_number = $request->input('serial_number');
            $pay_cheques->considerations = $request->input('considerations');
            $pay_cheques->receiver()->associate($request->receiver);
            $pay_cheques->bank_account()->associate($request->bank_account_details);
            $pay_cheques->save();
            $row = $request["row"];
            return self::index_fetch_pay_cheque($row, 200, 'چک پرداختی اول دوره ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function show(PayCheque $payCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('pay_cheques')) {
            $pay_cheque = PayCheque::find($id);
            if ($pay_cheque) {
                return response()->json([
                    'status' => 200,
                    'pay_cheque' => $pay_cheque,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'چک پرداختی اول دوره یافت نشد',
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
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function update(PayChequeRequest $request, $id)
    {
        if (Gate::allows('pay_cheques')) {
            $pay_cheques = PayCheque::find($id);
            if ($pay_cheques) {
                $pay_cheques->amount = str_replace(",", "", $request->input('amount'));
                $pay_cheques->issue_date = $request->input('issue_date');
                $pay_cheques->due_date = $request->input('due_date');
                $pay_cheques->serial_number = $request->input('serial_number');
                $pay_cheques->considerations = $request->input('considerations');
                $pay_cheques->receiver()->associate($request->receiver);
                $pay_cheques->bank_account()->associate($request->bank_account_details);
                $pay_cheques->update();
                $row = $request["row"];
                return self::index_fetch_pay_cheque($row, 200, 'چک پرداختی اول دوره ویرایش شد');
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
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('pay_cheques')) {
            $pay_cheque = PayCheque::find($id);
            $pay_cheque->delete();
            return self::index_fetch_pay_cheque(10, 200, 'چک پرداختی اول دوره حذف شد');
        } else {
            return abort(401);
        }
    }
}
