<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestmentRequest;
use App\Models\BankAccount;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_investment($row, $status, $message)
    {
        $data = Investment::orderBy('id', 'desc')->paginate($row);

        $investments = '';

        $count = DB::table('investments')->count();

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

                $investments .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->from_bank->bank_name . '</td>
                        <td>' . $item->to_bank->bank_name . '</td>
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
                            <button type="button" value=' . $item->id . ' class="edit_bank_to_bank btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-to-bank/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $investments,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_investment(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $investments = Investment::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations1', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('deposit_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('wage', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('issue_tracking', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations2', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($investments) {
                foreach ($investments as $index => $item) {
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

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->from_bank->bank_name . '</td>
                            <td>' . $item->to_bank->bank_name . '</td>
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
                                <button type="button" value=' . $item->id . ' class="edit_bank_to_bank btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/bank-to-bank/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$investments->links(),
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
            return self::index_fetch_investment($row, 200, '');
        }
        $bank_accounts = BankAccount::all();
        return view('financial-management/investment.index')
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
    public function store(InvestmentRequest $request)
    {
        $investment = new Investment();
        $investment->form_date = $request->input('form_date');
        $investment->form_number = $request->input('form_number');
        $investment->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $investment->considerations1 = $request->input('considerations1');
        $investment->date = $request->input('date');
        $investment->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
        $investment->wage = str_replace(",", "", $request->input('wage'));
        $investment->issue_tracking = $request->input('issue_tracking');
        $investment->considerations2 = $request->input('considerations2');
        $investment->bank_account()->associate($request->bank_account_details);
        $investment->save();
        $row = $request["row"];
        return self::index_fetch_investment($row, 200, 'پرداخت شرکاء (سرمایه گذاری) ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investment = Investment::find($id);
        if ($investment) {
            return response()->json([
                'status' => 200,
                'investment' => $investment,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(InvestmentRequest $request, $id)
    {
        $investment = Investment::find($id);
        if ($investment) {
            $investment->form_date = $request->input('form_date');
            $investment->form_number = $request->input('form_number');
            $investment->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $investment->considerations1 = $request->input('considerations1');
            $investment->date = $request->input('date');
            $investment->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $investment->wage = str_replace(",", "", $request->input('wage'));
            $investment->issue_tracking = $request->input('issue_tracking');
            $investment->considerations2 = $request->input('considerations2');
            $investment->from_bank()->associate($request->from_bank);
            $investment->to_bank()->associate($request->to_bank);
            $investment->bank_account()->associate($request->bank_account_details);
            $investment->update();
            $row = $request["row"];
            return self::index_fetch_investment($row, 200, 'پرداخت شرکاء (سرمایه گذاری) ویرایش شد');
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
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investment = Investment::find($id);
        $investment->delete();
        return self::index_fetch_investment(10, 200, 'پرداخت شرکاء (سرمایه گذاری) حذف شد');
    }
}
