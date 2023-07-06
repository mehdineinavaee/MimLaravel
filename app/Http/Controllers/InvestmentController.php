<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestmentRequest;
use App\Models\BankAccount;
use App\Models\Investment;
use App\Models\TarafHesab;
use Illuminate\Support\Facades\Gate;
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
                        <td></td>
                        <td>' . $item->form_date . '</td>
                        <td></td>
                        <td>' . $item->investor->fullname . '</td>
                        <td>' . $index + 1 . '</td>
                        <td></td>
                        <td>' . $cash_amount . ' ریال</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->issue_tracking . '</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_investment btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/investment/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_register', 'LIKE', '%' . $request->search . '%')
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
                                <td></td>
                                <td>' . $item->form_date . '</td>
                                <td></td>
                                <td>' . $item->investor->fullname . '</td>
                                <td>' . $index + 1 . '</td>
                                <td></td>
                                <td>' . $cash_amount . ' ریال</td>
                                <td>' . $item->bank_account->account_number . '</td>
                                <td>' . $item->issue_tracking . '</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" value=' . $item->id . ' class="edit_investment btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/investment/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        if (Gate::allows('investment')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_investment($row, 200, '');
            }
            $investors = TarafHesab::where('chk_investor', '=', 'فعال')->get();
            $bank_accounts = BankAccount::all();
            return view('financial-management/investment.index')
                ->with('investors', $investors)
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
    public function store(InvestmentRequest $request)
    {
        if (Gate::allows('investment')) {
            $investment = new Investment();
            $investment->form_date = $request->input('form_date');
            $investment->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $investment->cash_register = $request->input('cash_register');
            $investment->considerations1 = $request->input('considerations1');
            $investment->date = $request->input('date');
            $investment->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $investment->wage = str_replace(",", "", $request->input('wage'));
            $investment->issue_tracking = $request->input('issue_tracking');
            $investment->considerations2 = $request->input('considerations2');
            $investment->investor()->associate($request->shareholder);
            $investment->bank_account()->associate($request->bank_account_details);
            $investment->save();
            $row = $request["row"];
            return self::index_fetch_investment($row, 200, 'پرداخت شرکاء (سرمایه گذاری) ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('investment')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('investment')) {
            $investment = Investment::find($id);
            if ($investment) {
                $investment->form_date = $request->input('form_date');
                $investment->cash_amount = str_replace(",", "", $request->input('cash_amount'));
                $investment->cash_register = $request->input('cash_register');
                $investment->considerations1 = $request->input('considerations1');
                $investment->date = $request->input('date');
                $investment->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
                $investment->wage = str_replace(",", "", $request->input('wage'));
                $investment->issue_tracking = $request->input('issue_tracking');
                $investment->considerations2 = $request->input('considerations2');
                $investment->investor()->associate($request->shareholder);
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
        } else {
            return abort(401);
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
        if (Gate::allows('investment')) {
            $investment = Investment::find($id);
            $investment->delete();
            return self::index_fetch_investment(10, 200, 'پرداخت شرکاء (سرمایه گذاری) حذف شد');
        } else {
            return abort(401);
        }
    }
}
