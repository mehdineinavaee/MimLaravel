<?php

namespace App\Http\Controllers;

use App\Models\WarehouseWastageFactor;
use Illuminate\Http\Request;

class WarehouseWastageFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warehouse/warehouse-wastage-factor.index');
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
     * @param  \App\Models\WarehouseWastageFactor  $warehouseWastageFactor
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseWastageFactor $warehouseWastageFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseWastageFactor  $warehouseWastageFactor
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseWastageFactor $warehouseWastageFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseWastageFactor  $warehouseWastageFactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseWastageFactor $warehouseWastageFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseWastageFactor  $warehouseWastageFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseWastageFactor $warehouseWastageFactor)
    {
        //
    }
}
