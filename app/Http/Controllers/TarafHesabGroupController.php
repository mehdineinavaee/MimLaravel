<?php

namespace App\Http\Controllers;

use App\Models\TarafHesabGroup;
use Illuminate\Http\Request;

class TarafHesabGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/taraf-hesab-group.index');
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
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }
}
