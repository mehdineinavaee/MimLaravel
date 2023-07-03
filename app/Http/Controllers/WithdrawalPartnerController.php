<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawalPartnerRequest;
use App\Models\TarafHesab;
use App\Models\WithdrawalPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class WithdrawalPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_withdrawal_partner($row, $status, $message)
    {
        $data = WithdrawalPartner::orderBy('id', 'desc')->paginate($row);

        $withdrawal_partners = '';

        $count = DB::table('withdrawal_partners')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                $withdrawal_partners .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $withdrawal_partners,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_withdrawal_partner(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $withdrawal_partners = WithdrawalPartner::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('document', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($withdrawal_partners) {
                foreach ($withdrawal_partners as $index => $item) {
                    if ($item->cash_amount != null) {
                        $cash_amount = number_format($item->cash_amount);
                    } else {
                        $cash_amount = '-';
                    }

                    $search .=
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
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$withdrawal_partners->links(),
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
            return self::index_fetch_withdrawal_partner($row, 200, '');
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
        $row = $request["row"];
        return self::index_fetch_withdrawal_partner($row, 200, 'برداشت شرکا جدید ذخیره شد');
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
            $row = $request["row"];
            return self::index_fetch_withdrawal_partner($row, 200, 'برداشت شرکا ویرایش شد');
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
        return self::index_fetch_withdrawal_partner(10, 200, 'برداشت شرکا حذف شد');
    }
}
