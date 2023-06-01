<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnSellFactorRequest;
use App\Models\ReturnSellFactor;
use App\Models\TarafHesab;
use Illuminate\Http\Request;

class ReturnSellFactorController extends Controller
{
    public function fetchReturnSellFactor()
    {
        $return_sell_factors = ReturnSellFactor::orderBy('id', 'desc')->get();
        return response()->json([
            'return_sell_factors' => $return_sell_factors,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taraf_hesabs = TarafHesab::where('chk_buyer', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $vasete_foroosh = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
        return view('buy-sell/return-sell-factor.index')
            ->with('vasete_foroosh', $vasete_foroosh)
            ->with('taraf_hesabs', $taraf_hesabs);
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
    public function store(ReturnSellFactorRequest $request)
    {
        $return_sell_factor = new ReturnSellFactor();
        $return_sell_factor->customer_type = $request->input('customer_type');
        $return_sell_factor->buyer = $request->input('buyer');
        $return_sell_factor->factor_no = $request->input('factor_no');
        $return_sell_factor->factor_date = $request->input('factor_date');
        $return_sell_factor->commission = $request->input('commission');
        $return_sell_factor->amount = $request->input('amount');
        $return_sell_factor->discount = $request->input('discount');
        $return_sell_factor->total = $request->input('total');
        $return_sell_factor->warehouse_name = $request->input('warehouse_name');
        $return_sell_factor->considerations = $request->input('considerations');
        $return_sell_factor->settlement_deadline = $request->input('settlement_deadline');
        $return_sell_factor->settlement_date = $request->input('settlement_date');
        $return_sell_factor->save();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور برگشت از فروش ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnSellFactor $returnSellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        if ($return_sell_factor) {
            return response()->json([
                'status' => 200,
                'return_sell_factor' => $return_sell_factor,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'فاکتور برگشت از فروش یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(ReturnSellFactorRequest $request, $id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        if ($return_sell_factor) {
            $return_sell_factor->customer_type = $request->input('customer_type');
            $return_sell_factor->buyer = $request->input('buyer');
            $return_sell_factor->factor_no = $request->input('factor_no');
            $return_sell_factor->factor_date = $request->input('factor_date');
            $return_sell_factor->commission = $request->input('commission');
            $return_sell_factor->amount = $request->input('amount');
            $return_sell_factor->discount = $request->input('discount');
            $return_sell_factor->total = $request->input('total');
            $return_sell_factor->warehouse_name = $request->input('warehouse_name');
            $return_sell_factor->considerations = $request->input('considerations');
            $return_sell_factor->settlement_deadline = $request->input('settlement_deadline');
            $return_sell_factor->settlement_date = $request->input('settlement_date');
            $return_sell_factor->update();
            return response()->json([
                'status' => 200,
                'message' => 'فاکتور برگشت از فروش ویرایش شد',
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
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        $return_sell_factor->delete();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور برگشت از فروش حذف شد',
        ]);
    }
}
