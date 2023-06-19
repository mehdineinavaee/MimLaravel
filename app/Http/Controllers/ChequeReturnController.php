<?php

namespace App\Http\Controllers;

use App\Models\ChequeReturn;
use Illuminate\Http\Request;

class ChequeReturnController extends Controller
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
        return view('cheque-management/cheque-return.index');
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
     * @param  \App\Models\ChequeReturn  $chequeReturn
     * @return \Illuminate\Http\Response
     */
    public function show(ChequeReturn $chequeReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChequeReturn  $chequeReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(ChequeReturn $chequeReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChequeReturn  $chequeReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChequeReturn $chequeReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChequeReturn  $chequeReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChequeReturn $chequeReturn)
    {
        //
    }
}
