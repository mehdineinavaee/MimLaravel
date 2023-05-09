<?php

namespace App\Http\Controllers;

use App\Models\ReturnBuyFactor;
use Illuminate\Http\Request;

class ReturnBuyFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/return-buy-factor.index');
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
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnBuyFactor $returnBuyFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnBuyFactor $returnBuyFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnBuyFactor $returnBuyFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnBuyFactor $returnBuyFactor)
    {
        //
    }
}
