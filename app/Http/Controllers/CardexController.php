<?php

namespace App\Http\Controllers;

use App\Models\Cardex;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CardexController extends Controller
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
        if (Gate::allows('cardex')) {
            return view('product-warehouse-reports/cardex.index');
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
     * @param  \App\Models\Cardex  $cardex
     * @return \Illuminate\Http\Response
     */
    public function show(Cardex $cardex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardex  $cardex
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardex $cardex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardex  $cardex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardex $cardex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardex  $cardex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardex $cardex)
    {
        //
    }
}
