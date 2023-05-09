<?php

namespace App\Http\Controllers;

use App\Models\ReturnSellFactor;
use Illuminate\Http\Request;

class ReturnSellFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/return-sell-factor.index');
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
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnSellFactor $returnSellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnSellFactor $returnSellFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnSellFactor $returnSellFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnSellFactor $returnSellFactor)
    {
        //
    }
}
