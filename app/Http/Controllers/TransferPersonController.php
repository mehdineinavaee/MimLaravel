<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferPersonRequest;
use App\Models\TarafHesab;
use App\Models\TransferPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TransferPersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_transfer_person($row, $status, $message)
    {
        $data = TransferPerson::orderBy('id', 'desc')->paginate($row);

        $transfer_people = '';

        $count = DB::table('transfer_people')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->cash_amount != null) {
                    $cash_amount = number_format($item->cash_amount);
                } else {
                    $cash_amount = '-';
                }

                $transfer_people .=
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
                            <button type="button" value=' . $item->id . ' class="edit_transfer_person btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/transfer-person/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $transfer_people,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_transfer_person(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $transfer_people = TransferPerson::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cash_amount', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('document', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($transfer_people) {
                foreach ($transfer_people as $index => $item) {
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
                                <button type="button" value=' . $item->id . ' class="edit_transfer_person btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/transfer-person/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$transfer_people->links(),
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
            return self::index_fetch_transfer_person($row, 200, '');
        }
        $taraf_hesabs = TarafHesab::all();
        return view('financial-management/transfer-person.index')
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
    public function store(TransferPersonRequest $request)
    {
        $transfer_person = new TransferPerson();
        $transfer_person->form_date = $request->input('form_date');
        $transfer_person->form_number = $request->input('form_number');
        $transfer_person->cash_amount = str_replace(",", "", $request->input('cash_amount'));
        $transfer_person->document = $request->input('document');
        $transfer_person->from_taraf_hesab()->associate($request->from_taraf_hesab);
        $transfer_person->to_taraf_hesab()->associate($request->to_taraf_hesab);
        $transfer_person->save();
        $row = $request["row"];
        return self::index_fetch_transfer_person($row, 200, 'انتقال بین اشخاص جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function show(TransferPerson $transferPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer_person = TransferPerson::find($id);
        if ($transfer_person) {
            return response()->json([
                'status' => 200,
                'transfer_person' => $transfer_person,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'انتقال بین اشخاص یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function update(TransferPersonRequest $request, $id)
    {
        $transfer_person = TransferPerson::find($id);
        if ($transfer_person) {
            $transfer_person->form_date = $request->input('form_date');
            $transfer_person->form_number = $request->input('form_number');
            $transfer_person->cash_amount = str_replace(",", "", $request->input('cash_amount'));
            $transfer_person->document = $request->input('document');
            $transfer_person->from_taraf_hesab()->associate($request->from_taraf_hesab);
            $transfer_person->to_taraf_hesab()->associate($request->to_taraf_hesab);
            $transfer_person->update();
            $row = $request["row"];
            return self::index_fetch_transfer_person($row, 200, 'انتقال بین اشخاص ویرایش شد');
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
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer_person = TransferPerson::find($id);
        $transfer_person->delete();
        return self::index_fetch_transfer_person(10, 200, 'انتقال بین اشخاص حذف شد');
    }
}
