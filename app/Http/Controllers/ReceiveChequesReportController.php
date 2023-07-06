<?php

namespace App\Http\Controllers;

use App\Models\ReceiveChequesReport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReceiveChequesReportController extends Controller
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
        if (Gate::allows('receive_cheques_report')) {
            return view('cheque-management/receive-cheques-report.index');
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
     * @param  \App\Models\ReceiveChequesReport  $receiveChequesReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveChequesReport $receiveChequesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveChequesReport  $receiveChequesReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiveChequesReport $receiveChequesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveChequesReport  $receiveChequesReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiveChequesReport $receiveChequesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiveChequesReport  $receiveChequesReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiveChequesReport $receiveChequesReport)
    {
        //
    }
}
