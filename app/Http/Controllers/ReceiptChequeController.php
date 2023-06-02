<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptChequeRequest;
use App\Models\ReceiptCheque;
use Illuminate\Http\Request;

class ReceiptChequeController extends Controller
{
    public function fetchData()
    {
        $receipt_cheque = ReceiptCheque::orderBy('id', 'desc')->get();
        return response()->json([
            'receipt_cheque' => $receipt_cheque,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/receipt-cheque.index');
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
    public function store(ReceiptChequeRequest $request)
    {
        $receipt_cheque = new ReceiptCheque();
        $receipt_cheque->form_date = $request->input('form_date');
        $receipt_cheque->form_number = $request->input('form_number');
        $receipt_cheque->serial_number = $request->input('serial_number');
        $receipt_cheque->total = $request->input('total');
        $receipt_cheque->due_date = $request->input('due_date');
        $receipt_cheque->bank_account_details = $request->input('bank_account_details');
        $receipt_cheque->receiver = $request->input('receiver');
        $receipt_cheque->considerations = $request->input('considerations');
        $receipt_cheque->save();
        return response()->json([
            'status' => 200,
            'message' => 'اعلام وصول چک ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptCheque $receiptCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        if ($receipt_cheque) {
            return response()->json([
                'status' => 200,
                'receipt_cheque' => $receipt_cheque,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اعلام وصول چک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptChequeRequest $request, $id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        if ($receipt_cheque) {
            $receipt_cheque->form_date = $request->input('form_date');
            $receipt_cheque->form_number = $request->input('form_number');
            $receipt_cheque->serial_number = $request->input('serial_number');
            $receipt_cheque->total = $request->input('total');
            $receipt_cheque->due_date = $request->input('due_date');
            $receipt_cheque->bank_account_details = $request->input('bank_account_details');
            $receipt_cheque->receiver = $request->input('receiver');
            $receipt_cheque->considerations = $request->input('considerations');
            $receipt_cheque->update();
            return response()->json([
                'status' => 200,
                'message' => 'اعلام وصول چک ویرایش شد',
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
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        $receipt_cheque->delete();
        return response()->json([
            'status' => 200,
            'message' => 'اعلام وصول چک حذف شد',
        ]);
    }
}
