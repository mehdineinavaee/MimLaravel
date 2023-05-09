<?php

namespace App\Http\Controllers;

use App\Models\ReceiveCheque;
use Illuminate\Http\Request;

class ReceiveChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('first-period/receive-cheques.index');
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
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveCheque $receiveCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiveCheque $receiveCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiveCheque $receiveCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiveCheque  $receiveCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiveCheque $receiveCheque)
    {
        //
    }
}
