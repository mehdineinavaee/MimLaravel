<?php

namespace App\Http\Controllers;

use App\Models\ReceivePay;
use Illuminate\Http\Request;

class ReceivePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/receive-pay.index');
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
     * @param  \App\Models\ReceivePay  $receivePay
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivePay $receivePay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceivePay  $receivePay
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivePay $receivePay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceivePay  $receivePay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivePay $receivePay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceivePay  $receivePay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivePay $receivePay)
    {
        //
    }
}
