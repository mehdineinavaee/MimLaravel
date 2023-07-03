<?php

namespace App\Http\Controllers;

use App\Models\PayCheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PayChequeController extends Controller
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
        return view('first-period/pay-cheques.index');
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
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function show(PayCheque $payCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(PayCheque $payCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayCheque $payCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayCheque  $payCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayCheque $payCheque)
    {
        //
    }
}
