<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawalPartnerRequest;
use App\Models\TarafHesab;
use App\Models\WithdrawalPartner;
use Illuminate\Http\Request;

class WithdrawalPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = WithdrawalPartner::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->from_taraf_hesab->fullname . '</td>
                        <td>' . $item->to_taraf_hesab->fullname . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $cash_amount . ' ریال</td>
                        <td>' . $item->document . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_withdrawal_partner btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/withdrawal-partner/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $taraf_hesabs = TarafHesab::all();
        return view('financial-management/withdrawal-partner.index')
            ->with('taraf_hesabs', $taraf_hesabs);
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
    public function store(WithdrawalPartnerRequest $request)
    {
        $withdrawal_partner = new WithdrawalPartner();
        $withdrawal_partner->form_date = $request->input('form_date');
        $withdrawal_partner->form_number = $request->input('form_number');
        $withdrawal_partner->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $withdrawal_partner->document = $request->input('document');
        $withdrawal_partner->from_taraf_hesab()->associate($request->from_taraf_hesab);
        $withdrawal_partner->to_taraf_hesab()->associate($request->to_taraf_hesab);
        $withdrawal_partner->save();
        return self::fetchData(200, 'برداشت شرکا جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawalPartner $withdrawalPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdrawal_partner = WithdrawalPartner::find($id);
        if ($withdrawal_partner) {
            return response()->json([
                'status' => 200,
                'withdrawal_partner' => $withdrawal_partner,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'برداشت شرکا یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function update(WithdrawalPartnerRequest $request, $id)
    {
        $withdrawal_partner = WithdrawalPartner::find($id);
        if ($withdrawal_partner) {
            $withdrawal_partner->form_date = $request->input('form_date');
            $withdrawal_partner->form_number = $request->input('form_number');
            $withdrawal_partner->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $withdrawal_partner->document = $request->input('document');
            $withdrawal_partner->from_taraf_hesab()->associate($request->from_taraf_hesab);
            $withdrawal_partner->to_taraf_hesab()->associate($request->to_taraf_hesab);
            $withdrawal_partner->update();
            return self::fetchData(200, 'برداشت شرکا ویرایش شد');
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
     * @param  \App\Models\WithdrawalPartner  $withdrawalPartner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $withdrawal_partner = WithdrawalPartner::find($id);
        $withdrawal_partner->delete();
        return self::fetchData(200, 'برداشت شرکا حذف شد');
    }
}
