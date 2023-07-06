<?php

namespace App\Http\Controllers;

use App\Models\TarafHesabBenefit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TarafHesabBenefitController extends Controller
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
        if (Gate::allows('taraf_hesab_benefit')) {
            return view('benefit-report/taraf-hesab-benefit.index');
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
     * @param  \App\Models\TarafHesabBenefit  $tarafHesabBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabBenefit $tarafHesabBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabBenefit  $tarafHesabBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesabBenefit $tarafHesabBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesabBenefit  $tarafHesabBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesabBenefit $tarafHesabBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesabBenefit  $tarafHesabBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesabBenefit $tarafHesabBenefit)
    {
        //
    }
}
