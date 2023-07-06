<?php

namespace App\Http\Controllers;

use App\Http\Requests\WastageFactorRequest;
use App\Models\Product;
use App\Models\TarafHesab;
use App\Models\Warehouse;
use App\Models\WastageFactor;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class WastageFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_factors($row, $status, $message)
    {
        $data = WastageFactor::orderBy('factor_no', 'desc')->paginate($row);

        $factors = '';

        $count = DB::table('wastage_factors')->count();

        if ($data) {
            foreach ($data as $index => $factor) {
                $total = 0;

                foreach ($factor->products as $detail) {
                    $total = $total + $detail->pivot->total;
                }

                if ($factor->wastage_type == 2) {
                    if ($factor->buyer === null) {
                        if ($factor->viator === null) {
                            $bv = "-";
                        } else {
                            $bv = $factor->viator;
                        }
                    } else {
                        $bv = $factor->buyer->fullname;
                    }
                } else {
                    $bv = "غیر قابل استفاده";
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
                                <button type="button" value=' . $factor->id . ' class="edit_wastage_factor btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/wastage-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
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

    public function index_search_wastage_factor(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $factors = WastageFactor::where('factor_no', 'LIKE', '%' . $request->search . '%')
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

                    if ($factor->wastage_type == 2) {
                        if ($factor->buyer === null) {
                            if ($factor->viator === null) {
                                $bv = "-";
                            } else {
                                $bv = $factor->viator;
                            }
                        } else {
                            $bv = $factor->buyer->fullname;
                        }
                    } else {
                        $bv = "غیر قابل استفاده";
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
                                    <button type="button" value=' . $factor->id . ' class="edit_wastage_factor btn btn-primary btn-sm">
                                        <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                    </button>
                                    <button type="button" value="/wastage-factor/' . $factor->id . '" class="delete btn btn-danger btn-sm">
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

    public function fetch_wastage_factor(Request $request)
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

    public function search_wastage_factor(Request $request)
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
        if (Gate::allows('wastage_factor')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_factors($row, 200, '');
            }
            $buyers = TarafHesab::where('chk_buyer', '=', "فعال")->orderBy('fullname', 'asc')->get();
            $brokers = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
            $products = Product::orderBy('product_name')->get();
            $warehouses = Warehouse::orderBy('title', 'asc')->get();
            return view('buy-sell/wastage-factor.index')
                ->with('buyers', $buyers)
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
    public function store(WastageFactorRequest $request)
    {
        if (Gate::allows('wastage_factor')) {
            $wastage_factor = new WastageFactor();
            if ($request->wastage_type == 2) {
                $request->validate([
                    'customer_type' => 'required',
                ]);
                if ($request->customer_type == 2) {
                    $wastage_factor->national_code = $request->input('national_code');
                    $wastage_factor->viator = $request->input('viator');
                    $wastage_factor->tel = $request->input('tel');
                    $wastage_factor->address = $request->input('address');
                } else {
                    $wastage_factor->national_code = null;
                    $wastage_factor->viator = null;
                    $wastage_factor->tel = null;
                    $wastage_factor->address = null;
                    $request->validate([
                        'buyer' => 'required',
                    ]);
                }
            }

            $wastage_factor->customer_type = $request->input('customer_type');
            $wastage_factor->wastage_type = $request->input('wastage_type');
            $wastage_factor->factor_no = $request->input('factor_no');
            $wastage_factor->factor_date = $request->input('factor_date');
            $wastage_factor->settlement_deadline = $request->input('settlement_deadline');
            $wastage_factor->settlement_date = $request->input('settlement_date');
            $wastage_factor->buyer()->associate($request->buyer);
            $wastage_factor->save();

            foreach ($request->factor_items as $factor_item) {
                DB::table('product_wastage_factor')->insert([
                    'product_id' => $factor_item['product_id'],
                    'wastage_factor_id' => $wastage_factor->id,
                    'total' => $factor_item['total'],
                    'amount' => $factor_item['amount'],
                    'discount' => $factor_item['discount'],
                    'considerations' => $factor_item['considerations'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $row = $request["row"];
            return self::index_fetch_factors($row, 200, 'فاکتور ضایعات ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function show(WastageFactor $wastageFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('wastage_factor')) {
            $wastage_factor = WastageFactor::find($id);
            if ($wastage_factor) {
                return response()->json([
                    'status' => 200,
                    'wastage_factor' => $wastage_factor,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'فاکتور ضایعات یافت نشد',
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
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function update(WastageFactorRequest $request, $id)
    {
        if (Gate::allows('wastage_factor')) {
            $wastage_factor = WastageFactor::find($id);
            if ($wastage_factor) {
                if ($request->wastage_type == 2) {
                    $request->validate([
                        'customer_type' => 'required',
                    ]);
                    if ($request->customer_type == 2) {
                        $wastage_factor->national_code = $request->input('national_code');
                        $wastage_factor->viator = $request->input('viator');
                        $wastage_factor->tel = $request->input('tel');
                        $wastage_factor->address = $request->input('address');
                    } else {
                        $wastage_factor->national_code = null;
                        $wastage_factor->viator = null;
                        $wastage_factor->tel = null;
                        $wastage_factor->address = null;
                        $request->validate([
                            'buyer' => 'required',
                        ]);
                    }
                }
                $wastage_factor->customer_type = $request->input('customer_type');
                $wastage_factor->wastage_type = $request->input('wastage_type');
                $wastage_factor->factor_no = $request->input('factor_no');
                $wastage_factor->factor_date = $request->input('factor_date');
                $wastage_factor->settlement_deadline = $request->input('settlement_deadline');
                $wastage_factor->settlement_date = $request->input('settlement_date');
                $wastage_factor->buyer()->associate($request->buyer);
                $wastage_factor->update();
                $wastage_factor->products()->attach($request->products);
                $row = $request["row"];
                return self::index_fetch_factors($row, 200, 'فاکتور ضایعات ویرایش شد');
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
     * @param  \App\Models\WastageFactor  $wastageFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('wastage_factor')) {
            $wastage_factor = WastageFactor::find($id);
            $wastage_factor->delete();
            return self::index_fetch_factors(10, 200, 'فاکتور ضایعات حذف شد');
        } else {
            return abort(401);
        }
    }
}
