<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InventoryProductController extends Controller
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
        return view('product-warehouse-reports/inventory-products.index');
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
     * @param  \App\Models\InventoryProduct  $inventoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryProduct $inventoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryProduct  $inventoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryProduct $inventoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryProduct  $inventoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryProduct $inventoryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryProduct  $inventoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryProduct $inventoryProduct)
    {
        //
    }
}
