<?php

namespace App\Http\Controllers;

use App\Models\BuyStatisticsReport;
use Illuminate\Http\Request;

class BuyStatisticsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell-reports/buy-statistics-report.index');
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
     * @param  \App\Models\BuyStatisticsReport  $buyStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function show(BuyStatisticsReport $buyStatisticsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyStatisticsReport  $buyStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyStatisticsReport $buyStatisticsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyStatisticsReport  $buyStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyStatisticsReport $buyStatisticsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyStatisticsReport  $buyStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyStatisticsReport $buyStatisticsReport)
    {
        //
    }
}
