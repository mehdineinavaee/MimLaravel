<?php

namespace App\Http\Controllers;

use App\Models\FundPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FundPeriodController extends Controller
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
        return view('first-period/fund-period.index');
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
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(FundPeriod $fundPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(FundPeriod $fundPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundPeriod $fundPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundPeriod  $fundPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundPeriod $fundPeriod)
    {
        //
    }
}
