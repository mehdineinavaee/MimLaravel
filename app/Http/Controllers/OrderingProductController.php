<?php

namespace App\Http\Controllers;

use App\Models\OrderingProduct;
use Illuminate\Http\Request;

class OrderingProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product-warehouse-reports/ordering-products.index');
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
     * @param  \App\Models\OrderingProduct  $orderingProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderingProduct $orderingProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderingProduct  $orderingProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderingProduct $orderingProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderingProduct  $orderingProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderingProduct $orderingProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderingProduct  $orderingProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderingProduct $orderingProduct)
    {
        //
    }
}
