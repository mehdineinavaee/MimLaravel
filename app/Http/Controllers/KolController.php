<?php

namespace App\Http\Controllers;

use App\Http\Requests\KolRequest;
use App\Models\Kol;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData()
    {
        $kols = Kol::orderBy('id', 'desc')->get();
        return response()->json([
            'kols' => $kols,
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
    public function store(KolRequest $request)
    {
        if (Gate::allows('account_headings')) {
            $kol = new Kol();
            $kol->account_code = $request->input('account_code');
            $kol->account_name = $request->input('account_name');
            $kol->account_nature = $request->input('account_nature');
            $kol->active = $request->input('active');
            $kol->account_group()->associate($request->account_group);
            $kol->save();
            return response()->json([
                'status' => 200,
                'message' => 'کل ذخیره شد',
            ]);
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kol  $kol
     * @return \Illuminate\Http\Response
     */
    public function show(Kol $kol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kol  $kol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('account_headings')) {
            $kol = Kol::find($id);
            if ($kol) {
                return response()->json([
                    'status' => 200,
                    'kol' => $kol,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'کل یافت نشد',
                ]);
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kol  $kol
     * @return \Illuminate\Http\Response
     */
    public function update(KolRequest $request, $id)
    {
        if (Gate::allows('account_headings')) {
            $kol = Kol::find($id);
            if ($kol) {
                $kol->account_code = $request->input('account_code');
                $kol->account_name = $request->input('account_name');
                $kol->account_nature = $request->input('account_nature');
                $kol->active = $request->input('active');
                $kol->account_group()->associate($request->account_group);
                $kol->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'کل ویرایش شد',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اطلاعاتی یافت نشد',
                ]);
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kol  $kol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('account_headings')) {
            $kol = Kol::find($id);
            $kol->delete();
            return response()->json([
                'status' => 200,
                'message' => 'کل حذف شد',
            ]);
        } else {
            return abort(401);
        }
    }
}
