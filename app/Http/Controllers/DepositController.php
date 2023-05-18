<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function fetchDeposit()
    {
        $deposits = Deposit::orderBy('id', 'desc')->get();
        return response()->json([
            'deposits' => $deposits,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/deposit.index');
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
    public function store(DepositRequest $request)
    {
        $deposit = new Deposit();
        $deposit->form_number = $request->input('form_number');
        $deposit->form_date = $request->input('form_date');
        $deposit->place = $request->input('place');
        $deposit->mark_back = $request->input('mark_back');
        $deposit->serial_number = $request->input('serial_number');
        $deposit->total = $request->input('total');
        $deposit->due_date = $request->input('due_date');
        $deposit->bank_account_details = $request->input('bank_account_details');
        $deposit->payer = $request->input('payer');
        $deposit->save();
        return response()->json([
            'status' => 200,
            'message' => 'خواباندن چک به حساب ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit) {
            return response()->json([
                'status' => 200,
                'deposit' => $deposit,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'خواباندن چک به حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(DepositRequest $request, $id)
    {
        $deposit = Deposit::find($id);
        if ($deposit) {
            $deposit->form_number = $request->input('form_number');
            $deposit->form_date = $request->input('form_date');
            $deposit->place = $request->input('place');
            $deposit->mark_back = $request->input('mark_back');
            $deposit->serial_number = $request->input('serial_number');
            $deposit->total = $request->input('total');
            $deposit->due_date = $request->input('due_date');
            $deposit->bank_account_details = $request->input('bank_account_details');
            $deposit->payer = $request->input('payer');
            $deposit->update();
            return response()->json([
                'status' => 200,
                'message' => 'خواباندن چک به حساب ویرایش شد',
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
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit = Deposit::find($id);
        $deposit->delete();
        return response()->json([
            'status' => 200,
            'message' => 'خواباندن چک به حساب حذف شد',
        ]);
    }
}
