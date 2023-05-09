<?php

namespace App\Http\Controllers;

use App\Models\ProductNoUnit;
use Illuminate\Http\Request;

class ProductNoUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/product-no-unit.index');
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
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductNoUnit $productNoUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductNoUnit $productNoUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductNoUnit $productNoUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductNoUnit $productNoUnit)
    {
        //
    }
}
