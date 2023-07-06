<?php

namespace App\Http\Controllers;

use App\Models\CirculationPayChequeReport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CirculationPayChequeReportController extends Controller
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
        if (Gate::allows('circulation_pay_cheque_report')) {
            return view('cheque-management/circulation-pay-cheque-report.index');
        } else {
            return abort(401);
        }
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
     * @param  \App\Models\CirculationPayChequeReport  $circulationPayChequeReport
     * @return \Illuminate\Http\Response
     */
    public function show(CirculationPayChequeReport $circulationPayChequeReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CirculationPayChequeReport  $circulationPayChequeReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CirculationPayChequeReport $circulationPayChequeReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CirculationPayChequeReport  $circulationPayChequeReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CirculationPayChequeReport $circulationPayChequeReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CirculationPayChequeReport  $circulationPayChequeReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CirculationPayChequeReport $circulationPayChequeReport)
    {
        //
    }
}
