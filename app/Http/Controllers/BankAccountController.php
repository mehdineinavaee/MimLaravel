<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountsRequest;
use App\Models\BankAccount;
use App\Models\BankType;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function fetchData()
    {
        $bank_accounts = BankAccount::orderBy('id', 'desc')->get();
        return response()->json([
            'bank_accounts' => $bank_accounts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks_types = BankType::orderBy('bank_name')->get();
        return view('taarife-payeh/bank-accounts.index')
            ->with('banks_types', $banks_types);
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
        $bank_accounts = new BankAccount();
        $bank_accounts->account_type = $request->input('account_type');
        $bank_accounts->account_number = $request->input('account_number');
        $bank_accounts->shaba_number = $request->input('shaba_number');
        $bank_accounts->cart_number = $request->input('cart_number');
        $bank_accounts->bank_name = $request->input('bank_name');
        $bank_accounts->branch_name = $request->input('branch_name');
        $bank_accounts->branch_address = $request->input('branch_address');
        $bank_accounts->cheque_print_type = $request->input('cheque_print_type');
        $bank_accounts->save();
        $bank_accounts->bank_types()->attach($request->bank_types);
        return response()->json([
            'status' => 200,
            'message' => 'حساب بانکی جدید ذخیره شد',
        ]);
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
        $bank_accounts = BankAccount::find($id);
        if ($bank_accounts) {
            $bank_accounts->account_type = $request->input('account_type');
            $bank_accounts->account_number = $request->input('account_number');
            $bank_accounts->shaba_number = $request->input('shaba_number');
            $bank_accounts->cart_number = $request->input('cart_number');
            $bank_accounts->bank_name = $request->input('bank_name');
            $bank_accounts->branch_name = $request->input('branch_name');
            $bank_accounts->branch_address = $request->input('branch_address');
            $bank_accounts->cheque_print_type = $request->input('cheque_print_type');
            $bank_accounts->fill($request->only(['account_type', 'account_number', 'shaba_number', 'cart_number', 'bank_name', 'branch_name', 'branch_address', 'cheque_print_type'])); // 'cover nabayad dashte bashe choon dar virayesh ax moshkel be vojood miyad'
            $bank_accounts->bank_types()->sync($request->bank_types);
            $bank_accounts->save();
            return response()->json([
                'status' => 200,
                'message' => 'حساب بانکی ویرایش شد',
            ]);
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
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_accounts = BankAccount::find($id);
        $bank_accounts->delete();
        return response()->json([
            'status' => 200,
            'message' => 'حساب بانکی حذف شد',
        ]);
    }
}
