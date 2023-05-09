<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductsPeriod;
use Illuminate\Http\Request;

class InventoryProductsPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('first-period/inventory-products-period.index');
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
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryProductsPeriod $inventoryProductsPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryProductsPeriod $inventoryProductsPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryProductsPeriod $inventoryProductsPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryProductsPeriod $inventoryProductsPeriod)
    {
        //
    }
}
