<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankToFundRequest;
use App\Models\BankAccount;
use App\Models\BankToFund;
use App\Models\BankType;
use Illuminate\Http\Request;

class BankToFundController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = BankToFund::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                if ($item->deposit_amount != null) {
                    $deposit_amount = number_format($item->deposit_amount);
                } else {
                    $deposit_amount = '-';
                }

                if ($item->wage != null) {
                    $wage = number_format($item->wage);
                } else {
                    $wage = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->bank_type->bank_name . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $cash_amount . ' ریال</td>
                        <td>' . $item->considerations1 . '</td>
                        <td>' . $item->date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $deposit_amount . ' ریال</td>
                        <td>' . $wage . ' ریال</td>
                        <td>' . $item->issue_tracking . '</td>
                        <td>' . $item->considerations2 . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_bank_to_fund btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-to-fund/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $banks_types = BankType::all();
        $bank_accounts = BankAccount::all();
        return view('financial-management/bank-to-fund.index')
            ->with('banks_types', $banks_types)
            ->with('bank_accounts', $bank_accounts);
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
    public function store(BankToFundRequest $request)
    {
        $bank_to_fund = new BankToFund();
        $bank_to_fund->form_date = $request->input('form_date');
        $bank_to_fund->form_number = $request->input('form_number');
        $bank_to_fund->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $bank_to_fund->considerations1 = $request->input('considerations1');
        $bank_to_fund->date = $request->input('date');
        $bank_to_fund->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
        $bank_to_fund->wage = str_replace(",", "", $request->input('wage'));
        $bank_to_fund->issue_tracking = $request->input('issue_tracking');
        $bank_to_fund->considerations2 = $request->input('considerations2');
        $bank_to_fund->bank_type()->associate($request->bank);
        $bank_to_fund->bank_account()->associate($request->bank_account_details);
        $bank_to_fund->save();
        return self::fetchData(200, 'از بانک به صندوق جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function show(BankToFund $bankToFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_to_fund = BankToFund::find($id);
        if ($bank_to_fund) {
            return response()->json([
                'status' => 200,
                'bank_to_fund' => $bank_to_fund,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'از بانک به صندوق یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function update(BankToFundRequest $request, $id)
    {
        $bank_to_fund = BankToFund::find($id);
        if ($bank_to_fund) {
            $bank_to_fund->form_date = $request->input('form_date');
            $bank_to_fund->form_number = $request->input('form_number');
            $bank_to_fund->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $bank_to_fund->considerations1 = $request->input('considerations1');
            $bank_to_fund->date = $request->input('date');
            $bank_to_fund->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $bank_to_fund->wage = str_replace(",", "", $request->input('wage'));
            $bank_to_fund->issue_tracking = $request->input('issue_tracking');
            $bank_to_fund->considerations2 = $request->input('considerations2');
            $bank_to_fund->bank_type()->associate($request->bank);
            $bank_to_fund->bank_account()->associate($request->bank_account_details);
            $bank_to_fund->update();
            return self::fetchData(200, 'از بانک به صندوق ویرایش شد');
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
     * @param  \App\Models\BankToFund  $bankToFund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_to_fund = BankToFund::find($id);
        $bank_to_fund->delete();
        return self::fetchData(200, 'از بانک به صندوق حذف شد');
    }
}
