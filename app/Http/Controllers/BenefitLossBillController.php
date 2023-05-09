<?php

namespace App\Http\Controllers;

use App\Models\BenefitLossBill;
use Illuminate\Http\Request;

class BenefitLossBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/benefit-loss-bill.index');
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
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function edit(BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BenefitLossBill $benefitLossBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BenefitLossBill  $benefitLossBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(BenefitLossBill $benefitLossBill)
    {
        //
    }
}
