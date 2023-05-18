<?php

namespace App\Http\Controllers;

use App\Models\ReturningCheque;
use Illuminate\Http\Request;

class ReturningChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/returning-cheque.index');
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturningCheque $returningCheque)
    {
        //
    }
}
