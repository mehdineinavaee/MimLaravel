<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnSellFactorRequest;
use App\Models\Product;
use App\Models\ReturnSellFactor;
use App\Models\TarafHesab;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReturnSellFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_factors($row, $status, $message)
    {
        $data = ReturnSellFactor::orderBy('factor_no', 'desc')->paginate($row);

        $factors = '';

        $count = DB::table('return_buy_factors')->count();

        if ($data) {
            foreach ($data as $index => $factor) {
                $total = 0;

                foreach ($factor->products as $detail) {
                    $total = $total + $detail->pivot->total;
                }

                if ($factor->buyer === null) {
                    $bv = $factor->viator;
                } else {
                    $bv = $factor->buyer->fullname;
                }

                $factors .=
                    '
                        <tr class="indexRow">
                            <td style="display:none;" id="index_id">' . $factor->id . '</td>
                            <td>' . $factor->factor_no . '</td>
                            <td>' . $factor->factor_date . '</td>
                            <td>' . $bv . '</td>
                            <td>' . number_format($total) . ' ریال</td>
                            <td>
                                <button type="button" value=' . $factor->id . ' class="edit_return_sell_factor btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/return-sell-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $factors,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_return_sell_factors(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $factors = ReturnSellFactor::where('factor_no', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('factor_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('viator', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('buyer_id', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('factor_no', 'asc')->paginate($request->row);
            }
            if ($factors) {
                foreach ($factors as $factor) {
                    $total = 0;

                    foreach ($factor->products as $detail) {
                        $total = $total + $detail->pivot->total;
                    }

                    if ($factor->buyer === null) {
                        $bv = $factor->viator;
                    } else {
                        $bv = $factor->buyer->fullname;
                    }

                    $search .=
                        '
                            <tr class="indexRow">
                                <td style="display:none;">' . $factor->id . '</td>
                                <td>' . $factor->factor_no . '</td>
                                <td>' . $factor->factor_date . '</td>
                                <td>' . $bv . '</td>
                                <td>' . number_format($total) . ' ریال</td>
                                <td>
                                    <button type="button" value=' . $factor->id . ' class="edit_return_sell_factor btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/return-sell-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
                                        <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$factors->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }
    }

    public function fetch_return_sell_factor(Request $request)
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
                'data' => $products,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function search_return_sell_factor(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $products = Product::where('code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('product_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('sell_price', 'LIKE', '%' . $request->search . '%')
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
        if ($request->ajax()) {
            $row = $request["row"];
            return self::index_fetch_factors($row, 200, '');
        }
        $buyers = TarafHesab::where('chk_buyer', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $brokers = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $products = Product::orderBy('product_name')->get();
        $warehouses = Warehouse::orderBy('title', 'asc')->get();
        return view('buy-sell/return-sell-factor.index')
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
    public function store(ReturnSellFactorRequest $request)
    {
        $return_sell_factor = new ReturnSellFactor();
        if ($request->customer_type == 2) {
            $return_sell_factor->national_code = $request->input('national_code');
            $return_sell_factor->viator = $request->input('viator');
            $return_sell_factor->tel = $request->input('tel');
            $return_sell_factor->address = $request->input('address');
        } else {
            $return_sell_factor->national_code = null;
            $return_sell_factor->viator = null;
            $return_sell_factor->tel = null;
            $return_sell_factor->address = null;
            $request->validate([
                'buyer' => 'required',
            ]);
        }
        $return_sell_factor->customer_type = $request->input('customer_type');
        $return_sell_factor->factor_no = $request->input('factor_no');
        $return_sell_factor->factor_date = $request->input('factor_date');
        $return_sell_factor->commission = $request->input('commission');
        $return_sell_factor->settlement_deadline = $request->input('settlement_deadline');
        $return_sell_factor->settlement_date = $request->input('settlement_date');
        $return_sell_factor->buyer()->associate($request->buyer);
        $return_sell_factor->broker()->associate($request->broker);
        $return_sell_factor->save();

        foreach ($request->factor_items as $factor_item) {
            DB::table('product_return_sell_factor')->insert([
                'product_id' => $factor_item['product_id'],
                'return_sell_factor_id' => $return_sell_factor->id,
                'total' => $factor_item['total'],
                'amount' => $factor_item['amount'],
                'discount' => $factor_item['discount'],
                'considerations' => $factor_item['considerations'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $row = $request["row"];
        return self::index_fetch_factors($row, 200, 'فاکتور برگشت از فروش ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnSellFactor $returnSellFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        if ($return_sell_factor) {
            return response()->json([
                'status' => 200,
                'return_sell_factor' => $return_sell_factor,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'فاکتور برگشت از فروش یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function update(ReturnSellFactorRequest $request, $id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        if ($return_sell_factor) {
            if ($request->customer_type == 2) {
                $return_sell_factor->national_code = $request->input('national_code');
                $return_sell_factor->viator = $request->input('viator');
                $return_sell_factor->tel = $request->input('tel');
                $return_sell_factor->address = $request->input('address');
            } else {
                $return_sell_factor->national_code = null;
                $return_sell_factor->viator = null;
                $return_sell_factor->tel = null;
                $return_sell_factor->address = null;
                $request->validate([
                    'buyer' => 'required',
                ]);
            }
            $return_sell_factor->customer_type = $request->input('customer_type');
            $return_sell_factor->factor_no = $request->input('factor_no');
            $return_sell_factor->factor_date = $request->input('factor_date');
            $return_sell_factor->commission = $request->input('commission');
            $return_sell_factor->settlement_deadline = $request->input('settlement_deadline');
            $return_sell_factor->settlement_date = $request->input('settlement_date');
            $return_sell_factor->buyer()->associate($request->buyer);
            $return_sell_factor->broker()->associate($request->broker);
            $return_sell_factor->update();
            $return_sell_factor->products()->attach($request->products);
            $row = $request["row"];
            return self::index_fetch_factors($row, 200, 'فاکتور برگشت از فروش ویرایش شد');
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
     * @param  \App\Models\ReturnSellFactor  $returnSellFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return_sell_factor = ReturnSellFactor::find($id);
        $return_sell_factor->delete();
        return self::index_fetch_factors(10, 200, 'فاکتور برگشت از فروش حذف شد');
    }
}
