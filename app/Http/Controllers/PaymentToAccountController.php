<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentToAccountRequest;
use App\Models\BankAccount;
use App\Models\ChequeBook;
use App\Models\PaymentToAccount;
use App\Models\TarafHesab;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PaymentToAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_payment_to_account($row, $status, $message)
    {
        $data = PaymentToAccount::orderBy('id', 'desc')->paginate($row);

        $payment_to_accounts = '';

        $count = DB::table('payment_to_accounts')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                if ($item->deposit_amount != null) {
                    $deposit_amount = number_format($item->deposit_amount);
                } else {
                    $deposit_amount = '-';
                }

                if ($item->wage != null) {
                    $wage = number_format($item->wage);
                } else {
                    $wage = '-';
                }

                if ($item->paid_discount != null) {
                    $paid_discount = number_format($item->paid_discount);
                } else {
                    $paid_discount = '-';
                }

                $payment_to_accounts .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->taraf_hesab->fullname . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $cash_amount . ' ریال</td>
                        <td>' . $item->considerations1 . '</td>
                        <td>' . $item->payment_for . '</td>
                        <td>' . $item->date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $deposit_amount . ' ریال</td>
                        <td>' . $wage . ' ریال</td>
                        <td>' . $item->issue_tracking . '</td>
                        <td>' . $item->considerations2 . '</td>
                        <td>' . $paid_discount . ' ریال</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_payment_to_account btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/payment-to-account/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $payment_to_accounts,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_payment_to_account(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $payment_to_accounts = PaymentToAccount::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations1', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_for', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_cheque_total', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_issue_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_cheque_serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_bank_account_details', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tab2_consideration', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('deposit_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('wage', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('issue_tracking', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations2', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('paid_discount', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($payment_to_accounts) {
                foreach ($payment_to_accounts as $index => $item) {
                    if ($item->cash_amount != null) {
                        $cash_amount = number_format($item->cash_amount);
                    } else {
                        $cash_amount = '-';
                    }

                    if ($item->deposit_amount != null) {
                        $deposit_amount = number_format($item->deposit_amount);
                    } else {
                        $deposit_amount = '-';
                    }

                    if ($item->wage != null) {
                        $wage = number_format($item->wage);
                    } else {
                        $wage = '-';
                    }

                    if ($item->paid_discount != null) {
                        $paid_discount = number_format($item->paid_discount);
                    } else {
                        $paid_discount = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->taraf_hesab->fullname . '</td>
                            <td>' . $item->form_date . '</td>
                            <td>' . $item->form_number . '</td>
                            <td>' . $cash_amount . ' ریال</td>
                            <td>' . $item->considerations1 . '</td>
                            <td>' . $item->payment_for . '</td>
                            <td>' . $item->date . '</td>
                            <td>' . $item->bank_account->account_number . '</td>
                            <td>' . $deposit_amount . ' ریال</td>
                            <td>' . $wage . ' ریال</td>
                            <td>' . $item->issue_tracking . '</td>
                            <td>' . $item->considerations2 . '</td>
                            <td>' . $paid_discount . ' ریال</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_payment_to_account btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/payment-to-account/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$payment_to_accounts->links(),
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
        if (Gate::allows('payment_to_account')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_payment_to_account($row, 200, '');
            }
            $cheque_books = ChequeBook::orderBy('id', 'desc')->get();
            $taraf_hesabs = TarafHesab::all();
            $bank_accounts = BankAccount::all();
            return view('financial-management/payment-to-account.index')
                ->with('cheque_books', $cheque_books)
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
    public function store(PaymentToAccountRequest $request)
    {
        if (Gate::allows('payment_to_account')) {
            $payment_to_account = new PaymentToAccount();
            $payment_to_account->form_date = $request->input('form_date');
            $payment_to_account->form_number = $request->input('form_number');
            $payment_to_account->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $payment_to_account->considerations1 = $request->input('considerations1');
            $payment_to_account->payment_for = $request->input('payment_for');
            $payment_to_account->tab2_cheque_total = str_replace(",", "", $request->input('tab2_cheque_total'));
            $payment_to_account->tab2_issue_date = $request->input('tab2_issue_date');
            $payment_to_account->tab2_due_date = $request->input('tab2_due_date');
            $payment_to_account->tab2_cheque_serial_number = $request->input('tab2_cheque_serial_number');
            $payment_to_account->tab2_bank_account_details = $request->input('tab2_bank_account_details');
            $payment_to_account->tab2_consideration = $request->input('tab2_consideration');
            $payment_to_account->date = $request->input('date');
            $payment_to_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $payment_to_account->wage = str_replace(",", "", $request->input('wage'));
            $payment_to_account->issue_tracking = $request->input('issue_tracking');
            $payment_to_account->considerations2 = $request->input('considerations2');
            $payment_to_account->paid_discount = str_replace(",", "", $request->input('paid_discount'));
            $payment_to_account->taraf_hesab()->associate($request->taraf_hesab_name);
            $payment_to_account->bank_account()->associate($request->bank_account_details);
            $payment_to_account->save();
            $row = $request["row"];
            return self::index_fetch_payment_to_account($row, 200, 'پرداخت جدید به طرف حساب ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentToAccount $paymentToAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('payment_to_account')) {
            $payment_to_account = PaymentToAccount::find($id);
            if ($payment_to_account) {
                return response()->json([
                    'status' => 200,
                    'payment_to_account' => $payment_to_account,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'پرداخت به طرف حساب یافت نشد',
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
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentToAccountRequest $request, $id)
    {
        if (Gate::allows('payment_to_account')) {
            $payment_to_account = PaymentToAccount::find($id);
            if ($payment_to_account) {
                $payment_to_account->form_date = $request->input('form_date');
                $payment_to_account->form_number = $request->input('form_number');
                $payment_to_account->cash_amount = str_replace(",", "", $request->input('cash_amount'));
                $payment_to_account->considerations1 = $request->input('considerations1');
                $payment_to_account->payment_for = $request->input('payment_for');
                $payment_to_account->tab2_cheque_total = str_replace(",", "", $request->input('tab2_cheque_total'));
                $payment_to_account->tab2_issue_date = $request->input('tab2_issue_date');
                $payment_to_account->tab2_due_date = $request->input('tab2_due_date');
                $payment_to_account->tab2_cheque_serial_number = $request->input('tab2_cheque_serial_number');
                $payment_to_account->tab2_bank_account_details = $request->input('tab2_bank_account_details');
                $payment_to_account->tab2_consideration = $request->input('tab2_consideration');
                $payment_to_account->date = $request->input('date');
                $payment_to_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
                $payment_to_account->wage = str_replace(",", "", $request->input('wage'));
                $payment_to_account->issue_tracking = $request->input('issue_tracking');
                $payment_to_account->considerations2 = $request->input('considerations2');
                $payment_to_account->paid_discount = str_replace(",", "", $request->input('paid_discount'));
                $payment_to_account->taraf_hesab()->associate($request->taraf_hesab_name);
                $payment_to_account->bank_account()->associate($request->bank_account_details);
                $payment_to_account->update();
                $row = $request["row"];
                return self::index_fetch_payment_to_account($row, 200, 'پرداخت به طرف حساب ویرایش شد');
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
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('payment_to_account')) {
            $payment_to_account = PaymentToAccount::find($id);
            $payment_to_account->delete();
            return self::index_fetch_payment_to_account(10, 200, 'پرداخت به طرف حساب حذف شد');
        } else {
            return abort(401);
        }
    }
}
