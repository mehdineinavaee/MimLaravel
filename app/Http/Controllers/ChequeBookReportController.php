<?php

namespace App\Http\Controllers;

use App\Models\ChequeBookReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ChequeBookReportController extends Controller
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
        return view('cheque-management/cheque-book-report.index');
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
     * @param  \App\Models\ChequeBookReport  $chequeBookReport
     * @return \Illuminate\Http\Response
     */
    public function show(ChequeBookReport $chequeBookReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChequeBookReport  $chequeBookReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ChequeBookReport $chequeBookReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChequeBookReport  $chequeBookReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChequeBookReport $chequeBookReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChequeBookReport  $chequeBookReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChequeBookReport $chequeBookReport)
    {
        //
    }
}
