<?php

namespace App\Http\Controllers;

use App\Models\WastageFactor;
use Illuminate\Http\Request;

class WastageFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy-sell/wastage-factor.index');
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
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function show(WastageFactor $wastageFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function edit(WastageFactor $wastageFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WastageFactor $wastageFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(WastageFactor $wastageFactor)
    {
        //
    }
}
