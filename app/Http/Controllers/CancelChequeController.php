<?php

namespace App\Http\Controllers;

use App\Models\CancelCheque;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CancelChequeController extends Controller
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
        if (Gate::allows('cancel_cheque')) {
            return view('cheque-management/cancel-cheque.index');
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
     * @param  \App\Models\CancelCheque  $cancelCheque
     * @return \Illuminate\Http\Response
     */
    public function show(CancelCheque $cancelCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CancelCheque  $cancelCheque
     * @return \Illuminate\Http\Response
     */
    public function edit(CancelCheque $cancelCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CancelCheque  $cancelCheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CancelCheque $cancelCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CancelCheque  $cancelCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancelCheque $cancelCheque)
    {
        //
    }
}
