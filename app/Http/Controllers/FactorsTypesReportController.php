<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FactorsTypesReport;
use Illuminate\Http\Request;
use PDF;

class FactorsTypesReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function factorsTypesReportPDF()
    {
        $cities = City::get();

        $data = [
            'title' => 'به پی دی اف من خوش آمدید',
            'date' => date('m/d/Y'),
            'cities' => $cities
        ];

        $pdf = PDF::loadView('buy-sell-reports/factors-types-report.myPDF', $data);
        return $pdf->stream('document.pdf');
    }

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
