<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellFactorRequest;
use App\Models\SellFactor;
use App\Models\TarafHesab;
use Illuminate\Http\Request;

class SellFactorController extends Controller
{
    public function fetchData()
    {
        $sell_factors = SellFactor::orderBy('id', 'desc')->get();
        return response()->json([
            'sell_factors' => $sell_factors,
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
        return view('buy-sell/sell-factor.index')
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
    public function store(SellFactorRequest $request)
    {
        $sell_factor = new SellFactor();
        $sell_factor->customer_type = $request->input('customer_type');
        $sell_factor->buyer = $request->input('buyer');
        $sell_factor->factor_no = $request->input('factor_no');
        $sell_factor->factor_date = $request->input('factor_date');
        $sell_factor->commission = $request->input('commission');
        $sell_factor->amount = $request->input('amount');
        $sell_factor->discount = $request->input('discount');
        $sell_factor->total = $request->input('total');
        $sell_factor->warehouse_name = $request->input('warehouse_name');
        $sell_factor->considerations = $request->input('considerations');
        $sell_factor->settlement_deadline = $request->input('settlement_deadline');
        $sell_factor->settlement_date = $request->input('settlement_date');
        $sell_factor->save();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور فروش جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(SellFactor $sellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell_factor = SellFactor::find($id);
        if ($sell_factor) {
            return response()->json([
                'status' => 200,
                'sell_factor' => $sell_factor,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'فاکتور فروش یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(SellFactorRequest $request, $id)
    {
        $sell_factor = SellFactor::find($id);
        if ($sell_factor) {
            $sell_factor->customer_type = $request->input('customer_type');
            $sell_factor->buyer = $request->input('buyer');
            $sell_factor->factor_no = $request->input('factor_no');
            $sell_factor->factor_date = $request->input('factor_date');
            $sell_factor->commission = $request->input('commission');
            $sell_factor->amount = $request->input('amount');
            $sell_factor->discount = $request->input('discount');
            $sell_factor->total = $request->input('total');
            $sell_factor->warehouse_name = $request->input('warehouse_name');
            $sell_factor->considerations = $request->input('considerations');
            $sell_factor->settlement_deadline = $request->input('settlement_deadline');
            $sell_factor->settlement_date = $request->input('settlement_date');
            $sell_factor->update();
            return response()->json([
                'status' => 200,
                'message' => 'فاکتور فروش ویرایش شد',
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
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell_factor = SellFactor::find($id);
        $sell_factor->delete();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور فروش حذف شد',
        ]);
    }
}
