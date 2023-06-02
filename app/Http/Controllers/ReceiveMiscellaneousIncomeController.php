<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveMiscellaneousIncomeRequest;
use App\Models\ReceiveMiscellaneousIncome;
use Illuminate\Http\Request;

class ReceiveMiscellaneousIncomeController extends Controller
{
    public function fetchData()
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::orderBy('id', 'desc')->get();
        return response()->json([
            'receive_miscellaneous_income' => $receive_miscellaneous_income,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/receive-miscellaneous-income.index');
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
    public function store(ReceiveMiscellaneousIncomeRequest $request)
    {
        $receive_miscellaneous_income = new ReceiveMiscellaneousIncome();
        $receive_miscellaneous_income->income_title = $request->input('income_title');
        $receive_miscellaneous_income->form_date = $request->input('form_date');
        $receive_miscellaneous_income->form_number = $request->input('form_number');
        $receive_miscellaneous_income->cash_amount = $request->input('cash_amount');
        $receive_miscellaneous_income->considerations1 = $request->input('considerations1');
        $receive_miscellaneous_income->date = $request->input('date');
        $receive_miscellaneous_income->bank_account_details = $request->input('bank_account_details');
        $receive_miscellaneous_income->deposit_amount = $request->input('deposit_amount');
        $receive_miscellaneous_income->wage = $request->input('wage');
        $receive_miscellaneous_income->issue_tracking = $request->input('issue_tracking');
        $receive_miscellaneous_income->considerations2 = $request->input('considerations2');
        $receive_miscellaneous_income->save();
        return response()->json([
            'status' => 200,
            'message' => 'دریافت درآمد متفرقه جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        if ($receive_miscellaneous_income) {
            return response()->json([
                'status' => 200,
                'receive_miscellaneous_income' => $receive_miscellaneous_income,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'دریافت درآمد متفرقه یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveMiscellaneousIncomeRequest $request, $id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        if ($receive_miscellaneous_income) {
            $receive_miscellaneous_income->income_title = $request->input('income_title');
            $receive_miscellaneous_income->form_date = $request->input('form_date');
            $receive_miscellaneous_income->form_number = $request->input('form_number');
            $receive_miscellaneous_income->cash_amount = $request->input('cash_amount');
            $receive_miscellaneous_income->considerations1 = $request->input('considerations1');
            $receive_miscellaneous_income->date = $request->input('date');
            $receive_miscellaneous_income->bank_account_details = $request->input('bank_account_details');
            $receive_miscellaneous_income->deposit_amount = $request->input('deposit_amount');
            $receive_miscellaneous_income->wage = $request->input('wage');
            $receive_miscellaneous_income->issue_tracking = $request->input('issue_tracking');
            $receive_miscellaneous_income->considerations2 = $request->input('considerations2');
            $receive_miscellaneous_income->update();
            return response()->json([
                'status' => 200,
                'message' => 'دریافت درآمد متفرقه ویرایش شد',
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
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        $receive_miscellaneous_income->delete();
        return response()->json([
            'status' => 200,
            'message' => 'دریافت درآمد متفرقه حذف شد',
        ]);
    }
}
