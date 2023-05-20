<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundToBankRequest;
use App\Models\FundToBank;
use Illuminate\Http\Request;

class FundToBankController extends Controller
{
    public function fetchFundToBank()
    {
        $fund_to_bank = FundToBank::orderBy('id', 'desc')->get();
        return response()->json([
            'fund_to_bank' => $fund_to_bank,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/fund-to-bank.index');
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
    public function store(FundToBankRequest $request)
    {
        $fund_to_bank = new FundToBank();
        $fund_to_bank->bank = $request->input('bank');
        $fund_to_bank->form_date = $request->input('form_date');
        $fund_to_bank->form_number = $request->input('form_number');
        $fund_to_bank->cash_amount = $request->input('cash_amount');
        $fund_to_bank->considerations = $request->input('considerations');
        $fund_to_bank->save();
        return response()->json([
            'status' => 200,
            'message' => 'از صندوق به بانک جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function show(FundToBank $fundToBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fund_to_bank = FundToBank::find($id);
        if ($fund_to_bank) {
            return response()->json([
                'status' => 200,
                'fund_to_bank' => $fund_to_bank,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'از صندوق به بانک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function update(FundToBankRequest $request, $id)
    {
        $fund_to_bank = FundToBank::find($id);
        if ($fund_to_bank) {
            $fund_to_bank->bank = $request->input('bank');
            $fund_to_bank->form_date = $request->input('form_date');
            $fund_to_bank->form_number = $request->input('form_number');
            $fund_to_bank->cash_amount = $request->input('cash_amount');
            $fund_to_bank->considerations = $request->input('considerations');
            $fund_to_bank->update();
            return response()->json([
                'status' => 200,
                'message' => 'از صندوق به بانک ویرایش شد',
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
     * @param  \App\Models\FundToBank  $fundToBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund_to_bank = FundToBank::find($id);
        $fund_to_bank->delete();
        return response()->json([
            'status' => 200,
            'message' => 'از صندوق به بانک حذف شد',
        ]);
    }
}
