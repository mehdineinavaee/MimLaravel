<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveMiscellaneousIncomeRequest;
use App\Models\BankAccount;
use App\Models\Fund;
use App\Models\ReceiveMiscellaneousIncome;
use Illuminate\Http\Request;

class ReceiveMiscellaneousIncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = ReceiveMiscellaneousIncome::orderBy('id', 'desc')->paginate();

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
                        <td>' . $item->fund->daramad_name . '</td>
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
                            <button type="button" value=' . $item->id . ' class="edit_receive_miscellaneous_income btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/receive-miscellaneous-income/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $funds = Fund::where('form_type', '=', 1)->orderBy('id', 'asc')->get();
        $bank_accounts = BankAccount::all();
        return view('financial-management/receive-miscellaneous-income.index')
            ->with('funds', $funds)
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
    public function store(ReceiveMiscellaneousIncomeRequest $request)
    {
        $receive_miscellaneous_income = new ReceiveMiscellaneousIncome();
        $receive_miscellaneous_income->form_date = $request->input('form_date');
        $receive_miscellaneous_income->form_number = $request->input('form_number');
        $receive_miscellaneous_income->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $receive_miscellaneous_income->considerations1 = $request->input('considerations1');
        $receive_miscellaneous_income->date = $request->input('date');
        $receive_miscellaneous_income->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
        $receive_miscellaneous_income->wage = str_replace(",", "", $request->input('wage'));
        $receive_miscellaneous_income->issue_tracking = $request->input('issue_tracking');
        $receive_miscellaneous_income->considerations2 = $request->input('considerations2');
        $receive_miscellaneous_income->fund()->associate($request->income_title);
        $receive_miscellaneous_income->bank_account()->associate($request->bank_account_details);
        $receive_miscellaneous_income->save();
        return self::fetchData(200, 'دریافت درآمد متفرقه جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveMiscellaneousIncome $receiveMiscellaneousIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        if ($receive_miscellaneous_income) {
            return response()->json([
                'status' => 200,
                'receive_miscellaneous_income' => $receive_miscellaneous_income,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'دریافت درآمد متفرقه یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveMiscellaneousIncomeRequest $request, $id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        if ($receive_miscellaneous_income) {
            $receive_miscellaneous_income->form_date = $request->input('form_date');
            $receive_miscellaneous_income->form_number = $request->input('form_number');
            $receive_miscellaneous_income->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $receive_miscellaneous_income->considerations1 = $request->input('considerations1');
            $receive_miscellaneous_income->date = $request->input('date');
            $receive_miscellaneous_income->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $receive_miscellaneous_income->wage = str_replace(",", "", $request->input('wage'));
            $receive_miscellaneous_income->issue_tracking = $request->input('issue_tracking');
            $receive_miscellaneous_income->considerations2 = $request->input('considerations2');
            $receive_miscellaneous_income->fund()->associate($request->income_title);
            $receive_miscellaneous_income->bank_account()->associate($request->bank_account_details);
            $receive_miscellaneous_income->update();
            return self::fetchData(200, 'دریافت درآمد متفرقه ویرایش شد');
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
     * @param  \App\Models\ReceiveMiscellaneousIncome  $receiveMiscellaneousIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receive_miscellaneous_income = ReceiveMiscellaneousIncome::find($id);
        $receive_miscellaneous_income->delete();
        return self::fetchData(200, 'دریافت درآمد متفرقه حذف شد');
    }
}
