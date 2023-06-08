<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferPersonRequest;
use App\Models\TarafHesab;
use App\Models\TransferPerson;
use Illuminate\Http\Request;

class TransferPersonController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = TransferPerson::orderBy('id', 'desc')->paginate(10);

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
        return self::fetchData(200, 'انتقال بین اشخاص جدید ذخیره شد');
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
            return self::fetchData(200, 'انتقال بین اشخاص ویرایش شد');
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
        return self::fetchData(200, 'انتقال بین اشخاص حذف شد');
    }
}
