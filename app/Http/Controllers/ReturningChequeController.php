<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturningChequeRequest;
use App\Models\BankAccount;
use App\Models\ReturningCheque;
use Illuminate\Http\Request;

class ReturningChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = ReturningCheque::orderBy('id', 'desc')->paginate();

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
                        <td>' . $item->mark_back . '</td>
                        <td>' . $item->serial_number . '</td>
                        <td>' . $total . ' ریال</td>
                        <td>' . $item->due_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->payer . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_returning_cheque btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/returning-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('cheque-management/returning-cheque.index')
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
    public function store(ReturningChequeRequest $request)
    {
        $returning_cheque = new ReturningCheque();
        $returning_cheque->form_date = $request->input('form_date');
        $returning_cheque->form_number = $request->input('form_number');
        $returning_cheque->mark_back = $request->input('mark_back');
        $returning_cheque->serial_number = $request->input('serial_number');
        $returning_cheque->total = str_replace(",", "", $request->input('total'));
        $returning_cheque->due_date = $request->input('due_date');
        $returning_cheque->payer = $request->input('payer');
        $returning_cheque->considerations = $request->input('considerations');
        $returning_cheque->bank_account()->associate($request->bank_account_details);
        $returning_cheque->save();
        return self::fetchData(200, 'برگشت چک ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $returning_cheque = ReturningCheque::find($id);
        if ($returning_cheque) {
            return response()->json([
                'status' => 200,
                'returning_cheque' => $returning_cheque,
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReturningChequeRequest $request, $id)
    {
        $returning_cheque = ReturningCheque::find($id);
        if ($returning_cheque) {
            $returning_cheque->form_date = $request->input('form_date');
            $returning_cheque->form_number = $request->input('form_number');
            $returning_cheque->mark_back = $request->input('mark_back');
            $returning_cheque->serial_number = $request->input('serial_number');
            $returning_cheque->total = str_replace(",", "", $request->input('total'));
            $returning_cheque->due_date = $request->input('due_date');
            $returning_cheque->payer = $request->input('payer');
            $returning_cheque->considerations = $request->input('considerations');
            $returning_cheque->bank_account()->associate($request->bank_account_details);
            $returning_cheque->update();
            return self::fetchData(200, 'برگشت چک ویرایش شد');
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $returning_cheque = ReturningCheque::find($id);
        $returning_cheque->delete();
        return self::fetchData(200, 'برگشت چک حذف شد');
    }
}
