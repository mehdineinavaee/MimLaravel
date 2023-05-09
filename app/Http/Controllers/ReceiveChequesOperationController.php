<?php

namespace App\Http\Controllers;

use App\Models\ReceiveChequesOperation;
use Illuminate\Http\Request;

class ReceiveChequesOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/receive-cheques-operations.index');
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
     * @param  \App\Models\ReceiveChequesOperation  $receiveChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveChequesOperation $receiveChequesOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveChequesOperation  $receiveChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiveChequesOperation $receiveChequesOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveChequesOperation  $receiveChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiveChequesOperation $receiveChequesOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiveChequesOperation  $receiveChequesOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiveChequesOperation $receiveChequesOperation)
    {
        //
    }
}
