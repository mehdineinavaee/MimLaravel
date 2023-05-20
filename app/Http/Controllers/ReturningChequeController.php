<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturningChequeRequest;
use App\Models\ReturningCheque;
use Illuminate\Http\Request;

class ReturningChequeController extends Controller
{
    public function fetchReturningCheque()
    {
        $returning_cheque = ReturningCheque::orderBy('id', 'desc')->get();
        return response()->json([
            'returning_cheque' => $returning_cheque,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/returning-cheque.index');
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
    public function store(ReturningChequeRequest $request)
    {
        $returning_cheque = new ReturningCheque();
        $returning_cheque->form_date = $request->input('form_date');
        $returning_cheque->form_number = $request->input('form_number');
        $returning_cheque->mark_back = $request->input('mark_back');
        $returning_cheque->serial_number = $request->input('serial_number');
        $returning_cheque->total = $request->input('total');
        $returning_cheque->due_date = $request->input('due_date');
        $returning_cheque->bank_account_details = $request->input('bank_account_details');
        $returning_cheque->payer = $request->input('payer');
        $returning_cheque->considerations = $request->input('considerations');
        $returning_cheque->save();
        return response()->json([
            'status' => 200,
            'message' => 'برگشت چک ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $returning_cheque = ReturningCheque::find($id);
        if ($returning_cheque) {
            return response()->json([
                'status' => 200,
                'returning_cheque' => $returning_cheque,
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReturningChequeRequest $request, $id)
    {
        $returning_cheque = ReturningCheque::find($id);
        if ($returning_cheque) {
            $returning_cheque->form_date = $request->input('form_date');
            $returning_cheque->form_number = $request->input('form_number');
            $returning_cheque->mark_back = $request->input('mark_back');
            $returning_cheque->serial_number = $request->input('serial_number');
            $returning_cheque->total = $request->input('total');
            $returning_cheque->due_date = $request->input('due_date');
            $returning_cheque->bank_account_details = $request->input('bank_account_details');
            $returning_cheque->payer = $request->input('payer');
            $returning_cheque->considerations = $request->input('considerations');
            $returning_cheque->update();
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $returning_cheque = ReturningCheque::find($id);
        $returning_cheque->delete();
        return response()->json([
            'status' => 200,
            'message' => 'برگشت چک حذف شد',
        ]);
    }
}
