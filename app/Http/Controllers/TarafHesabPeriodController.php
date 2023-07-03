<?php

namespace App\Http\Controllers;

use App\Models\TarafHesabPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TarafHesabPeriodController extends Controller
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
        return view('first-period/taraf-hesab-period.index');
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
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabPeriod $tarafHesabPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesabPeriod $tarafHesabPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesabPeriod $tarafHesabPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesabPeriod  $tarafHesabPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesabPeriod $tarafHesabPeriod)
    {
        //
    }
}
