<?php

namespace App\Http\Controllers;

use App\Http\Requests\BenefitLossBillRequest;
use App\Models\BenefitLossBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BenefitLossBillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function benefit_loss_bill_invoice(BenefitLossBillRequest $request)
    {
        $inventory_first_period = 1;
        $buy_total = 2;
        $inventory_warehouse = 3;
        $sold_price1 = 4;
        $sell_total = 5;
        $sold_price2 = 6;
        $special_interest1 = 7;
        $special_interest2 = 8;
        $incomes = 9;
        $costs = 10;
        $profit = 11;
        $data =
            [
                'inventory_first_period' => $inventory_first_period,
                'buy_total' => $buy_total,
                'inventory_warehouse' => $inventory_warehouse,
                'sold_price1' => $sold_price1,
                'sell_total' => $sell_total,
                'sold_price2' => $sold_price2,
                'special_interest1' => $special_interest1,
                'special_interest2' => $special_interest2,
                'incomes' => $incomes,
                'costs' => $costs,
                'profit' => $profit
            ];

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function benefitLossBillPDF()
    {
        $inventory_first_period = 1;
        $buy_total = 2;
        $inventory_warehouse = 3;
        $sold_price1 = 4;
        $sell_total = 5;
        $sold_price2 = 6;
        $special_interest1 = 7;
        $special_interest2 = 8;
        $incomes = 9;
        $costs = 10;
        $profit = 11;
        $data =
            [
                'inventory_first_period' => $inventory_first_period,
                'buy_total' => $buy_total,
                'inventory_warehouse' => $inventory_warehouse,
                'sold_price1' => $sold_price1,
                'sell_total' => $sell_total,
                'sold_price2' => $sold_price2,
                'special_interest1' => $special_interest1,
                'special_interest2' => $special_interest2,
                'incomes' => $incomes,
                'costs' => $costs,
                'profit' => $profit
            ];

        $pdf = PDF::loadView('buy-sell/benefit-loss-bill.myPDF', $data);
        return $pdf->stream('document.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/benefit-loss-bill.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitLossBill $benefitLossBill)
    {
        //
    }
}
