<?php

namespace App\Http\Controllers;

use App\Models\TarafHesabBuyReport;
use Illuminate\Http\Request;

class TarafHesabBuyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell-reports/taraf-hesab-buy-report.index');
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
     * @param  \App\Models\TarafHesabBuyReport  $tarafHesabBuyReport
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabBuyReport $tarafHesabBuyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabBuyReport  $tarafHesabBuyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesabBuyReport $tarafHesabBuyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesabBuyReport  $tarafHesabBuyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesabBuyReport $tarafHesabBuyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesabBuyReport  $tarafHesabBuyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesabBuyReport $tarafHesabBuyReport)
    {
        //
    }
}
