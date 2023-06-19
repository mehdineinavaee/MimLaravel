<?php

namespace App\Http\Controllers;

use App\Models\WarehouseMove;
use Illuminate\Http\Request;

class WarehouseMoveController extends Controller
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
        return view('warehouse/warehouse-moves.index');
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
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseMove $warehouseMove)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseMove $warehouseMove)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseMove $warehouseMove)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseMove $warehouseMove)
    {
        //
    }
}
