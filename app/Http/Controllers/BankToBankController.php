<?php

namespace App\Http\Controllers;

use App\Models\BankToBank;
use Illuminate\Http\Request;

class BankToBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/bank-to-bank.index');
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
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function show(BankToBank $bankToBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function edit(BankToBank $bankToBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankToBank $bankToBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankToBank  $bankToBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankToBank $bankToBank)
    {
        //
    }
}
