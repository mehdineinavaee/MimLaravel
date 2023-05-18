<?php

namespace App\Http\Controllers;

use App\Models\BankToFund;
use Illuminate\Http\Request;

class BankToFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/bank-to-fund.index');
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
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function show(BankToFund $bankToFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function edit(BankToFund $bankToFund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankToFund $bankToFund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankToFund $bankToFund)
    {
        //
    }
}
