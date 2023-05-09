<?php

namespace App\Http\Controllers;

use App\Models\ArzeshAfzoudeGroup;
use Illuminate\Http\Request;

class ArzeshAfzoudeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/arzesh-afzoude-groups.index');
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
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ArzeshAfzoudeGroup $arzeshAfzoudeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ArzeshAfzoudeGroup $arzeshAfzoudeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArzeshAfzoudeGroup $arzeshAfzoudeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArzeshAfzoudeGroup $arzeshAfzoudeGroup)
    {
        //
    }
}
