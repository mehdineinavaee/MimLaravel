<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnBuyFactorRequest;
use App\Models\Product;
use App\Models\ReturnBuyFactor;
use App\Models\TarafHesab;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReturnBuyFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_factors($row, $status, $message)
    {
        $data = ReturnBuyFactor::orderBy('factor_no', 'desc')->paginate($row);

        $factors = '';

        $count = DB::table('return_buy_factors')->count();

        if ($data) {
            foreach ($data as $index => $factor) {
                $total = 0;

                foreach ($factor->products as $detail) {
                    $total = $total + $detail->pivot->total;
                }

                if ($factor->seller === null) {
                    $bv = $factor->viator;
                } else {
                    $bv = $factor->seller->fullname;
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
                                <button type="button" value=' . $factor->id . ' class="edit_return_buy_factor btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/return-buy-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
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

    public function index_search_return_buy_factors(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $factors = ReturnBuyFactor::where('factor_no', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('factor_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('viator', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('seller_id', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('factor_no', 'asc')->paginate($request->row);
            }
            if ($factors) {
                foreach ($factors as $factor) {
                    $total = 0;

                    foreach ($factor->products as $detail) {
                        $total = $total + $detail->pivot->total;
                    }

                    if ($factor->seller === null) {
                        $bv = $factor->viator;
                    } else {
                        $bv = $factor->seller->fullname;
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
                                    <button type="button" value=' . $factor->id . ' class="edit_return_buy_factor btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/return-buy-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
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

    public function fetch_return_buy_factor(Request $request)
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

    public function search_return_buy_factor(Request $request)
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
        if (Gate::allows('return_buy_factor')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_factors($row, 200, '');
            }
            $sellers = TarafHesab::where('chk_seller', '=', "فعال")->orderBy('fullname', 'asc')->get();
            $brokers = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
            $products = Product::orderBy('product_name')->get();
            $warehouses = Warehouse::orderBy('title', 'asc')->get();
            return view('buy-sell/return-buy-factor.index')
                ->with('sellers', $sellers)
                ->with('brokers', $brokers)
                ->with('products', $products)
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
    public function store(ReturnBuyFactorRequest $request)
    {
        if (Gate::allows('return_buy_factor')) {
            $return_buy_factor = new ReturnBuyFactor();
            if ($request->customer_type == 2) {
                $return_buy_factor->national_code = $request->input('national_code');
                $return_buy_factor->viator = $request->input('viator');
                $return_buy_factor->tel = $request->input('tel');
                $return_buy_factor->address = $request->input('address');
            } else {
                $return_buy_factor->national_code = null;
                $return_buy_factor->viator = null;
                $return_buy_factor->tel = null;
                $return_buy_factor->address = null;
                $request->validate([
                    'seller' => 'required',
                ]);
            }
            $return_buy_factor->customer_type = $request->input('customer_type');
            $return_buy_factor->factor_no = $request->input('factor_no');
            $return_buy_factor->factor_date = $request->input('factor_date');
            $return_buy_factor->commission = $request->input('commission');
            $return_buy_factor->settlement_deadline = $request->input('settlement_deadline');
            $return_buy_factor->settlement_date = $request->input('settlement_date');
            $return_buy_factor->seller()->associate($request->seller);
            $return_buy_factor->broker()->associate($request->broker);
            $return_buy_factor->save();

            foreach ($request->factor_items as $factor_item) {
                DB::table('product_return_buy_factor')->insert([
                    'product_id' => $factor_item['product_id'],
                    'return_buy_factor_id' => $return_buy_factor->id,
                    'total' => $factor_item['total'],
                    'amount' => $factor_item['amount'],
                    'discount' => $factor_item['discount'],
                    'considerations' => $factor_item['considerations'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $row = $request["row"];
            return self::index_fetch_factors($row, 200, 'فاکتور برگشت از خرید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnBuyFactor $returnBuyFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('return_buy_factor')) {
            $return_buy_fator = ReturnBuyFactor::find($id);
            if ($return_buy_fator) {
                return response()->json([
                    'status' => 200,
                    'return_buy_factor' => $return_buy_fator,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'فاکتور برگشت از خرید یافت نشد',
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
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function update(ReturnBuyFactorRequest $request, $id)
    {
        if (Gate::allows('return_buy_factor')) {
            $return_buy_factor = ReturnBuyFactor::find($id);
            if ($return_buy_factor) {
                if ($request->customer_type == 2) {
                    $return_buy_factor->national_code = $request->input('national_code');
                    $return_buy_factor->viator = $request->input('viator');
                    $return_buy_factor->tel = $request->input('tel');
                    $return_buy_factor->address = $request->input('address');
                } else {
                    $return_buy_factor->national_code = null;
                    $return_buy_factor->viator = null;
                    $return_buy_factor->tel = null;
                    $return_buy_factor->address = null;
                    $request->validate([
                        'seller' => 'required',
                    ]);
                }
                $return_buy_factor->customer_type = $request->input('customer_type');
                $return_buy_factor->factor_no = $request->input('factor_no');
                $return_buy_factor->factor_date = $request->input('factor_date');
                $return_buy_factor->commission = $request->input('commission');
                $return_buy_factor->settlement_deadline = $request->input('settlement_deadline');
                $return_buy_factor->settlement_date = $request->input('settlement_date');
                $return_buy_factor->seller()->associate($request->seller);
                $return_buy_factor->broker()->associate($request->broker);
                $return_buy_factor->update();
                $return_buy_factor->products()->attach($request->products);
                $row = $request["row"];
                return self::index_fetch_factors($row, 200, 'فاکتور برگشت از خرید ویرایش شد');
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
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('return_buy_factor')) {
            $return_buy_factor = ReturnBuyFactor::find($id);
            $return_buy_factor->delete();
            return self::index_fetch_factors(10, 200, 'فاکتور برگشت از خرید حذف شد');
        } else {
            return abort(401);
        }
    }
}
