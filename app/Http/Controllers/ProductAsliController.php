<?php

namespace App\Http\Controllers;

use App\Models\ProductAsli;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ProductAsliController extends Controller
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
        //
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
     * @param  \App\Models\ProductAsli  $productAsli
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAsli $productAsli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAsli  $productAsli
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAsli $productAsli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAsli  $productAsli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAsli $productAsli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAsli  $productAsli
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAsli $productAsli)
    {
        //
    }
}
