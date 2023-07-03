<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseMoveRequest;
use App\Models\InventoryProductsPeriod;
use App\Models\Warehouse;
use App\Models\WarehouseMove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class WarehouseMoveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_warehouse_moves($row, $status, $message)
    {
        $data = WarehouseMove::orderBy('remittance_no', 'desc')->paginate($row);

        $remittance = '';

        $count = DB::table('warehouse_moves')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $remittance .=
                    '
                        <tr class="indexRow">
                            <td style="display:none;" id="index_id">' . $item->id . '</td>
                            <td>' . $item->remittance_no . '</td>
                            <td>' . $item->remittance_date . '</td>
                            <td>' . $item->transmitter->title . '</td>
                            <td>' . $item->receiver->title . '</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_warehouse_move btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/warehouse-moves/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $remittance,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_warehouse_move(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $searchItem = $request->search;
                $remittances = WarehouseMove::where('remittance_no', 'LIKE', '%' . $searchItem . '%')
                    ->orWhere('remittance_date', 'LIKE', '%' . $searchItem . '%')
                    ->orWhereHas(
                        'transmitter',
                        function ($q) use ($searchItem) {
                            $q->where('title', 'LIKE', '%' . $searchItem . '%');
                        }
                    )
                    ->orWhereHas(
                        'receiver',
                        function ($q) use ($searchItem) {
                            $q->where('title', 'LIKE', '%' . $searchItem . '%');
                        }
                    )
                    ->orderBy('remittance_no', 'asc')->paginate($request->row);
            }
            if ($remittances) {
                foreach ($remittances as $remittance) {
                    $search .=
                        '
                            <tr class="indexRow">
                                <td style="display:none;">' . $remittance->id . '</td>
                                <td>' . $remittance->remittance_no . '</td>
                                <td>' . $remittance->remittance_date . '</td>
                                <td>' . $remittance->transmitter->title . '</td>
                                <td>' . $remittance->receiver->title . '</td>
                                <td>
                                <button type="button" value=' . $remittance->id . ' class="edit_warehouse_moves btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/warehouse-moves/' . $remittance->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$remittances->links(),
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
            return self::index_fetch_warehouse_moves($row, 200, '');
        }
        $products = InventoryProductsPeriod::orderBy('product_id')->get();
        $warehouses = Warehouse::orderBy('title', 'asc')->get();
        return view('warehouse/warehouse-moves.index')
            ->with('products', $products)
            ->with('warehouses', $warehouses);
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
    public function store(WarehouseMoveRequest $request)
    {
        $warehouse_move = new WarehouseMove();
        $warehouse_move->remittance_no = $request->input('remittance_no');
        $warehouse_move->remittance_date = $request->input('remittance_date');
        $warehouse_move->transmitter()->associate($request->transmitter);
        $warehouse_move->receiver()->associate($request->receiver);
        $warehouse_move->save();

        foreach ($request->products as $product_item) {
            $transmitter = InventoryProductsPeriod::where('warehouse_id', '=', $request->transmitter)
                ->where('product_id', '=', $product_item['product_id'])->first();
            $receiver = InventoryProductsPeriod::where('warehouse_id', '=', $request->receiver)
                ->where('product_id', '=', $product_item['product_id'])->first();
            if (!empty($transmitter) && !empty($receiver)) {
                $transmitter->amount = $product_item['next_transmitter'];
                $receiver->amount = $product_item['next_receiver'];
                $transmitter->save();
                $receiver->save();
                DB::table('product_warehouse_move')->insert([
                    'product_id' => $product_item['product_id'],
                    'warehouse_move_id' => $warehouse_move->id,
                    'amount' => $product_item['amount'],
                    'pre_transmitter' => $product_item['pre_transmitter'],
                    'next_transmitter' => $product_item['next_transmitter'],
                    'pre_receiver' => $product_item['pre_receiver'],
                    'next_receiver' => $product_item['next_receiver'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اطلاعاتی یافت نشد',
                ]);
            }
        }

        $row = $request["row"];
        return self::index_fetch_warehouse_moves($row, 200, 'حواله انتقالی ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseMove $warehouseMove)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse_move = WarehouseMove::find($id);
        if ($warehouse_move) {
            return response()->json([
                'status' => 200,
                'warehouse_move' => $warehouse_move,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'حواله انتقالی یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseMoveRequest $request, $id)
    {
        $warehouse_move = WarehouseMove::find($id);
        if ($warehouse_move) {
            $warehouse_move->remittance_no = $request->input('remittance_no');
            $warehouse_move->remittance_date = $request->input('remittance_date');
            $warehouse_move->update();
            $row = $request["row"];
            return self::index_fetch_warehouse_moves($row, 200, 'حواله انتقالی ویرایش شد');
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
     * @param  \App\Models\WarehouseMove  $warehouseMove
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse_move = WarehouseMove::find($id);
        $warehouse_move->delete();
        return self::index_fetch_warehouse_moves(10, 200, 'حواله انتقالی حذف شد');
    }
}
