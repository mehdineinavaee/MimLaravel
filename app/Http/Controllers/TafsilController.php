<?php

namespace App\Http\Controllers;

use App\Http\Requests\TafsilRequest;
use App\Models\Tafsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TafsilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData()
    {
        $tafsils = Tafsil::orderBy('id', 'desc')->get();
        return response()->json([
            'tafsils' => $tafsils,
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
    public function store(TafsilRequest $request)
    {
        $tafsil = new Tafsil();
        $tafsil->kol_account_name = $request->input('kol_account_name');
        $tafsil->moein_account_name = $request->input('moein_account_name');
        $tafsil->account_code = $request->input('account_code');
        $tafsil->account_name = $request->input('account_name');
        $tafsil->active = $request->input('active');
        $tafsil->save();
        return response()->json([
            'status' => 200,
            'message' => 'تفصیل ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tafsil  $tafsil
     * @return \Illuminate\Http\Response
     */
    public function show(Tafsil $tafsil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tafsil  $tafsil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tafsil = Tafsil::find($id);
        if ($tafsil) {
            return response()->json([
                'status' => 200,
                'tafsil' => $tafsil,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'تفصیل یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tafsil  $tafsil
     * @return \Illuminate\Http\Response
     */
    public function update(TafsilRequest $request, $id)
    {
        $tafsil = Tafsil::find($id);
        if ($tafsil) {
            $tafsil->kol_account_name = $request->input('kol_account_name');
            $tafsil->moein_account_name = $request->input('moein_account_name');
            $tafsil->account_code = $request->input('account_code');
            $tafsil->account_name = $request->input('account_name');
            $tafsil->active = $request->input('active');
            $tafsil->update();
            return response()->json([
                'status' => 200,
                'message' => 'تفصیل ویرایش شد',
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
     * @param  \App\Models\Tafsil  $tafsil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tafsil = Tafsil::find($id);
        $tafsil->delete();
        return response()->json([
            'status' => 200,
            'message' => 'تفصیل حذف شد',
        ]);
    }
}
