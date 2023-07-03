<?php

namespace App\Http\Controllers;

use App\Models\RialiReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RialiReportController extends Controller
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
        return view('product-warehouse-reports/riali-report.index');
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
     * @param  \App\Models\RialiReport  $rialiReport
     * @return \Illuminate\Http\Response
     */
    public function show(RialiReport $rialiReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RialiReport  $rialiReport
     * @return \Illuminate\Http\Response
     */
    public function edit(RialiReport $rialiReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RialiReport  $rialiReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RialiReport $rialiReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RialiReport  $rialiReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(RialiReport $rialiReport)
    {
        //
    }
}
