<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundRequest;
use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function fetchData()
    {
        $funds = Fund::orderBy('id', 'desc')->get();
        return response()->json([
            'funds' => $funds,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/fund.index');
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
    public function store(FundRequest $request)
    {
        $fund = new Fund();
        $fund->form_type = $request->input('form_type');
        $fund->daramad_code = $request->input('daramad_code');
        $fund->daramad_name = $request->input('daramad_name');
        $fund->save();
        return response()->json([
            'status' => 200,
            'message' => 'درآمد، هزینه، صندوق جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fund = Fund::find($id);
        if ($fund) {
            return response()->json([
                'status' => 200,
                'fund' => $fund,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'درآمد، هزینه، صندوق یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fund = Fund::find($id);
        if ($fund) {
            $fund->form_type = $request->input('form_type');
            $fund->daramad_code = $request->input('daramad_code');
            $fund->daramad_name = $request->input('daramad_name');
            $fund->update();
            return response()->json([
                'status' => 200,
                'message' => 'درآمد، هزینه، صندوق ویرایش شد',
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
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund = Fund::find($id);
        $fund->delete();
        return response()->json([
            'status' => 200,
            'message' => 'درآمد، هزینه، صندوق حذف شد',
        ]);
    }
}
