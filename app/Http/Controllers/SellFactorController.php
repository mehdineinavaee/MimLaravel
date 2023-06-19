<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellFactorRequest;
use App\Models\Product;
use App\Models\SellFactor;
use App\Models\TarafHesab;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = SellFactor::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                $total = 0;
                $new_data = DB::table('product_sell_factor')->where('sell_factor_id', $item->id)->get();
                foreach ($new_data as $n) {
                    $total = $total + $n->total;
                }

                $output .=
                    '
                    <tr>
                        <td>' . $item->factor_no . '</td>
                        <td>' . $item->factor_date . '</td>
                        <td>' . $item->buyer->fullname . '</td>
                        <td>' . number_format($total) . ' ریال</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_sell_factor btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/sell-factor/' . $item->id . '" class="delete btn btn-danger btn-sm">
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

    public function fetch_products(Request $request)
    {
        if ($request->row != null) {
            $data = Product::orderBy('product_name', 'asc')->paginate($request->row);
        }

        $products = '';

        $count = DB::table('products')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $products .=
                    '
                    <tr class="addRow">
                        <td style="display:none;">' . $item->id . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->product_name . '</td>
                        <td>' . number_format($item->sell_price) . ' ریال</td>
                        <td style="display:none;">' . $item->warehouse->id . '</td>
                    </tr>
                ';
            }
            return response()->json([
                'status' => 200,
                'count' => $count,
                'products' => $products,
                'productPagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $products = Product::where('code', 'LIKE', '%' . $request->invoice_search . '%')
                    ->orWhere('product_name', 'LIKE', '%' . $request->invoice_search . '%')
                    ->orWhere('sell_price', 'LIKE', '%' . $request->invoice_search . '%')
                    ->orderBy('product_name', 'asc')->paginate($request->row);
            }
            if ($products) {
                foreach ($products as $product) {
                    $search .=
                        '
                            <tr class="addRow">
                                <td style="display:none;">' . $product->id . '</td>
                                <td>' . $product->code . '</td>
                                <td>' . $product->product_name . '</td>
                                <td>' . number_format($product->sell_price) . ' ریال</td>
                                <td style="display:none;">' . $product->warehouse->id . '</td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'products' => $search,
                    'productPagination' => (string)$products->links(),
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
            return self::fetchData(200, '');
        }
        $buyers = TarafHesab::where('chk_buyer', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $brokers = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $products = Product::orderBy('product_name')->get();
        $warehouses = Warehouse::orderBy('title', 'asc')->get();
        return view('buy-sell/sell-factor.index')
            ->with('buyers', $buyers)
            ->with('brokers', $brokers)
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
    public function store(SellFactorRequest $request)
    {
        $sell_factor = new SellFactor();
        $sell_factor->customer_type = $request->input('customer_type');
        $sell_factor->factor_no = $request->input('factor_no');
        $sell_factor->factor_date = $request->input('factor_date');
        $sell_factor->commission = $request->input('commission');
        $sell_factor->settlement_deadline = $request->input('settlement_deadline');
        $sell_factor->settlement_date = $request->input('settlement_date');
        $sell_factor->buyer()->associate($request->buyer);
        $sell_factor->broker()->associate($request->broker);
        $sell_factor->save();

        foreach ($request->factor_items as $factor_item) {
            DB::table('product_sell_factor')->insert([
                'product_id' => $factor_item['product_id'],
                'sell_factor_id' => $sell_factor->id,
                'total' => $factor_item['total'],
                'amount' => $factor_item['amount'],
                'discount' => $factor_item['discount'],
                'considerations' => $factor_item['considerations'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return self::fetchData(200, 'فاکتور فروش ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(SellFactor $sellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell_factor = SellFactor::find($id);
        if ($sell_factor) {
            return response()->json([
                'status' => 200,
                'sell_factor' => $sell_factor,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'فاکتور فروش یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(SellFactorRequest $request, $id)
    {
        $sell_factor = SellFactor::find($id);
        if ($sell_factor) {
            $sell_factor->customer_type = $request->input('customer_type');
            $sell_factor->factor_no = $request->input('factor_no');
            $sell_factor->factor_date = $request->input('factor_date');
            $sell_factor->commission = $request->input('commission');
            $sell_factor->settlement_deadline = $request->input('settlement_deadline');
            $sell_factor->settlement_date = $request->input('settlement_date');
            $sell_factor->buyer()->associate($request->buyer);
            $sell_factor->broker()->associate($request->broker);
            $sell_factor->update();
            $sell_factor->products()->attach($request->products);
            return self::fetchData(200, 'فاکتور فروش ویرایش شد');
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
     * @param  \App\Models\SellFactor  $sellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell_factor = SellFactor::find($id);
        $sell_factor->delete();
        return self::fetchData(200, 'فاکتور فروش حذف شد');
    }

    public function fetch_sell_factor_id($id)
    {
        $sell_factor = SellFactor::findOrFail($id);

        $sell_factor_by_id = '';

        if ($sell_factor) {
            $count = $sell_factor->products->count();
            foreach ($sell_factor->products as $product) {
                $sell_factor_by_id .=
                    '
                    <tr class="editRow">
                    <td style="display:none;">' . $product->id . '</td>
                    <td>' . $product->code . '</td>
                    <td>' . $product->product_name . '</td>
                    <td>' . number_format($product->sell_price) . ' ریال</td>
                    <td>' . number_format($product->pivot->total) . ' ریال</td>
                    <td style="display:none;">' . $product->warehouse->id . '</td>
                    <td>' . $product->pivot->amount . '</td>
                    <td>' . $product->pivot->discount . '</td>
                    <td>' . $product->pivot->considerations . '</td>
                    </tr>
                ';
            }
            return response()->json([
                'status' => 200,
                'count' => $count,
                'sell_factor_by_id' => $sell_factor_by_id,
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }
}
