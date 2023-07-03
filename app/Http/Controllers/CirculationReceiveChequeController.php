<?php

namespace App\Http\Controllers;

use App\Models\CirculationReceiveCheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CirculationReceiveChequeController extends Controller
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
        return view('cheque-management/circulation-receive-cheque.index');
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
     * @param  \App\Models\CirculationReceiveCheque  $circulationReceiveCheque
     * @return \Illuminate\Http\Response
     */
    public function show(CirculationReceiveCheque $circulationReceiveCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CirculationReceiveCheque  $circulationReceiveCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(CirculationReceiveCheque $circulationReceiveCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CirculationReceiveCheque  $circulationReceiveCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CirculationReceiveCheque $circulationReceiveCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CirculationReceiveCheque  $circulationReceiveCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(CirculationReceiveCheque $circulationReceiveCheque)
    {
        //
    }
}
