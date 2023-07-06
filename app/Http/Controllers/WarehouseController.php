<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_warehouse($row, $status, $message)
    {
        $data = Warehouse::orderBy('title', 'asc')->paginate($row);

        $warehouses = '';

        $count = DB::table('warehouses')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $warehouses .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->title . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_warehouse btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/warehouse/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $warehouses,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_warehouse(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $warehouses = Warehouse::where('code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('title', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('title', 'asc')->paginate($request->row);
            }
            if ($warehouses) {
                foreach ($warehouses as $index => $item) {
                    $search .=
                        '
                            <tr>
                                <td>' . $index + 1 . '</td>
                                <td>' . $item->code . '</td>
                                <td>' . $item->title . '</td>
                                <td>' . $item->chk_active . '</td>
                                <td>
                                    <button type="button" value=' . $item->id . ' class="edit_warehouse btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/warehouse/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                        <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$warehouses->links(),
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
        if (Gate::allows('warehouse')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_warehouse($row, 200, '');
            }
            return view('taarife-payeh/warehouse.index');
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
    public function store(WarehouseRequest $request)
    {
        if (Gate::allows('warehouse')) {
            $warehouse = new Warehouse();
            $warehouse->chk_active = $request->chk_active;
            $warehouse->code = $request->input('code');
            $warehouse->title = $request->input('title');
            $warehouse->save();
            $row = $request["row"];
            return self::index_fetch_warehouse($row, 200, 'انبار جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('warehouse')) {
            $warehouse = Warehouse::find($id);
            if ($warehouse) {
                return response()->json([
                    'status' => 200,
                    'warehouse' => $warehouse,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'انبار یافت نشد',
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
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRequest $request, $id)
    {
        if (Gate::allows('warehouse')) {
            $warehouse = Warehouse::find($id);
            if ($warehouse) {
                $warehouse->chk_active = $request->chk_active;
                $warehouse->code = $request->input('code');
                $warehouse->title = $request->input('title');
                $warehouse->update();
                $row = $request["row"];
                return self::index_fetch_warehouse($row, 200, 'انبار ویرایش شد');
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
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('warehouse')) {
            $warehouse = Warehouse::find($id);
            $warehouse->delete();
            return self::index_fetch_warehouse(10, 200, 'انبار حذف شد');
        } else {
            return abort(401);
        }
    }
}
