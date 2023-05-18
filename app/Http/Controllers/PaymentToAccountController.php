<?php

namespace App\Http\Controllers;

use App\Models\PaymentToAccount;
use Illuminate\Http\Request;

class PaymentToAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/payment-to-account.index');
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
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentToAccount $paymentToAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentToAccount $paymentToAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentToAccount $paymentToAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentToAccount  $paymentToAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentToAccount $paymentToAccount)
    {
        //
    }
}
