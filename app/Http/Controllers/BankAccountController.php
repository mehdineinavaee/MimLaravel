<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountsRequest;
use App\Models\BankAccount;
use App\Models\BankType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BankAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_bank_account($row, $status, $message)
    {
        $data = BankAccount::orderBy('id', 'desc')->paginate($row);

        $bank_accounts = '';

        $count = DB::table('bank_accounts')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $bank_accounts .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->account_type . '</td>
                        <td>' . $item->account_number . '</td>
                        <td>' . $item->shaba_number . '</td>
                        <td>' . $item->cart_number . '</td>
                        <td>' . $item->bank_type->bank_name . '</td>
                        <td>' . $item->branch_name . '</td>
                        <td>' . $item->branch_address . '</td>
                        <td>' . $item->cheque_print_type . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_bank_accounts btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-accounts/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $bank_accounts,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_bank_account(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $bank_accounts = BankAccount::where('account_type', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('shaba_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cart_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('branch_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('branch_address', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cheque_print_type', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($bank_accounts) {
                foreach ($bank_accounts as $index => $item) {
                    $search .=
                        '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->account_type . '</td>
                        <td>' . $item->account_number . '</td>
                        <td>' . $item->shaba_number . '</td>
                        <td>' . $item->cart_number . '</td>
                        <td>' . $item->bank_type->bank_name . '</td>
                        <td>' . $item->branch_name . '</td>
                        <td>' . $item->branch_address . '</td>
                        <td>' . $item->cheque_print_type . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_bank_accounts btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/bank-accounts/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$bank_accounts->links(),
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
        if (Gate::allows('bank_accounts')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_bank_account($row, 200, '');
            }
            $banks_types = BankType::orderBy('bank_name')->get();
            return view('taarife-payeh/bank-accounts.index')
                ->with('banks_types', $banks_types);
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
    public function store(BankAccountsRequest $request)
    {
        if (Gate::allows('bank_accounts')) {
            $bank_accounts = new BankAccount();
            $bank_accounts->chk_active = $request->chk_active;
            $bank_accounts->account_type = $request->input('account_type');
            $bank_accounts->account_number = $request->input('account_number');
            $bank_accounts->shaba_number = $request->input('shaba_number');
            $bank_accounts->cart_number = $request->input('cart_number');
            $bank_accounts->branch_name = $request->input('branch_name');
            $bank_accounts->branch_address = $request->input('branch_address');
            $bank_accounts->cheque_print_type = $request->input('cheque_print_type');
            $bank_accounts->bank_type()->associate($request->bank_type);
            $bank_accounts->save();
            $row = $request["row"];
            return self::index_fetch_bank_account($row, 200, 'حساب بانکی جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('bank_accounts')) {
            $bank_accounts = BankAccount::find($id);
            if ($bank_accounts) {
                return response()->json([
                    'status' => 200,
                    'bank_accounts' => $bank_accounts,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'حساب بانکی یافت نشد',
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
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountsRequest $request, $id)
    {
        if (Gate::allows('bank_accounts')) {
            $bank_accounts = BankAccount::find($id);
            if ($bank_accounts) {
                $bank_accounts->chk_active = $request->chk_active;
                $bank_accounts->account_type = $request->input('account_type');
                $bank_accounts->account_number = $request->input('account_number');
                $bank_accounts->shaba_number = $request->input('shaba_number');
                $bank_accounts->cart_number = $request->input('cart_number');
                $bank_accounts->branch_name = $request->input('branch_name');
                $bank_accounts->branch_address = $request->input('branch_address');
                $bank_accounts->cheque_print_type = $request->input('cheque_print_type');
                $bank_accounts->fill($request->only(['account_type', 'account_number', 'shaba_number', 'cart_number', 'bank_name', 'branch_name', 'branch_address', 'cheque_print_type'])); // 'cover nabayad dashte bashe choon dar virayesh ax moshkel be vojood miyad'
                $bank_accounts->bank_type()->associate($request->bank_type);
                $bank_accounts->save();
                $row = $request["row"];
                return self::index_fetch_bank_account($row, 200, 'حساب بانکی ویرایش شد');
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
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('bank_accounts')) {
            $bank_accounts = BankAccount::find($id);
            $bank_accounts->delete();
            return self::index_fetch_bank_account(10, 200, 'حساب بانکی حذف شد');
        } else {
            return abort(401);
        }
    }
}
