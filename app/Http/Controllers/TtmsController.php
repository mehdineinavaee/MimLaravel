<?php

namespace App\Http\Controllers;

use App\Models\Ttms;
use Illuminate\Http\Request;

class TtmsController extends Controller
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
        return view('buy-sell/ttms.index');
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
     * @param  \App\Models\Ttms  $ttms
     * @return \Illuminate\Http\Response
     */
    public function show(Ttms $ttms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ttms  $ttms
     * @return \Illuminate\Http\Response
     */
    public function edit(Ttms $ttms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ttms  $ttms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ttms $ttms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ttms  $ttms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ttms $ttms)
    {
        //
    }
}
