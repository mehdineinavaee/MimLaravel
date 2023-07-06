<?php

namespace App\Http\Controllers;

use App\Models\SpentCheque;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('spent_cheque')) {
            return view('cheque-management/spent-cheque.index');
        } else {
            return abort(401);
        }
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
