<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\BankAccount;
use App\Models\Deposit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_deposit($row, $status, $message)
    {
        $data = Deposit::orderBy('id', 'desc')->paginate($row);

        $deposits = '';

        $count = DB::table('deposits')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                $deposits .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $deposits,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_deposit(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $deposits = Deposit::where('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('place', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('mark_back', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('total', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payer', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($deposits) {
                foreach ($deposits as $index => $item) {
                    if ($item->total != null) {
                        $total = number_format($item->total);
                    } else {
                        $total = '-';
                    }

                    $search .=
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
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$deposits->links(),
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
        if (Gate::allows('deposit')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_deposit($row, 200, '');
            }
            $bank_accounts = BankAccount::all();
            return view('cheque-management/deposit.index')
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
    public function store(DepositRequest $request)
    {
        if (Gate::allows('deposit')) {
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
            $row = $request["row"];
            return self::index_fetch_deposit($row, 200, 'خواباندن چک به حساب ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('deposit')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('deposit')) {
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
                $row = $request["row"];
                return self::index_fetch_deposit($row, 200, 'خواباندن چک به حساب ویرایش شد');
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
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('deposit')) {
            $deposit = Deposit::find($id);
            $deposit->delete();
            return self::index_fetch_deposit(10, 200, 'خواباندن چک به حساب حذف شد');
        } else {
            return abort(401);
        }
    }
}
