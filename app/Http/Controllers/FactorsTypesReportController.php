<?php

namespace App\Http\Controllers;

use App\Models\FactorsTypesReport;
use Illuminate\Http\Request;

class FactorsTypesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell-reports/factors-types-report.index');
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
     * @param  \App\Models\FactorsTypesReport  $factorsTypesReport
     * @return \Illuminate\Http\Response
     */
    public function show(FactorsTypesReport $factorsTypesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactorsTypesReport  $factorsTypesReport
     * @return \Illuminate\Http\Response
     */
    public function edit(FactorsTypesReport $factorsTypesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactorsTypesReport  $factorsTypesReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactorsTypesReport $factorsTypesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactorsTypesReport  $factorsTypesReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactorsTypesReport $factorsTypesReport)
    {
        //
    }
}
