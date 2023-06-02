<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\Pay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function fetchData()
    {
        $pay = Pay::orderBy('id', 'desc')->get();
        return response()->json([
            'pay' => $pay,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/pay.index');
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
    public function store(PayRequest $request)
    {
        $pay = new Pay();
        $pay->cost_title = $request->input('cost_title');
        $pay->form_date = $request->input('form_date');
        $pay->form_number = $request->input('form_number');
        $pay->cash_amount = $request->input('cash_amount');
        $pay->considerations1 = $request->input('considerations1');
        $pay->date = $request->input('date');
        $pay->bank_account_details = $request->input('bank_account_details');
        $pay->deposit_amount = $request->input('deposit_amount');
        $pay->wage = $request->input('wage');
        $pay->issue_tracking = $request->input('issue_tracking');
        $pay->considerations2 = $request->input('considerations2');
        $pay->paid_discount = $request->input('paid_discount');
        $pay->save();
        return response()->json([
            'status' => 200,
            'message' => 'پرداخت هزینه جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay = Pay::find($id);
        if ($pay) {
            return response()->json([
                'status' => 200,
                'pay' => $pay,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'پرداخت هزینه یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(PayRequest $request, $id)
    {
        $pay = Pay::find($id);
        if ($pay) {
            $pay->cost_title = $request->input('cost_title');
            $pay->form_date = $request->input('form_date');
            $pay->form_number = $request->input('form_number');
            $pay->cash_amount = $request->input('cash_amount');
            $pay->considerations1 = $request->input('considerations1');
            $pay->date = $request->input('date');
            $pay->bank_account_details = $request->input('bank_account_details');
            $pay->deposit_amount = $request->input('deposit_amount');
            $pay->wage = $request->input('wage');
            $pay->issue_tracking = $request->input('issue_tracking');
            $pay->considerations2 = $request->input('considerations2');
            $pay->paid_discount = $request->input('paid_discount');
            $pay->update();
            return response()->json([
                'status' => 200,
                'message' => 'پرداخت هزینه ویرایش شد',
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
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = Pay::find($id);
        $pay->delete();
        return response()->json([
            'status' => 200,
            'message' => 'پرداخت هزینه حذف شد',
        ]);
    }
}
