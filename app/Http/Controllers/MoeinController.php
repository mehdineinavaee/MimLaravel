<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoeinRequest;
use App\Models\Moein;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MoeinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData()
    {
        $moeins = Moein::orderBy('id', 'desc')->get();
        return response()->json([
            'moeins' => $moeins,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MoeinRequest $request)
    {
        $moein = new Moein();
        $moein->kol_account_name = $request->input('kol_account_name');
        $moein->account_code = $request->input('account_code');
        $moein->account_name = $request->input('account_name');
        $moein->shenavar_tafsil = $request->input('shenavar_tafsil');
        $moein->active = $request->input('active');
        $moein->save();
        return response()->json([
            'status' => 200,
            'message' => 'معین ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moein  $moein
     * @return \Illuminate\Http\Response
     */
    public function show(Moein $moein)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moein  $moein
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moein = Moein::find($id);
        if ($moein) {
            return response()->json([
                'status' => 200,
                'moein' => $moein,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'معین یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moein  $moein
     * @return \Illuminate\Http\Response
     */
    public function update(MoeinRequest $request, $id)
    {
        $moein = Moein::find($id);
        if ($moein) {
            $moein->kol_account_name = $request->input('kol_account_name');
            $moein->account_code = $request->input('account_code');
            $moein->account_name = $request->input('account_name');
            $moein->shenavar_tafsil = $request->input('shenavar_tafsil');
            $moein->active = $request->input('active');
            $moein->update();
            return response()->json([
                'status' => 200,
                'message' => 'معین ویرایش شد',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moein  $moein
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moein = Moein::find($id);
        $moein->delete();
        return response()->json([
            'status' => 200,
            'message' => 'معین حذف شد',
        ]);
    }
}
