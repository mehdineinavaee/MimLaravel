<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabRequest;
use App\Models\TarafHesab;
use App\Models\TarafHesabGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarafHesabController extends Controller
{
    public function fetchTarafHesab()
    {
        $taraf_hesabs = TarafHesab::orderBy('id', 'desc')->get();
        // $taraf_hesabs = TarafHesab::all();
        return response()->json([
            'taraf_hesabs' => $taraf_hesabs,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
        $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
        return view('taarife-payeh/taraf-hesab.index', compact('categories', 'allCategories'));
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
    public function store(TarafHesabRequest $request)
    {
        $tarafHesab = new TarafHesab();
        $tarafHesab->code = $request->input('code');
        $tarafHesab->fullname = $request->input('fullname');
        $tarafHesab->phone = $request->input('phone');
        $tarafHesab->save();
        return response()->json([
            'status' => 200,
            'message' => 'طرف حساب جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesab $tarafHesab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        if ($taraf_hesab) {
            return response()->json([
                'status' => 200,
                'taraf_hesab' => $taraf_hesab,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'طرف حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function update(TarafHesabRequest $request,  $id)
    {
        $tarafHesab = TarafHesab::find($id);
        if ($tarafHesab) {
            $tarafHesab->code = $request->input('code');
            $tarafHesab->fullname = $request->input('fullname');
            $tarafHesab->phone = $request->input('phone');
            $tarafHesab->update();
            return response()->json([
                'status' => 200,
                'message' => 'طرف حساب ویرایش شد',
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
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        $taraf_hesab->delete();
        return response()->json([
            'status' => 200,
            'message' => 'طرف حساب حذف شد',
        ]);
    }
}
