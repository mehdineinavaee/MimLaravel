<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_roles($row, $status, $message)
    {
        if (Gate::allows('roles')) {
            $data = Role::orderBy('role_name', 'asc')->paginate($row);

            $roles = '';

            $count = DB::table('roles')->count();

            if ($data) {
                foreach ($data as $index => $role) {
                    $roles .=
                        '
                        <tr class="indexRow">
                            <td>' . $index + 1 . '</td>
                            <td style="display:none;" id="index_id">' . $role->id . '</td>
                            <td>' . $role->role_name . '</td>
                            <td>
                                <button type="button" value=' . $role->id . ' class="edit_role btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/roles/' . $role->id . '" class="delete btn btn-danger btn-sm">
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
                    'data' => $roles,
                    'pagination' => (string)$data->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        } else {
            return abort(401);
        }
    }

    public function index_search_roles(Request $request)
    {
        if (Gate::allows('roles')) {
            if ($request->ajax()) {
                $search = '';
                if ($request->row != null) {
                    $roles = Role::where('role_name', 'LIKE', '%' . $request->search . '%')
                        ->orderBy('role_name', 'asc')->paginate($request->row);
                }
                if ($roles) {
                    foreach ($roles as $index => $role) {
                        $search .=
                            '
                        <tr class="indexRow">
                            <td>' . $index + 1 . '</td>
                            <td style="display:none;" id="index_id">' . $role->id . '</td>
                            <td>' . $role->role_name . '</td>
                            <td>
                                <button type="button" value=' . $role->id . ' class="edit_role btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/roles/' . $role->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                    }
                    return response()->json([
                        'status' => 200,
                        'data' => $search,
                        'pagination' => (string)$roles->links(),
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                    ]);
                }
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('roles')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_roles($row, 200, '');
            }
            $roles = Role::orderBy('role_name', 'asc')->get();
            return view('security/roles.index')
                ->with('roles', $roles);
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
    public function store(RoleRequest $request)
    {
        if (Gate::allows('roles')) {
            $role = new Role();
            $role->role_name = $request->input('role_name');

            $role->checked_all = $request->input('checked_all');

            $role->taarife_payeh = $request->input('taarife_payeh');
            $role->buy_sell = $request->input('buy_sell');
            $role->buy_sell_reports = $request->input('buy_sell_reports');
            $role->benefit_report = $request->input('benefit_report');
            $role->warehouse_menu = $request->input('warehouse_menu');
            $role->product_warehouse_reports = $request->input('product_warehouse_reports');
            $role->financial_management = $request->input('financial_management');
            $role->receive_payment = $request->input('receive_payment');
            $role->first_period = $request->input('first_period');
            $role->cheque_management = $request->input('cheque_management');
            $role->receive_cheques_operations = $request->input('receive_cheques_operations');
            $role->payment_cheques_operations = $request->input('payment_cheques_operations');
            $role->security = $request->input('security');
            $role->facilities = $request->input('facilities');

            $role->taraf_hesab = $request->input('taraf_hesab');
            $role->taraf_hesab_group = $request->input('taraf_hesab_group');
            $role->staff = $request->input('staff');
            $role->warehouse = $request->input('warehouse');
            $role->product_no_unit = $request->input('product_no_unit');
            $role->product_farei_asli = $request->input('product_farei_asli');
            $role->products = $request->input('products');
            $role->services = $request->input('services');
            $role->arzesh_afzoude_groups = $request->input('arzesh_afzoude_groups');
            $role->banks_types = $request->input('banks_types');
            $role->bank_accounts = $request->input('bank_accounts');
            $role->cities = $request->input('cities');
            $role->fund = $request->input('fund');
            $role->account_group = $request->input('account_group');
            $role->account_headings = $request->input('account_headings');
            $role->sell_factor = $request->input('sell_factor');
            $role->buy_factor = $request->input('buy_factor');
            $role->return_sell_factor = $request->input('return_sell_factor');
            $role->return_buy_factor = $request->input('return_buy_factor');
            $role->sell_factor_advanced = $request->input('sell_factor_advanced');
            $role->wastage_factor = $request->input('wastage_factor');
            $role->benefit_loss_bill = $request->input('benefit_loss_bill');
            $role->ttms = $request->input('ttms');
            $role->factors_types_report = $request->input('factors_types_report');
            $role->period_report = $request->input('period_report');
            $role->sell_report = $request->input('sell_report');
            $role->sell_statistics_report = $request->input('sell_statistics_report');
            $role->customer_report = $request->input('customer_report');
            $role->buy_report = $request->input('buy_report');
            $role->buy_statistics_report = $request->input('buy_statistics_report');
            $role->taraf_hesab_buy_report = $request->input('taraf_hesab_buy_report');
            $role->products_benefit = $request->input('products_benefit');
            $role->factors_benefit = $request->input('factors_benefit');
            $role->taraf_hesab_benefit = $request->input('taraf_hesab_benefit');
            $role->warehouse_moves = $request->input('warehouse_moves');
            $role->riali_report = $request->input('riali_report');
            $role->products_barcode = $request->input('products_barcode');
            $role->cardex = $request->input('cardex');
            $role->inventory_warehouse = $request->input('inventory_warehouse');
            $role->inventory_products = $request->input('inventory_products');
            $role->ordering_products = $request->input('ordering_products');
            $role->accounting_documents = $request->input('accounting_documents');
            $role->receive_from_the_account = $request->input('receive_from_the_account');
            $role->payment_to_account = $request->input('payment_to_account');
            $role->pay = $request->input('pay');
            $role->fund_to_bank = $request->input('fund_to_bank');
            $role->bank_to_fund = $request->input('bank_to_fund');
            $role->bank_to_bank = $request->input('bank_to_bank');
            $role->receive_miscellaneous_income = $request->input('receive_miscellaneous_income');
            $role->withdrawal_partner = $request->input('withdrawal_partner');
            $role->investment = $request->input('investment');
            $role->transfer_person = $request->input('transfer_person');
            $role->fund_period = $request->input('fund_period');
            $role->bank_accounts_period = $request->input('bank_accounts_period');
            $role->taraf_hesab_period = $request->input('taraf_hesab_period');
            $role->receive_cheques = $request->input('receive_cheques');
            $role->pay_cheques = $request->input('pay_cheques');
            $role->inventory_products_period = $request->input('inventory_products_period');
            $role->cheque_book = $request->input('cheque_book');
            $role->cheque_book_report = $request->input('cheque_book_report');
            $role->receive_cheques_report = $request->input('receive_cheques_report');
            $role->pay_cheques_report = $request->input('pay_cheques_report');
            $role->circulation_receive_cheque = $request->input('circulation_receive_cheque');
            $role->circulation_pay_cheque_report = $request->input('circulation_pay_cheque_report');
            $role->deposit = $request->input('deposit');
            $role->notification = $request->input('notification');
            $role->manual = $request->input('manual');
            $role->returning_cheque = $request->input('returning_cheque');
            $role->announcement = $request->input('announcement');
            $role->spent_cheque = $request->input('spent_cheque');
            $role->cheque_return = $request->input('cheque_return');
            $role->receipt_cheque = $request->input('receipt_cheque');
            $role->pay_returning_cheque = $request->input('pay_returning_cheque');
            $role->cashing_cheque = $request->input('cashing_cheque');
            $role->cancel_cheque = $request->input('cancel_cheque');
            $role->users = $request->input('users');
            $role->profile = $request->input('profile');
            $role->roles = $request->input('roles');
            $role->phone_book = $request->input('phone_book');
            $role->save();
            $row = $request["row"];
            return self::index_fetch_roles($row, 200, 'نقش جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('roles')) {
            $role = Role::find($id);
            if ($role) {
                return response()->json([
                    'status' => 200,
                    'role' => $role,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'نقش یافت نشد',
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
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        if (Gate::allows('roles')) {
            $role = Role::find($id);
            if ($role) {
                $role->role_name = $request->input('role_name');

                $role->checked_all = $request->input('checked_all');

                $role->taarife_payeh = $request->input('taarife_payeh');
                $role->buy_sell = $request->input('buy_sell');
                $role->buy_sell_reports = $request->input('buy_sell_reports');
                $role->benefit_report = $request->input('benefit_report');
                $role->warehouse_menu = $request->input('warehouse_menu');
                $role->product_warehouse_reports = $request->input('product_warehouse_reports');
                $role->financial_management = $request->input('financial_management');
                $role->receive_payment = $request->input('receive_payment');
                $role->first_period = $request->input('first_period');
                $role->cheque_management = $request->input('cheque_management');
                $role->receive_cheques_operations = $request->input('receive_cheques_operations');
                $role->payment_cheques_operations = $request->input('payment_cheques_operations');
                $role->security = $request->input('security');
                $role->facilities = $request->input('facilities');

                $role->taraf_hesab = $request->input('taraf_hesab');
                $role->taraf_hesab_group = $request->input('taraf_hesab_group');
                $role->staff = $request->input('staff');
                $role->warehouse = $request->input('warehouse');
                $role->product_no_unit = $request->input('product_no_unit');
                $role->product_farei_asli = $request->input('product_farei_asli');
                $role->products = $request->input('products');
                $role->services = $request->input('services');
                $role->arzesh_afzoude_groups = $request->input('arzesh_afzoude_groups');
                $role->banks_types = $request->input('banks_types');
                $role->bank_accounts = $request->input('bank_accounts');
                $role->cities = $request->input('cities');
                $role->fund = $request->input('fund');
                $role->account_group = $request->input('account_group');
                $role->account_headings = $request->input('account_headings');
                $role->sell_factor = $request->input('sell_factor');
                $role->buy_factor = $request->input('buy_factor');
                $role->return_sell_factor = $request->input('return_sell_factor');
                $role->return_buy_factor = $request->input('return_buy_factor');
                $role->sell_factor_advanced = $request->input('sell_factor_advanced');
                $role->wastage_factor = $request->input('wastage_factor');
                $role->benefit_loss_bill = $request->input('benefit_loss_bill');
                $role->ttms = $request->input('ttms');
                $role->factors_types_report = $request->input('factors_types_report');
                $role->period_report = $request->input('period_report');
                $role->sell_report = $request->input('sell_report');
                $role->sell_statistics_report = $request->input('sell_statistics_report');
                $role->customer_report = $request->input('customer_report');
                $role->buy_report = $request->input('buy_report');
                $role->buy_statistics_report = $request->input('buy_statistics_report');
                $role->taraf_hesab_buy_report = $request->input('taraf_hesab_buy_report');
                $role->products_benefit = $request->input('products_benefit');
                $role->factors_benefit = $request->input('factors_benefit');
                $role->taraf_hesab_benefit = $request->input('taraf_hesab_benefit');
                $role->warehouse_moves = $request->input('warehouse_moves');
                $role->riali_report = $request->input('riali_report');
                $role->products_barcode = $request->input('products_barcode');
                $role->cardex = $request->input('cardex');
                $role->inventory_warehouse = $request->input('inventory_warehouse');
                $role->inventory_products = $request->input('inventory_products');
                $role->ordering_products = $request->input('ordering_products');
                $role->accounting_documents = $request->input('accounting_documents');
                $role->receive_from_the_account = $request->input('receive_from_the_account');
                $role->payment_to_account = $request->input('payment_to_account');
                $role->pay = $request->input('pay');
                $role->fund_to_bank = $request->input('fund_to_bank');
                $role->bank_to_fund = $request->input('bank_to_fund');
                $role->bank_to_bank = $request->input('bank_to_bank');
                $role->receive_miscellaneous_income = $request->input('receive_miscellaneous_income');
                $role->withdrawal_partner = $request->input('withdrawal_partner');
                $role->investment = $request->input('investment');
                $role->transfer_person = $request->input('transfer_person');
                $role->fund_period = $request->input('fund_period');
                $role->bank_accounts_period = $request->input('bank_accounts_period');
                $role->taraf_hesab_period = $request->input('taraf_hesab_period');
                $role->receive_cheques = $request->input('receive_cheques');
                $role->pay_cheques = $request->input('pay_cheques');
                $role->inventory_products_period = $request->input('inventory_products_period');
                $role->cheque_book = $request->input('cheque_book');
                $role->cheque_book_report = $request->input('cheque_book_report');
                $role->receive_cheques_report = $request->input('receive_cheques_report');
                $role->pay_cheques_report = $request->input('pay_cheques_report');
                $role->circulation_receive_cheque = $request->input('circulation_receive_cheque');
                $role->circulation_pay_cheque_report = $request->input('circulation_pay_cheque_report');
                $role->deposit = $request->input('deposit');
                $role->notification = $request->input('notification');
                $role->manual = $request->input('manual');
                $role->returning_cheque = $request->input('returning_cheque');
                $role->announcement = $request->input('announcement');
                $role->spent_cheque = $request->input('spent_cheque');
                $role->cheque_return = $request->input('cheque_return');
                $role->receipt_cheque = $request->input('receipt_cheque');
                $role->pay_returning_cheque = $request->input('pay_returning_cheque');
                $role->cashing_cheque = $request->input('cashing_cheque');
                $role->cancel_cheque = $request->input('cancel_cheque');
                $role->users = $request->input('users');
                $role->profile = $request->input('profile');
                $role->roles = $request->input('roles');
                $role->phone_book = $request->input('phone_book');
                $role->update();
                $row = $request["row"];
                return self::index_fetch_roles($row, 200, 'نقش ویرایش شد');
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
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('roles')) {
            $role = Role::find($id);
            $role->delete();
            return self::index_fetch_roles(10, 200, 'نقش حذف شد');
        } else {
            return abort(401);
        }
    }
}
