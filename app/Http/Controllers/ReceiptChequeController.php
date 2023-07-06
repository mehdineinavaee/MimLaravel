<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptChequeRequest;
use App\Models\BankAccount;
use App\Models\ReceiptCheque;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReceiptChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_receipt_cheque($row, $status, $message)
    {
        $data = ReceiptCheque::orderBy('id', 'desc')->paginate($row);

        $receipt_cheques = '';

        $count = DB::table('receipt_cheques')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                $receipt_cheques .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $receipt_cheques,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_receipt_cheque(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $receipt_cheques = ReceiptCheque::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('total', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('receiver', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($receipt_cheques) {
                foreach ($receipt_cheques as $index => $item) {
                    if ($item->total != null) {
                        $total = number_format($item->total);
                    } else {
                        $total = '-';
                    }

                    $search .=
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
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$receipt_cheques->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('receipt_cheque')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_receipt_cheque($row, 200, '');
            }
            $bank_accounts = BankAccount::all();
            return view('cheque-management/receipt-cheque.index')
                ->with('bank_accounts', $bank_accounts);
        } else {
            return abort(401);
        }
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
        if (Gate::allows('receipt_cheque')) {
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
            $row = $request["row"];
            return self::index_fetch_receipt_cheque($row, 200, 'اعلام وصول چک ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('receipt_cheque')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('receipt_cheque')) {
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
                $row = $request["row"];
                return self::index_fetch_receipt_cheque($row, 200, 'اعلام وصول چک ویرایش شد');
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
     * @param  \App\Models\ReceiptCheque  $receiptCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('receipt_cheque')) {
            $receipt_cheque = ReceiptCheque::find($id);
            $receipt_cheque->delete();
            return self::index_fetch_receipt_cheque(10, 200, 'اعلام وصول چک حذف شد');
        } else {
            return abort(401);
        }
    }
}
