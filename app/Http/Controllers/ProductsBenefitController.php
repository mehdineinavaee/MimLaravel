<?php

namespace App\Http\Controllers;

use App\Models\ProductsBenefit;
use Illuminate\Http\Request;

class ProductsBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('benefit-report/products-benefit.index');
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
     * @param  \App\Models\ProductsBenefit  $productsBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsBenefit $productsBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsBenefit  $productsBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsBenefit $productsBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductsBenefit  $productsBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsBenefit $productsBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsBenefit  $productsBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsBenefit $productsBenefit)
    {
        //
    }
}
