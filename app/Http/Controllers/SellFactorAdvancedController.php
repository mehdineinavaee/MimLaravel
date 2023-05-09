<?php

namespace App\Http\Controllers;

use App\Models\SellFactorAdvanced;
use Illuminate\Http\Request;

class SellFactorAdvancedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/sell-factor-advanced.index');
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
     * @param  \App\Models\SellFactorAdvanced  $sellFactorAdvanced
     * @return \Illuminate\Http\Response
     */
    public function show(SellFactorAdvanced $sellFactorAdvanced)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellFactorAdvanced  $sellFactorAdvanced
     * @return \Illuminate\Http\Response
     */
    public function edit(SellFactorAdvanced $sellFactorAdvanced)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellFactorAdvanced  $sellFactorAdvanced
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellFactorAdvanced $sellFactorAdvanced)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellFactorAdvanced  $sellFactorAdvanced
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellFactorAdvanced $sellFactorAdvanced)
    {
        //
    }
}
