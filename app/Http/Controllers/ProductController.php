<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductNoUnit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function fetchData()
    {
        $output = '';
        $data = Product::orderBy('product_name', 'asc')->paginate(10);

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

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->main_group . '</td>
                        <td>' . $item->sub_group . '</td>
                        <td>' . $item->product_name . '</td>
                        <td>' . $item->product_unit_id . '</td>
                        <td>' . $sell_price . ' ریال</td>
                        <td>' . $item->value_added_group . '</td>
                        <td>' . $item->introduce_date . '</td>
                        <td>' . $latest_buy_price . ' ریال</td>
                        <td>' . $item->main_barcode . '</td>
                        <td>' . $item->order_point . '</td>
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
            return [$output, $data];
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
            list($valueA, $valueB) = self::fetchData();
            return response()->json([
                'output' => $valueA,
                'pagination' => (string)$valueB->links(),
            ]);
        }
        $product_unit = ProductNoUnit::orderBy('title', 'asc')->get();
        return view('taarife-payeh/products.index')
            ->with('product_unit', $product_unit);
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
        $product->save();
        return response()->json([
            'status' => 200,
            'message' => 'کالای جدید ذخیره شد',
        ]);
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
            $product->update();
            return response()->json([
                'status' => 200,
                'message' => 'کالا ویرایش شد',
            ]);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'کالا حذف شد',
        ]);
    }
}
