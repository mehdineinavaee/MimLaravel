<?php

namespace App\Http\Controllers;

use App\Models\ChequeBook;
use Illuminate\Http\Request;

class ChequeBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/cheque-book.index');
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
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function show(ChequeBook $chequeBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function edit(ChequeBook $chequeBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChequeBook $chequeBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChequeBook $chequeBook)
    {
        //
    }
}
