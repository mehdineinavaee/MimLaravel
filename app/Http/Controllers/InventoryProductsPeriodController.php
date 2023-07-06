<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryProductsPeriodRequest;
use App\Models\InventoryProductsPeriod;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InventoryProductsPeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_inventory_products_period($row, $status, $message)
    {
        $data = InventoryProductsPeriod::orderBy('product_id', 'asc')->paginate($row);

        $inventory_products_period = '';

        $count = DB::table('inventory_products_periods')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $total = $item->amount * $item->buy_price;

                $inventory_products_period .=
                    '
                        <tr class="indexRow">
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->product->code . '</td>
                            <td>' . $item->product->product_name . '</td>
                            <td>' . $item->warehouse->title . '</td>
                            <td>' . $item->amount . '</td>
                            <td>' . number_format($item->buy_price) . ' ریال</td>
                            <td>' . number_format($total) . ' ریال</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_inventory_products_period btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/inventory-products-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $inventory_products_period,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_inventory_products_period(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $searchItem = $request->search;
                $search = InventoryProductsPeriod::whereHas(
                    'warehouse',
                    function ($q) use ($searchItem) {
                        $q->where('title', 'LIKE', '%' . $searchItem . '%');
                    }
                )
                    ->orWhereHas(
                        'product',
                        function ($q) use ($searchItem) {
                            $q->where('product_name', 'LIKE', '%' . $searchItem . '%');
                        }
                    )
                    ->orWhere('amount', 'LIKE', '%' . $searchItem . '%')
                    ->orWhere('buy_price', 'LIKE', '%' . $searchItem . '%')
                    ->orderBy('id', 'asc')->get();
            }
            if ($search) {
                foreach ($search as $index => $item) {
                    $total = $item->amount * $item->buy_price;
                    $search .=
                        '
                        <tr class="indexRow">
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->product->code . '</td>
                            <td>' . $item->product->product_name . '</td>
                            <td>' . $item->warehouse->title . '</td>
                            <td>' . $item->amount . '</td>
                            <td>' . number_format($item->buy_price) . ' ریال</td>
                            <td>' . number_format($total) . ' ریال</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_inventory_products_period btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/inventory-products-period/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    // 'pagination' => (string)$search->links(),
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
        if (Gate::allows('inventory_products_period')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_inventory_products_period($row, 200, '');
            }
            $warehouses = Warehouse::orderBy('title', 'asc')->get();
            $products = Product::orderBy('product_name', 'asc')->get();
            return view('first-period/inventory-products-period.index')
                ->with('warehouses', $warehouses)
                ->with('products', $products);
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
    public function store(InventoryProductsPeriodRequest $request)
    {
        if (Gate::allows('inventory_products_period')) {
            $inventory_products_period = new InventoryProductsPeriod();
            $inventory_products_period->amount = $request->input('amount');
            $inventory_products_period->buy_price = str_replace(",", "", $request->input('buy_price'));
            $inventory_products_period->warehouse()->associate($request->warehouse);
            $inventory_products_period->product()->associate($request->product);
            $inventory_products_period->save();
            $row = $request["row"];
            return self::index_fetch_inventory_products_period($row, 200, 'موجودی اول دوره کالا ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryProductsPeriod $inventoryProductsPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('inventory_products_period')) {
            $inventory_products_period = InventoryProductsPeriod::find($id);
            if ($inventory_products_period) {
                return response()->json([
                    'status' => 200,
                    'inventory_products_period' => $inventory_products_period,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'کالا یافت نشد',
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
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryProductsPeriodRequest $request, $id)
    {
        if (Gate::allows('inventory_products_period')) {
            $inventory_products_period = InventoryProductsPeriod::find($id);
            if ($inventory_products_period) {
                $inventory_products_period->amount = $request->input('amount');
                $inventory_products_period->buy_price = str_replace(",", "", $request->input('buy_price'));
                $inventory_products_period->warehouse()->associate($request->warehouse);
                $inventory_products_period->product()->associate($request->product);
                $inventory_products_period->update();
                $row = $request["row"];
                return self::index_fetch_inventory_products_period($row, 200, 'اول دوره ویرایش شد');
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
     * @param  \App\Models\InventoryProductsPeriod  $inventoryProductsPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('inventory_products_period')) {
            $inventory_products_period = InventoryProductsPeriod::find($id);
            $inventory_products_period->delete();
            return self::index_fetch_inventory_products_period(10, 200, 'اول دوره حذف شد');
        } else {
            return abort(401);
        }
    }
}
