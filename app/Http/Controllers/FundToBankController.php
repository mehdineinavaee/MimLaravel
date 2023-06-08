<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundToBankRequest;
use App\Models\BankType;
use App\Models\FundToBank;
use Illuminate\Http\Request;

class FundToBankController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = FundToBank::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->bank_type->bank_name . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $cash_amount . ' ریال</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_fund_to_bank btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/fund-to-bank/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                ';
            }
            return response()->json([
                'output' => $output,
                'pagination' => (string)$data->links(),
                'status' => $status,
                'message' => $message,
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::fetchData(200, '');
        }
        $bank_types = BankType::all();
        return view('financial-management/fund-to-bank.index')
            ->with('bank_types', $bank_types);
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
        $fund_to_bank->form_date = $request->input('form_date');
        $fund_to_bank->form_number = $request->input('form_number');
        $fund_to_bank->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $fund_to_bank->considerations = $request->input('considerations');
        $fund_to_bank->bank_type()->associate($request->bank);
        $fund_to_bank->save();
        return self::fetchData(200, 'از صندوق به بانک جدید ذخیره شد');
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
            $fund_to_bank->form_date = $request->input('form_date');
            $fund_to_bank->form_number = $request->input('form_number');
            $fund_to_bank->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $fund_to_bank->considerations = $request->input('considerations');
            $fund_to_bank->bank_type()->associate($request->bank);
            $fund_to_bank->update();
            return self::fetchData(200, 'از صندوق به بانک ویرایش شد');
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
        return self::fetchData(200, 'از صندوق به بانک حذف شد');
    }
}
