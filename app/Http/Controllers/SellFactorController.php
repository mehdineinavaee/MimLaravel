<?php

namespace App\Http\Controllers;

use App\Models\SellFactor;
use Illuminate\Http\Request;

class SellFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/sell-factor.index');
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
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(SellFactor $sellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit(SellFactor $sellFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellFactor $sellFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellFactor $sellFactor)
    {
        //
    }
}
