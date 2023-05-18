<?php

namespace App\Http\Controllers;

use App\Models\FundToBank;
use Illuminate\Http\Request;

class FundToBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/fund-to-bank.index');
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
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function show(FundToBank $fundToBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function edit(FundToBank $fundToBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundToBank $fundToBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundToBank $fundToBank)
    {
        //
    }
}
