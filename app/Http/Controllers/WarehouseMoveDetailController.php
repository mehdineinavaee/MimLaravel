<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductsPeriod;
use App\Models\WarehouseMove;
use App\Models\WarehouseMoveDetail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class WarehouseMoveDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_products_according_to_warehouses(Request $request, $transmitter_id)
    {
        if ($request->row != null) {
            $transmitter_warehouse = InventoryProductsPeriod::where('warehouse_id', '=', $transmitter_id)->orderBy('id', 'asc')->paginate($request->row);
        }

        $products = '';
        $count = DB::table('inventory_products_periods')->where('warehouse_id', '=', $transmitter_id)->count();

        if ($transmitter_warehouse) {
            foreach ($transmitter_warehouse as $index => $item) {
                $products .=
                    '
                    <tr class="addRow">
                        <td style="display:none;">' . $item->product_id . '</td>
                        <td>' . $item->product->code . '</td>
                        <td>' . $item->product->product_name . '</td>
                        <td>' . $item->amount . '</td>
                    </tr>
                ';
            }
            return response()->json([
                'status' => 200,
                'count' => $count,
                'data' => $products,
                'pagination' => (string)$transmitter_warehouse->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function search_products_according_to_warehouses(Request $request, $transmitter_id)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $searchItem = $request->search;
                $products = InventoryProductsPeriod::where('warehouse_id', '=', $transmitter_id)
                    ->where(function ($query) use ($searchItem) {
                        $query->orWhereHas(
                            'product',
                            function ($q) use ($searchItem) {
                                $q->where('code', 'LIKE', '%' . $searchItem . '%');
                            }
                        )
                            ->orWhereHas(
                                'product',
                                function ($q) use ($searchItem) {
                                    $q->where('product_name', 'LIKE', '%' . $searchItem . '%');
                                }
                            )
                            ->orWhere('amount', 'LIKE', '%' . $searchItem . '%');
                    })->orderBy(
                        'product_id',
                        'asc'
                    )->paginate($request->row);
            }

            if ($products) {
                foreach ($products as $product) {
                    $search .=
                        '
                            <tr class="addRow">
                                <td style="display:none;">' . $product->product_id . '</td>
                                <td>' . $product->product->code . '</td>
                                <td>' . $product->product->product_name . '</td>
                                <td>' . $product->amount . '</td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$products->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }
    }

    public function fetch_products_according_to_warehouses_id($id, $status, $message)
    {
        $warehouse_move = WarehouseMove::findOrFail($id);
        $warehouse_move_by_id = '';

        if ($warehouse_move) {
            $count = $warehouse_move->products->count();
            foreach ($warehouse_move->products as $product) {
                // dd($product);
                $warehouse_move_by_id .=
                    '
                        <tr class="editRow">
                            <td style="display:none;">' . $product->id . '</td>
                            <td>' . $product->code . '</td>
                            <td>' . $product->product_name . '</td>
                            <td>' . $product->pivot->amount . '</td>
                        </tr>
                    ';
            }

            return response()->json([
                'count' => $count,
                'warehouse_move_by_id' => $warehouse_move_by_id,
                'status' => $status,
                'message' => $message,
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function receiver_warehouse_item($receiver_id, $product_id)
    {
        if (Gate::allows('warehouse_moves')) {
            $receiver_warehouse = InventoryProductsPeriod::where('warehouse_id', '=', $receiver_id)
                ->where('product_id', '=', $product_id)->first();
            if ($receiver_warehouse) {
                return response()->json([
                    'status' => 200,
                    'amount' => $receiver_warehouse->amount,
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseMoveDetail  $warehouseMoveDetail
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseMoveDetail $warehouseMoveDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseMoveDetail  $warehouseMoveDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('warehouse_moves')) {
            return self::fetch_products_according_to_warehouses_id($id, 200, '');
        } else {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseMoveDetail  $warehouseMoveDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseMoveDetail $warehouseMoveDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseMoveDetail  $warehouseMoveDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy_wastage_factor($warehouse_move_id, $product_id)
    {
        //
    }
}
