<?php

namespace App\Http\Controllers;

use App\Models\TransferPerson;
use Illuminate\Http\Request;

class TransferPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/transfer-person.index');
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
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function show(TransferPerson $transferPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferPerson $transferPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferPerson $transferPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferPerson $transferPerson)
    {
        //
    }
}
