<?php

namespace App\Http\Controllers;

use App\Models\SpentCheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SpentChequeController extends Controller
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
        return view('cheque-management/spent-cheque.index');
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
     * @param  \App\Models\SpentCheque  $spentCheque
     * @return \Illuminate\Http\Response
     */
    public function show(SpentCheque $spentCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpentCheque  $spentCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(SpentCheque $spentCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpentCheque  $spentCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpentCheque $spentCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpentCheque  $spentCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpentCheque $spentCheque)
    {
        //
    }
}
