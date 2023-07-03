<?php

namespace App\Http\Controllers;

use App\Models\AccountingDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AccountingDocumentController extends Controller
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
        return view('financial-management/accounting-documents.index');
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
     * @param  \App\Models\AccountingDocument  $accountingDocument
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingDocument $accountingDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountingDocument  $accountingDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountingDocument $accountingDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountingDocument  $accountingDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingDocument $accountingDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountingDocument  $accountingDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingDocument $accountingDocument)
    {
        //
    }
}
