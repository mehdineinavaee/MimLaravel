<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankToFundRequest;
use App\Models\BankToFund;
use Illuminate\Http\Request;

class BankToFundController extends Controller
{
    public function fetchData()
    {
        $bank_to_fund = BankToFund::orderBy('id', 'desc')->get();
        return response()->json([
            'bank_to_fund' => $bank_to_fund,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/bank-to-fund.index');
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
    public function store(BankToFundRequest $request)
    {
        $bank_to_fund = new BankToFund();
        $bank_to_fund->bank = $request->input('bank');
        $bank_to_fund->form_date = $request->input('form_date');
        $bank_to_fund->form_number = $request->input('form_number');
        $bank_to_fund->cash_amount = $request->input('cash_amount');
        $bank_to_fund->considerations1 = $request->input('considerations1');
        $bank_to_fund->date = $request->input('date');
        $bank_to_fund->bank_account_details = $request->input('bank_account_details');
        $bank_to_fund->deposit_amount = $request->input('deposit_amount');
        $bank_to_fund->wage = $request->input('wage');
        $bank_to_fund->issue_tracking = $request->input('issue_tracking');
        $bank_to_fund->considerations2 = $request->input('considerations2');
        $bank_to_fund->save();
        return response()->json([
            'status' => 200,
            'message' => 'از بانک به صندوق جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function show(BankToFund $bankToFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_to_fund = BankToFund::find($id);
        if ($bank_to_fund) {
            return response()->json([
                'status' => 200,
                'bank_to_fund' => $bank_to_fund,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'از بانک به صندوق یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function update(BankToFundRequest $request, $id)
    {
        $bank_to_fund = BankToFund::find($id);
        if ($bank_to_fund) {
            $bank_to_fund->bank = $request->input('bank');
            $bank_to_fund->form_date = $request->input('form_date');
            $bank_to_fund->form_number = $request->input('form_number');
            $bank_to_fund->cash_amount = $request->input('cash_amount');
            $bank_to_fund->considerations1 = $request->input('considerations1');
            $bank_to_fund->date = $request->input('date');
            $bank_to_fund->bank_account_details = $request->input('bank_account_details');
            $bank_to_fund->deposit_amount = $request->input('deposit_amount');
            $bank_to_fund->wage = $request->input('wage');
            $bank_to_fund->issue_tracking = $request->input('issue_tracking');
            $bank_to_fund->considerations2 = $request->input('considerations2');
            $bank_to_fund->update();
            return response()->json([
                'status' => 200,
                'message' => 'از بانک به صندوق ویرایش شد',
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
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_to_fund = BankToFund::find($id);
        $bank_to_fund->delete();
        return response()->json([
            'status' => 200,
            'message' => 'از بانک به صندوق حذف شد',
        ]);
    }
}
