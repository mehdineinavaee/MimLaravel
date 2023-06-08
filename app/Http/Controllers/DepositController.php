<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\BankAccount;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = Deposit::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->place . '</td>
                        <td>' . $item->mark_back . '</td>
                        <td>' . $item->serial_number . '</td>
                        <td>' . $total . ' ریال</td>
                        <td>' . $item->due_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->payer . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_deposit btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/deposit/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $bank_accounts = BankAccount::all();
        return view('cheque-management/deposit.index')
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
    public function store(DepositRequest $request)
    {
        $deposit = new Deposit();
        $deposit->form_number = $request->input('form_number');
        $deposit->form_date = $request->input('form_date');
        $deposit->place = $request->input('place');
        $deposit->mark_back = $request->input('mark_back');
        $deposit->serial_number = $request->input('serial_number');
        $deposit->total = str_replace(",", "", $request->input('total'));
        $deposit->due_date = $request->input('due_date');
        $deposit->payer = $request->input('payer');
        $deposit->bank_account()->associate($request->bank_account_details);
        $deposit->save();
        return self::fetchData(200, 'خواباندن چک به حساب ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit) {
            return response()->json([
                'status' => 200,
                'deposit' => $deposit,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'خواباندن چک به حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(DepositRequest $request, $id)
    {
        $deposit = Deposit::find($id);
        if ($deposit) {
            $deposit->form_number = $request->input('form_number');
            $deposit->form_date = $request->input('form_date');
            $deposit->place = $request->input('place');
            $deposit->mark_back = $request->input('mark_back');
            $deposit->serial_number = $request->input('serial_number');
            $deposit->total = str_replace(",", "", $request->input('total'));
            $deposit->due_date = $request->input('due_date');
            $deposit->payer = $request->input('payer');
            $deposit->bank_account()->associate($request->bank_account_details);
            $deposit->update();
            return self::fetchData(200, 'خواباندن چک به حساب ویرایش شد');
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
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit = Deposit::find($id);
        $deposit->delete();
        return self::fetchData(200, 'خواباندن چک به حساب حذف شد');
    }
}
