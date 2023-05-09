<?php

namespace App\Http\Controllers;

use App\Models\ProductFareiAsli;
use Illuminate\Http\Request;

class ProductFareiAsliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/product-farei-asli.index');
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
     * @param  \App\Models\ProductFareiAsli  $productFareiAsli
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFareiAsli $productFareiAsli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductFareiAsli  $productFareiAsli
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFareiAsli $productFareiAsli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductFareiAsli  $productFareiAsli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFareiAsli $productFareiAsli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFareiAsli  $productFareiAsli
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFareiAsli $productFareiAsli)
    {
        //
    }
}
