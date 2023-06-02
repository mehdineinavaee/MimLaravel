<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentToAccountRequest;
use App\Models\ChequeBook;
use App\Models\PaymentToAccount;
use Illuminate\Http\Request;

class PaymentToAccountController extends Controller
{
    public function fetchData()
    {
        $payment_to_accounts = PaymentToAccount::orderBy('id', 'desc')->get();
        return response()->json([
            'payment_to_accounts' => $payment_to_accounts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheque_books = ChequeBook::orderBy('id', 'desc')->get();
        return view('financial-management/payment-to-account.index')
            ->with('cheque_books', $cheque_books);
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
        $payment_to_account = new PaymentToAccount();
        $payment_to_account->taraf_hesab_name = $request->input('taraf_hesab_name');
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
        $payment_to_account->bank_account_details = $request->input('bank_account_details');
        $payment_to_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
        $payment_to_account->wage = str_replace(",", "", $request->input('wage'));
        $payment_to_account->issue_tracking = $request->input('issue_tracking');
        $payment_to_account->considerations2 = $request->input('considerations2');
        $payment_to_account->paid_discount = $request->input('paid_discount');
        $payment_to_account->save();
        return response()->json([
            'status' => 200,
            'message' => 'پرداخت جدید به طرف حساب ذخیره شد',
        ]);
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
        $payment_to_account = PaymentToAccount::find($id);
        if ($payment_to_account) {
            $payment_to_account->cash_amount = number_format($payment_to_account->cash_amount);
            $payment_to_account->tab2_cheque_total = number_format($payment_to_account->tab2_cheque_total);
            $payment_to_account->deposit_amount = number_format($payment_to_account->deposit_amount);
            $payment_to_account->wage = number_format($payment_to_account->wage);
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
        $payment_to_account = PaymentToAccount::find($id);
        if ($payment_to_account) {
            $payment_to_account->taraf_hesab_name = $request->input('taraf_hesab_name');
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
            $payment_to_account->bank_account_details = $request->input('bank_account_details');
            $payment_to_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $payment_to_account->wage = str_replace(",", "", $request->input('wage'));
            $payment_to_account->issue_tracking = $request->input('issue_tracking');
            $payment_to_account->considerations2 = $request->input('considerations2');
            $payment_to_account->paid_discount = $request->input('paid_discount');
            $payment_to_account->update();
            return response()->json([
                'status' => 200,
                'message' => 'پرداخت به طرف حساب ویرایش شد',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
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
        $payment_to_account = PaymentToAccount::find($id);
        $payment_to_account->delete();
        return response()->json([
            'status' => 200,
            'message' => 'پرداخت به طرف حساب حذف شد',
        ]);
    }
}
