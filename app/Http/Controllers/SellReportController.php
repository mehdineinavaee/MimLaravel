<?php

namespace App\Http\Controllers;

use App\Models\SellReport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SellReportController extends Controller
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
        if (Gate::allows('sell_report')) {
            return view('buy-sell-reports/sell-report.index');
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
     * @param  \App\Models\SellReport  $sellReport
     * @return \Illuminate\Http\Response
     */
    public function show(SellReport $sellReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellReport  $sellReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SellReport $sellReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellReport  $sellReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellReport $sellReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellReport  $sellReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellReport $sellReport)
    {
        //
    }
}
