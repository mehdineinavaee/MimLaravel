<?php

namespace App\Http\Controllers;

use App\Models\BankType;
use Illuminate\Http\Request;

class BankTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/banks-types.index');
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
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function show(BankType $bankType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function edit(BankType $bankType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankType $bankType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankType $bankType)
    {
        //
    }
}
