<?php

namespace App\Http\Controllers;

use App\Models\TarafHesab;
use Illuminate\Http\Request;

class TarafHesabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/taraf-hesab.index');
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
        $tarafHesab = new TarafHesab();
        $tarafHesab->fullname = $request->input('fullname');
        $tarafHesab->save();
        return response()->json([
            'status' => 200,
            'message' => 'طرف حساب جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesab $tarafHesab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesab $tarafHesab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesab $tarafHesab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesab $tarafHesab)
    {
        //
    }
}
