<?php

namespace App\Http\Controllers;

use App\Models\ProductsBarcode;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ProductsBarcodeController extends Controller
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
        if (Gate::allows('products_barcode')) {
            return view('product-warehouse-reports/products-barcode.index');
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
     * @param  \App\Models\ProductsBarcode  $productsBarcode
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsBarcode $productsBarcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsBarcode  $productsBarcode
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsBarcode $productsBarcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductsBarcode  $productsBarcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsBarcode $productsBarcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsBarcode  $productsBarcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsBarcode $productsBarcode)
    {
        //
    }
}
