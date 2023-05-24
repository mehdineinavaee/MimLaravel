<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayReturningChequeRequest;
use App\Models\PayReturningCheque;
use Illuminate\Http\Request;

class PayReturningChequeController extends Controller
{
    public function fetchPayReturningCheque()
    {
        $pay_returning_cheque = PayReturningCheque::orderBy('id', 'desc')->get();
        return response()->json([
            'pay_returning_cheque' => $pay_returning_cheque,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/pay-returning-cheque.index');
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
    public function store(PayReturningChequeRequest $request)
    {
        $pay_returning_cheque = new PayReturningCheque();
        $pay_returning_cheque->form_date = $request->input('form_date');
        $pay_returning_cheque->form_number = $request->input('form_number');
        $pay_returning_cheque->serial_number = $request->input('serial_number');
        $pay_returning_cheque->total = $request->input('total');
        $pay_returning_cheque->wage = $request->input('wage');
        $pay_returning_cheque->due_date = $request->input('due_date');
        $pay_returning_cheque->bank_account_details = $request->input('bank_account_details');
        $pay_returning_cheque->receiver = $request->input('receiver');
        $pay_returning_cheque->considerations = $request->input('considerations');
        $pay_returning_cheque->save();
        return response()->json([
            'status' => 200,
            'message' => 'برگشت چک ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(PayReturningCheque $payReturningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        if ($pay_returning_cheque) {
            return response()->json([
                'status' => 200,
                'pay_returning_cheque' => $pay_returning_cheque,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'برگشت چک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(PayReturningChequeRequest $request, $id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        if ($pay_returning_cheque) {
            $pay_returning_cheque->form_date = $request->input('form_date');
            $pay_returning_cheque->form_number = $request->input('form_number');
            $pay_returning_cheque->serial_number = $request->input('serial_number');
            $pay_returning_cheque->total = $request->input('total');
            $pay_returning_cheque->wage = $request->input('wage');
            $pay_returning_cheque->due_date = $request->input('due_date');
            $pay_returning_cheque->bank_account_details = $request->input('bank_account_details');
            $pay_returning_cheque->receiver = $request->input('receiver');
            $pay_returning_cheque->considerations = $request->input('considerations');
            $pay_returning_cheque->update();
            return response()->json([
                'status' => 200,
                'message' => 'برگشت چک ویرایش شد',
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
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        $pay_returning_cheque->delete();
        return response()->json([
            'status' => 200,
            'message' => 'برگشت چک حذف شد',
        ]);
    }
}