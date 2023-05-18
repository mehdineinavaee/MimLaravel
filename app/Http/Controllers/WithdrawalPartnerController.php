<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalPartner;
use Illuminate\Http\Request;

class WithdrawalPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/withdrawal-partner.index');
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
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawalPartner $withdrawalPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawalPartner $withdrawalPartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawalPartner $withdrawalPartner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawalPartner $withdrawalPartner)
    {
        //
    }
}
