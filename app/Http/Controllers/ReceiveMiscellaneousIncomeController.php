<?php

namespace App\Http\Controllers;

use App\Models\ReceiveMiscellaneousIncome;
use Illuminate\Http\Request;

class ReceiveMiscellaneousIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/receive-miscellaneous-income.index');
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
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }
}
