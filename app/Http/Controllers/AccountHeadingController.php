<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\AccountHeading;
use App\Models\Kol;
use App\Models\Moein;
use Illuminate\Http\Request;

class AccountHeadingController extends Controller
{
    public function fetchAccountHeading()
    {
        $acount_headings = AccountHeading::orderBy('id', 'desc')->get();
        return response()->json([
            'acount_headings' => $acount_headings,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_groups = AccountGroup::all();
        $kols = Kol::all();
        $moeins = Moein::all();
        return view('taarife-payeh/account-headings.index')
            ->with('account_groups', $account_groups)
            ->with('kols', $kols)
            ->with('moeins', $moeins);
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
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function show(AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountHeading $accountHeading)
    {
        //
    }
}
