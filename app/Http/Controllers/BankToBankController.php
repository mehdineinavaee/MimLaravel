<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankToBankRequest;
use App\Models\BankToBank;
use Illuminate\Http\Request;

class BankToBankController extends Controller
{
    public function fetchBankToBank()
    {
        $bank_to_bank = BankToBank::orderBy('id', 'desc')->get();
        return response()->json([
            'bank_to_bank' => $bank_to_bank,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/bank-to-bank.index');
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
    public function store(BankToBankRequest $request)
    {
        $bank_to_bank = new BankToBank();
        $bank_to_bank->from_bank = $request->input('from_bank');
        $bank_to_bank->to_bank = $request->input('to_bank');
        $bank_to_bank->form_date = $request->input('form_date');
        $bank_to_bank->form_number = $request->input('form_number');
        $bank_to_bank->cash_amount = $request->input('cash_amount');
        $bank_to_bank->considerations1 = $request->input('considerations1');
        $bank_to_bank->date = $request->input('date');
        $bank_to_bank->bank_account_details = $request->input('bank_account_details');
        $bank_to_bank->deposit_amount = $request->input('deposit_amount');
        $bank_to_bank->wage = $request->input('wage');
        $bank_to_bank->issue_tracking = $request->input('issue_tracking');
        $bank_to_bank->considerations2 = $request->input('considerations2');
        $bank_to_bank->save();
        return response()->json([
            'status' => 200,
            'message' => 'از بانک به بانک جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function show(BankToBank $bankToBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_to_bank = BankToBank::find($id);
        if ($bank_to_bank) {
            return response()->json([
                'status' => 200,
                'bank_to_bank' => $bank_to_bank,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'از بانک به بانک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function update(BankToBankRequest $request, $id)
    {
        $bank_to_bank = BankToBank::find($id);
        if ($bank_to_bank) {
            $bank_to_bank->from_bank = $request->input('from_bank');
            $bank_to_bank->to_bank = $request->input('to_bank');
            $bank_to_bank->form_date = $request->input('form_date');
            $bank_to_bank->form_number = $request->input('form_number');
            $bank_to_bank->cash_amount = $request->input('cash_amount');
            $bank_to_bank->considerations1 = $request->input('considerations1');
            $bank_to_bank->date = $request->input('date');
            $bank_to_bank->bank_account_details = $request->input('bank_account_details');
            $bank_to_bank->deposit_amount = $request->input('deposit_amount');
            $bank_to_bank->wage = $request->input('wage');
            $bank_to_bank->issue_tracking = $request->input('issue_tracking');
            $bank_to_bank->considerations2 = $request->input('considerations2');
            $bank_to_bank->update();
            return response()->json([
                'status' => 200,
                'message' => 'از بانک به بانک ویرایش شد',
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
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_to_bank = BankToBank::find($id);
        $bank_to_bank->delete();
        return response()->json([
            'status' => 200,
            'message' => 'از بانک به بانک حذف شد',
        ]);
    }
}
