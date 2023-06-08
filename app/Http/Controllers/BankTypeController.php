<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanksTypesRequest;
use App\Models\BankType;
use Illuminate\Http\Request;

class BankTypeController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = BankType::orderBy('bank_name', 'asc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->bank_code . '</td>
                        <td>' . $item->bank_name . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_banks_types btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/banks-types/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('taarife-payeh/banks-types.index');
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
    public function store(BanksTypesRequest $request)
    {
        $banks_types = new BankType();
        $banks_types->chk_active = $request->chk_active;
        $banks_types->bank_code = $request->input('bank_code');
        $banks_types->bank_name = $request->input('bank_name');
        $banks_types->save();
        return self::fetchData(200, 'بانک جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function show(BankType $bankType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks_types = BankType::find($id);
        if ($banks_types) {
            return response()->json([
                'status' => 200,
                'banks_types' => $banks_types,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'بانک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function update(BanksTypesRequest $request, $id)
    {
        $banks_types = BankType::find($id);
        if ($banks_types) {
            $banks_types->chk_active = $request->chk_active;
            $banks_types->bank_code = $request->input('bank_code');
            $banks_types->bank_name = $request->input('bank_name');
            $banks_types->update();
            return self::fetchData(200, 'بانک ویرایش شد');
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
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banks_types = BankType::find($id);
        $banks_types->delete();
        return self::fetchData(200, 'بانک حذف شد');
    }
}
