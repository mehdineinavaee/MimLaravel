<?php

namespace App\Http\Controllers;

use App\Models\PayChequesOperation;
use Illuminate\Http\Request;

class PayChequesOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/pay-cheques-operations.index');
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
     * @param  \App\Models\PayChequesOperation  $payChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function show(PayChequesOperation $payChequesOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayChequesOperation  $payChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(PayChequesOperation $payChequesOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayChequesOperation  $payChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayChequesOperation $payChequesOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayChequesOperation  $payChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayChequesOperation $payChequesOperation)
    {
        //
    }
}
