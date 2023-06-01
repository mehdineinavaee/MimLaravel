<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyFactorRequest;
use App\Models\BuyFactor;
use Illuminate\Http\Request;

class BuyFactorController extends Controller
{
    public function fetchBuyFactor(request $request)
    {
        $buy_factors = BuyFactor::orderBy('buy_factor_no', 'asc')->get();
        return view('buy-sell/buy-factor.data', compact('buy_factors'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/buy-factor.index');
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
    public function store(BuyFactorRequest $request)
    {
        $buy_factor = new BuyFactor();
        $buy_factor->buy_factor_no = $request->input('buy_factor_no');
        $buy_factor->save();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور خرید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuyFactor  $buyFactor
     * @return \Illuminate\Http\Response
     */
    public function show(BuyFactor $buyFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyFactor  $buyFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buy_factor = BuyFactor::find($id);
        if ($buy_factor) {
            return response()->json([
                'status' => 200,
                'buy_factor' => $buy_factor,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'فاکتور خرید یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyFactor  $buyFactor
     * @return \Illuminate\Http\Response
     */
    public function update(BuyFactorRequest $request, $id)
    {
        $buy_factor = BuyFactor::find($id);
        if ($buy_factor) {
            $buy_factor->buy_factor_no = $request->input('buy_factor_no');
            $buy_factor->update();
            return response()->json([
                'status' => 200,
                'message' => 'فاکتور خرید ویرایش شد',
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
     * @param  \App\Models\BuyFactor  $buyFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buy_factor = BuyFactor::find($id);
        $buy_factor->delete();
        return response()->json([
            'status' => 200,
            'message' => 'فاکتور خرید حذف شد',
        ]);
    }
}
