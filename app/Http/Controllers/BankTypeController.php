<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanksTypesRequest;
use App\Models\BankType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BankTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_bank_type($row, $status, $message)
    {
        $data = BankType::orderBy('bank_name', 'asc')->paginate($row);

        $banks_types = '';

        $count = DB::table('bank_types')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $banks_types .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $banks_types,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_bank_type(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $banks_types = BankType::where('bank_code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('bank_name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('bank_name', 'asc')->paginate($request->row);
            }
            if ($banks_types) {
                foreach ($banks_types as $index => $item) {
                    $search .=
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
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$banks_types->links(),
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
        if (Gate::allows('banks_types')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_bank_type($row, 200, '');
            }
            return view('taarife-payeh/banks-types.index');
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
    public function store(BanksTypesRequest $request)
    {
        if (Gate::allows('banks_types')) {
            $banks_types = new BankType();
            $banks_types->chk_active = $request->chk_active;
            $banks_types->bank_code = $request->input('bank_code');
            $banks_types->bank_name = $request->input('bank_name');
            $banks_types->save();
            $row = $request["row"];
            return self::index_fetch_bank_type($row, 200, 'بانک جدید ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('banks_types')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('banks_types')) {
            $banks_types = BankType::find($id);
            if ($banks_types) {
                $banks_types->chk_active = $request->chk_active;
                $banks_types->bank_code = $request->input('bank_code');
                $banks_types->bank_name = $request->input('bank_name');
                $banks_types->update();
                $row = $request["row"];
                return self::index_fetch_bank_type($row, 200, 'بانک ویرایش شد');
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
     * @param  \App\Models\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('banks_types')) {
            $banks_types = BankType::find($id);
            $banks_types->delete();
            return self::index_fetch_bank_type(10, 200, 'بانک حذف شد');
        } else {
            return abort(401);
        }
    }
}
