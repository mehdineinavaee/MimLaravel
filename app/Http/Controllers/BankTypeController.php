<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanksTypesRequest;
use App\Models\BankType;
use Illuminate\Http\Request;

class BankTypeController extends Controller
{
    public function fetchData()
    {
        $banks_types = BankType::orderBy('id', 'desc')->get();
        return response()->json([
            'banks_types' => $banks_types,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/banks-types.index');
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
    public function store(BanksTypesRequest $request)
    {
        $banks_types = new BankType();
        $banks_types->bank_code = $request->input('bank_code');
        $banks_types->bank_name = $request->input('bank_name');
        $banks_types->save();
        return response()->json([
            'status' => 200,
            'message' => 'بانک جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function show(BankType $bankType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks_types = BankType::find($id);
        if ($banks_types) {
            return response()->json([
                'status' => 200,
                'banks_types' => $banks_types,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'بانک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function update(BanksTypesRequest $request, $id)
    {
        $banks_types = BankType::find($id);
        if ($banks_types) {
            $banks_types->bank_code = $request->input('bank_code');
            $banks_types->bank_name = $request->input('bank_name');
            $banks_types->update();
            return response()->json([
                'status' => 200,
                'message' => 'بانک ویرایش شد',
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
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banks_types = BankType::find($id);
        $banks_types->delete();
        return response()->json([
            'status' => 200,
            'message' => 'بانک حذف شد',
        ]);
    }
}
