<?php

namespace App\Http\Controllers;

use App\Models\BankAccountsPeriod;
use Illuminate\Http\Request;

class BankAccountsPeriodController extends Controller
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
        return view('first-period/bank-accounts-period.index');
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
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccountsPeriod $bankAccountsPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccountsPeriod $bankAccountsPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccountsPeriod $bankAccountsPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccountsPeriod $bankAccountsPeriod)
    {
        //
    }
}
