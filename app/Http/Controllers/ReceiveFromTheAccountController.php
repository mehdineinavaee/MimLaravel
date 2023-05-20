<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveFromTheAccountRequest;
use App\Models\ReceiveFromTheAccount;
use Illuminate\Http\Request;

class ReceiveFromTheAccountController extends Controller
{
    public function fetchReceiveFromTheAccount()
    {
        $receive_from_the_accounts = ReceiveFromTheAccount::orderBy('id', 'desc')->get();
        return response()->json([
            'receive_from_the_accounts' => $receive_from_the_accounts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/receive-from-the-account.index');
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
    public function store(ReceiveFromTheAccountRequest $request)
    {
        $receive_from_the_account = new ReceiveFromTheAccount();
        $receive_from_the_account->taraf_hesab_name = $request->input('taraf_hesab_name');
        $receive_from_the_account->form_date = $request->input('form_date');
        $receive_from_the_account->form_number = $request->input('form_number');
        $receive_from_the_account->cash_amount = $request->input('cash_amount');
        $receive_from_the_account->considerations1 = $request->input('considerations1');
        $receive_from_the_account->date = $request->input('date');
        $receive_from_the_account->bank_account_details = $request->input('bank_account_details');
        $receive_from_the_account->deposit_amount = $request->input('deposit_amount');
        $receive_from_the_account->wage = $request->input('wage');
        $receive_from_the_account->issue_tracking = $request->input('issue_tracking');
        $receive_from_the_account->considerations2 = $request->input('considerations2');
        $receive_from_the_account->paid_discount = $request->input('paid_discount');
        $receive_from_the_account->save();
        return response()->json([
            'status' => 200,
            'message' => 'دریافت جدید از طرف حساب ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveFromTheAccount $receiveFromTheAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receive_from_the_account = ReceiveFromTheAccount::find($id);
        if ($receive_from_the_account) {
            return response()->json([
                'status' => 200,
                'receive_from_the_account' => $receive_from_the_account,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'دریافت از طرف حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveFromTheAccountRequest $request, $id)
    {
        $receive_from_the_account = ReceiveFromTheAccount::find($id);
        if ($receive_from_the_account) {
            $receive_from_the_account->taraf_hesab_name = $request->input('taraf_hesab_name');
            $receive_from_the_account->form_date = $request->input('form_date');
            $receive_from_the_account->form_number = $request->input('form_number');
            $receive_from_the_account->cash_amount = $request->input('cash_amount');
            $receive_from_the_account->considerations1 = $request->input('considerations1');
            $receive_from_the_account->date = $request->input('date');
            $receive_from_the_account->bank_account_details = $request->input('bank_account_details');
            $receive_from_the_account->deposit_amount = $request->input('deposit_amount');
            $receive_from_the_account->wage = $request->input('wage');
            $receive_from_the_account->issue_tracking = $request->input('issue_tracking');
            $receive_from_the_account->considerations2 = $request->input('considerations2');
            $receive_from_the_account->paid_discount = $request->input('paid_discount');
            $receive_from_the_account->update();
            return response()->json([
                'status' => 200,
                'message' => 'دریافت از طرف حساب ویرایش شد',
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
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receive_from_the_account = ReceiveFromTheAccount::find($id);
        $receive_from_the_account->delete();
        return response()->json([
            'status' => 200,
            'message' => 'دریافت از طرف حساب حذف شد',
        ]);
    }
}
