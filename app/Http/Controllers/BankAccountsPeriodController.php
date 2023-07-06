<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountsPeriodRequest;
use App\Models\BankAccount;
use App\Models\BankAccountsPeriod;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BankAccountsPeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_bank_accounts_period($row, $status, $message)
    {
        $data = BankAccountsPeriod::orderBy('id', 'desc')->paginate($row);

        $bank_accounts_periods = '';

        $count = DB::table('bank_accounts_periods')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $bank_accounts_periods .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_bank_accounts_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-accounts-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $bank_accounts_periods,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_bank_accounts_period(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $bank_accounts_periods = BankAccountsPeriod::where('amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($bank_accounts_periods) {
                foreach ($bank_accounts_periods as $index => $item) {
                    $search .=
                        '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . number_format($item->amount) . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_bank_accounts_period btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-accounts-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$bank_accounts_periods->links(),
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
        if (Gate::allows('bank_accounts_period')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_bank_accounts_period($row, 200, '');
            }
            $bank_accounts = BankAccount::all();
            return view('first-period/bank-accounts-period.index')
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
    public function store(BankAccountsPeriodRequest $request)
    {
        if (Gate::allows('bank_accounts_period')) {
            $bank_accounts_period = new BankAccountsPeriod();
            $bank_accounts_period->amount = str_replace(",", "", $request->input('amount'));
            $bank_accounts_period->considerations = $request->input('considerations');
            $bank_accounts_period->bank_account()->associate($request->bank_account);
            $bank_accounts_period->save();
            $row = $request["row"];
            return self::index_fetch_bank_accounts_period($row, 200, 'اول دوره حساب های بانکی ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccountsPeriod $bankAccountsPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('bank_accounts_period')) {
            $bank_accounts_period = BankAccountsPeriod::find($id);
            if ($bank_accounts_period) {
                return response()->json([
                    'status' => 200,
                    'bank_accounts_period' => $bank_accounts_period,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اول دوره حساب های بانکی یافت نشد',
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
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountsPeriodRequest $request, $id)
    {
        if (Gate::allows('bank_accounts_period')) {
            $bank_accounts_period = BankAccountsPeriod::find($id);
            if ($bank_accounts_period) {
                $bank_accounts_period->amount = str_replace(",", "", $request->input('amount'));
                $bank_accounts_period->considerations = $request->input('considerations');
                $bank_accounts_period->bank_account()->associate($request->bank_account);
                $bank_accounts_period->update();
                $row = $request["row"];
                return self::index_fetch_bank_accounts_period($row, 200, 'اول دوره حساب های بانکی ویرایش شد');
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
     * @param  \App\Models\BankAccountsPeriod  $bankAccountsPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('bank_accounts_period')) {
            $bank_accounts_period = BankAccountsPeriod::find($id);
            $bank_accounts_period->delete();
            return self::index_fetch_bank_accounts_period(10, 200, 'اول دوره حساب های بانکی حذف شد');
        } else {
            return abort(401);
        }
    }
}
