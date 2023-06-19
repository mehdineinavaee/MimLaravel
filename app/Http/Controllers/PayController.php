<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\BankAccount;
use App\Models\Fund;
use App\Models\Pay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = Pay::orderBy('id', 'desc')->paginate();

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

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->fund->daramad_name . '</td>
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
                            <button type="button" value=' . $item->id . ' class="edit_pay btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/pay/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $funds = Fund::where('form_type', '=', 2)->orderBy('id', 'asc')->get();
        $bank_accounts = BankAccount::all();
        return view('financial-management/pay.index')
            ->with('funds', $funds)
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
    public function store(PayRequest $request)
    {
        $pay = new Pay();
        $pay->form_date = $request->input('form_date');
        $pay->form_number = $request->input('form_number');
        $pay->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $pay->considerations1 = $request->input('considerations1');
        $pay->date = $request->input('date');
        $pay->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
        $pay->wage = str_replace(",", "", $request->input('wage'));
        $pay->issue_tracking = $request->input('issue_tracking');
        $pay->considerations2 = $request->input('considerations2');
        $pay->paid_discount = str_replace(",", "", $request->input('paid_discount'));
        $pay->fund()->associate($request->cost_title);
        $pay->bank_account()->associate($request->bank_account_details);
        $pay->save();
        return self::fetchData(200, 'پرداخت هزینه جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay = Pay::find($id);
        if ($pay) {
            return response()->json([
                'status' => 200,
                'pay' => $pay,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'پرداخت هزینه یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(PayRequest $request, $id)
    {
        $pay = Pay::find($id);
        if ($pay) {
            $pay->form_date = $request->input('form_date');
            $pay->form_number = $request->input('form_number');
            $pay->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $pay->considerations1 = $request->input('considerations1');
            $pay->date = $request->input('date');
            $pay->deposit_amount = str_replace(",", "", $request->input('deposit_amount'));
            $pay->wage = str_replace(",", "", $request->input('wage'));
            $pay->issue_tracking = $request->input('issue_tracking');
            $pay->considerations2 = $request->input('considerations2');
            $pay->paid_discount = str_replace(",", "", $request->input('paid_discount'));
            $pay->fund()->associate($request->cost_title);
            $pay->bank_account()->associate($request->bank_account_details);
            $pay->update();
            return self::fetchData(200, 'پرداخت هزینه ویرایش شد');
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
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = Pay::find($id);
        $pay->delete();
        return self::fetchData(200, 'پرداخت هزینه حذف شد');
    }
}
