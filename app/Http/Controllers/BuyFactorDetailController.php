<?php

namespace App\Http\Controllers;

use App\Models\BuyFactor;
use App\Models\BuyFactorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BuyFactorDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_buy_factor_id($id, $status, $message)
    {
        $buy_factor = BuyFactor::findOrFail($id);
        $buy_factor_by_id = '';

        if ($buy_factor) {
            $count = $buy_factor->products->count();
            $total_with_discount = 0;
            $total_without_discount = 0;
            foreach ($buy_factor->products as $product) {
                $quantity = $product->pivot->amount;
                $sell_price = $product->sell_price;
                $price_without_discount = ($quantity * $sell_price);
                $price_with_discount = $product->pivot->total;
                $total_with_discount = $total_with_discount + ($price_without_discount - $price_with_discount);
                $total_without_discount = $total_without_discount + $price_without_discount;

                $buy_factor_by_id .=
                    '
                    <tr class="editRow">
                        <td style="display:none;">' . $product->id . '</td>
                        <td>' . $product->code . '</td>
                        <td>' . $product->product_name . '</td>
                        <td>' . number_format($sell_price) . ' ریال</td>
                        <td>' . number_format($price_with_discount) . ' ریال</td>
                        <td style="display:none;">' . $product->warehouse->id . '</td>
                        <td>' . $quantity . '</td>
                        <td>' . $product->pivot->discount . '</td>
                        <td>' . $product->pivot->considerations . '</td>
                        <td>
                            <button type="button" value="/destroy-buy-factor/' . $buy_factor->id . '/' . $product->id . '" class="delete_details btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                ';
            }

            return response()->json([
                'count' => $count,
                'buy_factor_by_id' => $buy_factor_by_id,
                'total_without_discount' => $total_without_discount,
                'total_with_discount' => $total_with_discount,
                'status' => $status,
                'message' => $message,
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function update_buy_factor(Request $request, $buy_factor_id, $product_id)
    {
        $buy_factor_item = BuyFactor::findOrFail($buy_factor_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($buy_factor_item) {
            foreach ($buy_factor_item as $product) {
                $product->pivot->total = $request->invoice_total;
                $product->pivot->amount = $request->input('invoice_amount');
                $product->pivot->discount = $request->input('invoice_discount');
                $product->pivot->considerations = $request->input('invoice_considerations');
                $product->pivot->update();
                return self::fetch_buy_factor_id($buy_factor_id, 200, 'آیتم فاکتور خرید ویرایش شد');
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
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
     * @param  \App\Models\BuyFactorDetail  $buyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BuyFactorDetail $buyFactorDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyFactorDetail  $buyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return self::fetch_buy_factor_id($id, 200, '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyFactorDetail  $buyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyFactorDetail $buyFactorDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyFactorDetail  $buyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy_buy_factor($buy_factor_id, $product_id)
    {
        $buy_factor_item = BuyFactor::findOrFail($buy_factor_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($buy_factor_item) {
            foreach ($buy_factor_item as $product) {
                $product->pivot->delete();
                return self::fetch_buy_factor_id($buy_factor_id, 200, 'آیتم فاکتور خرید حذف شد');
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }
}
