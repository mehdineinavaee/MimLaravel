<?php

namespace App\Http\Controllers;

use App\Models\ProductFareiAsli;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ProductFareiAsliController extends Controller
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
        if (Gate::allows('product_farei_asli')) {
            // $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
            // $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
            // return view('taarife-payeh/product-farei-asli.index', compact('categories', 'allCategories'));
            return view('taarife-payeh/product-farei-asli.index');
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
