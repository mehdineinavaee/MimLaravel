<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveFromTheAccountRequest;
use App\Models\BankAccount;
use App\Models\ReceiveFromTheAccount;
use App\Models\TarafHesab;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReceiveFromTheAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_receive_from_the_account($row, $status, $message)
    {
        $data = ReceiveFromTheAccount::orderBy('id', 'desc')->paginate($row);

        $receive_from_the_accounts = '';

        $count = DB::table('receive_from_the_accounts')->count();

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

                if ($item->paid_discount != null) {
                    $paid_discount = number_format($item->paid_discount);
                } else {
                    $paid_discount = '-';
                }

                $receive_from_the_accounts .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->taraf_hesab->fullname . '</td>
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
                        <td>' . $paid_discount . ' ریال</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_receive_from_the_account btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/receive-from-the-account/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $receive_from_the_accounts,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_receive_from_the_account(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $receive_from_the_accounts = ReceiveFromTheAccount::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations1', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('deposit_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('wage', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('issue_tracking', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations2', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('paid_discount', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($receive_from_the_accounts) {
                foreach ($receive_from_the_accounts as $index => $item) {
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

                    if ($item->paid_discount != null) {
                        $paid_discount = number_format($item->paid_discount);
                    } else {
                        $paid_discount = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->taraf_hesab->fullname . '</td>
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
                            <td>' . $paid_discount . ' ریال</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_receive_from_the_account btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/receive-from-the-account/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$receive_from_the_accounts->links(),
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
        if (Gate::allows('receive_from_the_account')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_receive_from_the_account($row, 200, '');
            }
            $taraf_hesabs = TarafHesab::all();
            $bank_accounts = BankAccount::all();
            return view('financial-management/receive-from-the-account.index')
                ->with('taraf_hesabs', $taraf_hesabs)
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
    public function store(ReceiveFromTheAccountRequest $request)
    {
        if (Gate::allows('receive_from_the_account')) {
            $receive_from_the_account = new ReceiveFromTheAccount();
            $receive_from_the_account->form_date = $request->input('form_date');
            $receive_from_the_account->form_number = $request->input('form_number');
            $receive_from_the_account->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $receive_from_the_account->considerations1 = $request->input('considerations1');
            $receive_from_the_account->date = $request->input('date');
            $receive_from_the_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $receive_from_the_account->wage = str_replace(",", "", $request->input('wage'));
            $receive_from_the_account->issue_tracking = $request->input('issue_tracking');
            $receive_from_the_account->considerations2 = $request->input('considerations2');
            $receive_from_the_account->paid_discount = str_replace(",", "", $request->input('paid_discount'));
            $receive_from_the_account->taraf_hesab()->associate($request->taraf_hesab_name);
            $receive_from_the_account->bank_account()->associate($request->bank_account_details);
            $receive_from_the_account->save();
            $row = $request["row"];
            return self::index_fetch_receive_from_the_account($row, 200, 'دریافت جدید از طرف حساب ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiveFromTheAccount $receiveFromTheAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('receive_from_the_account')) {
            $receive_from_the_account = ReceiveFromTheAccount::find($id);
            if ($receive_from_the_account) {
                return response()->json([
                    'status' => 200,
                    'receive_from_the_account' => $receive_from_the_account,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'دریافت از طرف حساب یافت نشد',
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
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiveFromTheAccountRequest $request, $id)
    {
        if (Gate::allows('receive_from_the_account')) {
            $receive_from_the_account = ReceiveFromTheAccount::find($id);
            if ($receive_from_the_account) {
                $receive_from_the_account->form_date = $request->input('form_date');
                $receive_from_the_account->form_number = $request->input('form_number');
                $receive_from_the_account->cash_amount = str_replace(",", "", $request->input('cash_amount'));
                $receive_from_the_account->considerations1 = $request->input('considerations1');
                $receive_from_the_account->date = $request->input('date');
                $receive_from_the_account->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
                $receive_from_the_account->wage = str_replace(",", "", $request->input('wage'));
                $receive_from_the_account->issue_tracking = $request->input('issue_tracking');
                $receive_from_the_account->considerations2 = $request->input('considerations2');
                $receive_from_the_account->paid_discount = str_replace(",", "", $request->input('paid_discount'));
                $receive_from_the_account->taraf_hesab()->associate($request->taraf_hesab_name);
                $receive_from_the_account->bank_account()->associate($request->bank_account_details);
                $receive_from_the_account->update();
                $row = $request["row"];
                return self::index_fetch_receive_from_the_account($row, 200, 'دریافت از طرف حساب ویرایش شد');
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
     * @param  \App\Models\ReceiveFromTheAccount  $receiveFromTheAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('receive_from_the_account')) {
            $receive_from_the_account = ReceiveFromTheAccount::find($id);
            $receive_from_the_account->delete();
            return self::index_fetch_receive_from_the_account(10, 200, 'دریافت از طرف حساب حذف شد');
        } else {
            return abort(401);
        }
    }
}
