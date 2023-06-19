<?php

namespace App\Http\Controllers;

use App\Models\FactorsBenefit;
use Illuminate\Http\Request;

class FactorsBenefitController extends Controller
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
        return view('benefit-report/factors-benefit.index');
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
     * @param  \App\Models\FactorsBenefit  $factorsBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(FactorsBenefit $factorsBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactorsBenefit  $factorsBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(FactorsBenefit $factorsBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactorsBenefit  $factorsBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactorsBenefit $factorsBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactorsBenefit  $factorsBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactorsBenefit $factorsBenefit)
    {
        //
    }
}
