<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptChequeRequest;
use App\Models\BankAccount;
use App\Models\ReceiptCheque;
use Illuminate\Http\Request;

class ReceiptChequeController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = ReceiptCheque::orderBy('id', 'desc')->paginate(10);

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
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $item->serial_number . '</td>
                        <td>' . $total . ' ریال</td>
                        <td>' . $item->due_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->receiver . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_receipt_cheque btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/receipt-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('cheque-management/receipt-cheque.index')
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
    public function store(ReceiptChequeRequest $request)
    {
        $receipt_cheque = new ReceiptCheque();
        $receipt_cheque->form_date = $request->input('form_date');
        $receipt_cheque->form_number = $request->input('form_number');
        $receipt_cheque->serial_number = $request->input('serial_number');
        $receipt_cheque->total = str_replace(",", "", $request->input('total'));
        $receipt_cheque->due_date = $request->input('due_date');
        $receipt_cheque->receiver = $request->input('receiver');
        $receipt_cheque->considerations = $request->input('considerations');
        $receipt_cheque->bank_account()->associate($request->bank_account_details);
        $receipt_cheque->save();
        return self::fetchData(200, 'اعلام وصول چک ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptCheque $receiptCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        if ($receipt_cheque) {
            return response()->json([
                'status' => 200,
                'receipt_cheque' => $receipt_cheque,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اعلام وصول چک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptChequeRequest $request, $id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        if ($receipt_cheque) {
            $receipt_cheque->form_date = $request->input('form_date');
            $receipt_cheque->form_number = $request->input('form_number');
            $receipt_cheque->serial_number = $request->input('serial_number');
            $receipt_cheque->total = str_replace(",", "", $request->input('total'));
            $receipt_cheque->due_date = $request->input('due_date');
            $receipt_cheque->receiver = $request->input('receiver');
            $receipt_cheque->considerations = $request->input('considerations');
            $receipt_cheque->bank_account()->associate($request->bank_account_details);
            $receipt_cheque->update();
            return self::fetchData(200, 'اعلام وصول چک ویرایش شد');
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
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt_cheque = ReceiptCheque::find($id);
        $receipt_cheque->delete();
        return self::fetchData(200, 'اعلام وصول چک حذف شد');
    }
}
