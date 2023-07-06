<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductNoUnit;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_product($row, $status, $message)
    {
        $data = Product::orderBy('product_name', 'asc')->paginate($row);

        $products = '';

        $count = DB::table('products')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->sell_price != null) {
                    $sell_price = number_format($item->sell_price);
                } else {
                    $sell_price = '-';
                }

                if ($item->latest_buy_price != null) {
                    $latest_buy_price = number_format($item->latest_buy_price);
                } else {
                    $latest_buy_price = '-';
                }

                $products .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->main_group . '</td>
                        <td>' . $item->sub_group . '</td>
                        <td>' . $item->product_name . '</td>
                        <td>' . $item->product_unit->title . '</td>
                        <td>' . $sell_price . ' ریال</td>
                        <td>' . $item->value_added_group . '</td>
                        <td>' . $item->introduce_date . '</td>
                        <td>' . $latest_buy_price . ' ریال</td>
                        <td>' . $item->main_barcode . '</td>
                        <td>' . $item->order_point . '</td>
                        <td>' . $item->warehouse->title . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_product btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/products/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $products,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_product(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $products = Product::where('code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('product_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('sell_price', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('introduce_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('latest_buy_price', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('main_barcode', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('order_point', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('product_name', 'asc')->paginate($request->row);
            }
            if ($products) {
                foreach ($products as $index => $item) {
                    if ($item->sell_price != null) {
                        $sell_price = number_format($item->sell_price);
                    } else {
                        $sell_price = '-';
                    }

                    if ($item->latest_buy_price != null) {
                        $latest_buy_price = number_format($item->latest_buy_price);
                    } else {
                        $latest_buy_price = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->chk_active . '</td>
                            <td>' . $item->code . '</td>
                            <td>' . $item->main_group . '</td>
                            <td>' . $item->sub_group . '</td>
                            <td>' . $item->product_name . '</td>
                            <td>' . $item->product_unit->title . '</td>
                            <td>' . $sell_price . ' ریال</td>
                            <td>' . $item->value_added_group . '</td>
                            <td>' . $item->introduce_date . '</td>
                            <td>' . $latest_buy_price . ' ریال</td>
                            <td>' . $item->main_barcode . '</td>
                            <td>' . $item->order_point . '</td>
                            <td>' . $item->warehouse->title . '</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_product btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/products/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('products')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_product($row, 200, '');
            }
            $product_unit = ProductNoUnit::orderBy('title', 'asc')->get();
            $warehouses = Warehouse::orderBy('title', 'asc')->get();
            return view('taarife-payeh/products.index')
                ->with('product_unit', $product_unit)
                ->with('warehouses', $warehouses);
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
    public function store(ProductRequest $request)
    {
        if (Gate::allows('products')) {
            $product = new Product();
            $product->code = $request->input('code');
            $product->main_group = $request->input('main_group');
            $product->sub_group = $request->input('sub_group');
            $product->product_name = $request->input('product_name');
            $product->sell_price = str_replace(",", "", $request->input('sell_price'));
            $product->value_added_group = $request->input('value_added_group');
            $product->chk_active = $request->input('chk_active');
            $product->introduce_date = $request->input('introduce_date');
            $product->latest_buy_price = str_replace(",", "", $request->input('latest_buy_price'));
            $product->main_barcode = $request->input('main_barcode');
            $product->order_point = $request->input('order_point');
            $product->product_unit()->associate($request->product_unit);
            $product->warehouse()->associate($request->warehouse_name);
            $product->save();
            $row = $request["row"];
            return self::index_fetch_product($row, 200, 'کالای جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('products')) {
            $product = Product::find($id);
            if ($product) {
                return response()->json([
                    'status' => 200,
                    'product' => $product,
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if (Gate::allows('products')) {
            $product = Product::find($id);
            if ($product) {
                $product->code = $request->input('code');
                $product->main_group = $request->input('main_group');
                $product->sub_group = $request->input('sub_group');
                $product->product_name = $request->input('product_name');
                $product->sell_price = str_replace(",", "", $request->input('sell_price'));
                $product->value_added_group = $request->input('value_added_group');
                $product->chk_active = $request->input('chk_active');
                $product->introduce_date = $request->input('introduce_date');
                $product->latest_buy_price = str_replace(",", "", $request->input('latest_buy_price'));
                $product->main_barcode = $request->input('main_barcode');
                $product->order_point = $request->input('order_point');
                $product->product_unit()->associate($request->product_unit);
                $product->warehouse()->associate($request->warehouse_name);
                $product->update();
                $row = $request["row"];
                return self::index_fetch_product($row, 200, 'کالا ویرایش شد');
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('products')) {
            $product = Product::find($id);
            $product->delete();
            return self::index_fetch_product(10, 200, 'کالا حذف شد');
        } else {
            return abort(401);
        }
    }
}
