<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayReturningChequeRequest;
use App\Models\BankAccount;
use App\Models\PayReturningCheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PayReturningChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_pay_returning_cheque($row, $status, $message)
    {
        $data = PayReturningCheque::orderBy('id', 'desc')->paginate($row);

        $pay_returning_cheques = '';

        $count = DB::table('pay_returning_cheques')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                if ($item->wage != null) {
                    $wage = number_format($item->wage);
                } else {
                    $wage = '-';
                }

                $pay_returning_cheques .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $item->serial_number . '</td>
                        <td>' . $total . ' ریال</td>
                        <td>' . $wage . ' ریال</td>
                        <td>' . $item->due_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->receiver . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_pay_returning_cheque btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/pay-returning-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $pay_returning_cheques,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_pay_returning_cheque(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $pay_returning_cheques = PayReturningCheque::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('total', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('wage', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('receiver', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($pay_returning_cheques) {
                foreach ($pay_returning_cheques as $index => $item) {
                    if ($item->total != null) {
                        $total = number_format($item->total);
                    } else {
                        $total = '-';
                    }

                    if ($item->wage != null) {
                        $wage = number_format($item->wage);
                    } else {
                        $wage = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->form_date . '</td>
                            <td>' . $item->form_number . '</td>
                            <td>' . $item->serial_number . '</td>
                            <td>' . $total . ' ریال</td>
                            <td>' . $wage . ' ریال</td>
                            <td>' . $item->due_date . '</td>
                            <td>' . $item->bank_account->account_number . '</td>
                            <td>' . $item->receiver . '</td>
                            <td>' . $item->considerations . '</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_pay_returning_cheque btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/pay-returning-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$pay_returning_cheques->links(),
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
        if ($request->ajax()) {
            $row = $request["row"];
            return self::index_fetch_pay_returning_cheque($row, 200, '');
        }
        $bank_accounts = BankAccount::all();
        return view('cheque-management/pay-returning-cheque.index')
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
    public function store(PayReturningChequeRequest $request)
    {
        $pay_returning_cheque = new PayReturningCheque();
        $pay_returning_cheque->form_date = $request->input('form_date');
        $pay_returning_cheque->form_number = $request->input('form_number');
        $pay_returning_cheque->serial_number = $request->input('serial_number');
        $pay_returning_cheque->total = str_replace(",", "", $request->input('total'));
        $pay_returning_cheque->wage = str_replace(",", "", $request->input('wage'));
        $pay_returning_cheque->due_date = $request->input('due_date');
        $pay_returning_cheque->receiver = $request->input('receiver');
        $pay_returning_cheque->considerations = $request->input('considerations');
        $pay_returning_cheque->bank_account()->associate($request->bank_account_details);
        $pay_returning_cheque->save();
        $row = $request["row"];
        return self::index_fetch_pay_returning_cheque($row, 200, 'برگشت چک ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(PayReturningCheque $payReturningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        if ($pay_returning_cheque) {
            return response()->json([
                'status' => 200,
                'pay_returning_cheque' => $pay_returning_cheque,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'برگشت چک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(PayReturningChequeRequest $request, $id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        if ($pay_returning_cheque) {
            $pay_returning_cheque->form_date = $request->input('form_date');
            $pay_returning_cheque->form_number = $request->input('form_number');
            $pay_returning_cheque->serial_number = $request->input('serial_number');
            $pay_returning_cheque->total = str_replace(",", "", $request->input('total'));
            $pay_returning_cheque->wage = str_replace(",", "", $request->input('wage'));
            $pay_returning_cheque->due_date = $request->input('due_date');
            $pay_returning_cheque->receiver = $request->input('receiver');
            $pay_returning_cheque->considerations = $request->input('considerations');
            $pay_returning_cheque->bank_account()->associate($request->bank_account_details);
            $pay_returning_cheque->update();
            $row = $request["row"];
            return self::index_fetch_pay_returning_cheque($row, 200, 'برگشت چک ویرایش شد');
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
     * @param  \App\Models\PayReturningCheque  $payReturningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay_returning_cheque = PayReturningCheque::find($id);
        $pay_returning_cheque->delete();
        return self::index_fetch_pay_returning_cheque(10, 200, 'برگشت چک حذف شد');
    }
}
