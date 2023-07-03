<?php

namespace App\Http\Controllers;

use App\Models\SellStatisticsReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SellStatisticsReportController extends Controller
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
        return view('buy-sell-reports/sell-statistics-report.index');
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
     * @param  \App\Models\SellStatisticsReport  $sellStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function show(SellStatisticsReport $sellStatisticsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellStatisticsReport  $sellStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SellStatisticsReport $sellStatisticsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellStatisticsReport  $sellStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellStatisticsReport $sellStatisticsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellStatisticsReport  $sellStatisticsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellStatisticsReport $sellStatisticsReport)
    {
        //
    }
}
