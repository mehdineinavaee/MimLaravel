<?php

namespace App\Http\Controllers;

use App\Models\ReturnBuyFactor;
use App\Models\ReturnBuyFactorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReturnBuyFactorDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_return_buy_factor_id($id, $status, $message)
    {
        $return_buy_factor = ReturnBuyFactor::findOrFail($id);
        $return_buy_factor_by_id = '';

        if ($return_buy_factor) {
            $count = $return_buy_factor->products->count();
            $total_with_discount = 0;
            $total_without_discount = 0;
            foreach ($return_buy_factor->products as $product) {
                $quantity = $product->pivot->amount;
                $sell_price = $product->sell_price;
                $price_without_discount = ($quantity * $sell_price);
                $price_with_discount = $product->pivot->total;
                $total_with_discount = $total_with_discount + ($price_without_discount - $price_with_discount);
                $total_without_discount = $total_without_discount + $price_without_discount;

                $return_buy_factor_by_id .=
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
                            <button type="button" value="/destroy-return-buy-factor/' . $return_buy_factor->id . '/' . $product->id . '" class="delete_details btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                ';
            }

            return response()->json([
                'count' => $count,
                'return_buy_factor_by_id' => $return_buy_factor_by_id,
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

    public function update_return_buy_factor(Request $request, $return_buy_factor_id, $product_id)
    {
        $return_buy_factor_item = ReturnBuyFactor::findOrFail($return_buy_factor_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($return_buy_factor_item) {
            foreach ($return_buy_factor_item as $product) {
                $product->pivot->total = $request->invoice_total;
                $product->pivot->amount = $request->input('invoice_amount');
                $product->pivot->discount = $request->input('invoice_discount');
                $product->pivot->considerations = $request->input('invoice_considerations');
                $product->pivot->update();
                return self::fetch_return_buy_factor_id($return_buy_factor_id, 200, 'آیتم فاکتور برگشت از خرید ویرایش شد');
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
     * @param  \App\Models\ReturnBuyFactorDetail  $returnBuyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnBuyFactorDetail $returnBuyFactorDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnBuyFactorDetail  $returnBuyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return self::fetch_return_buy_factor_id($id, 200, '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnBuyFactorDetail  $returnBuyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnBuyFactorDetail $returnBuyFactorDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnBuyFactorDetail  $returnBuyFactorDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy_return_buy_factor($return_buy_factor_id, $product_id)
    {
        $return_buy_factor_item = ReturnBuyFactor::findOrFail($return_buy_factor_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($return_buy_factor_item) {
            foreach ($return_buy_factor_item as $product) {
                $product->pivot->delete();
                return self::fetch_return_buy_factor_id($return_buy_factor_id, 200, 'آیتم فاکتور برگشت از خرید حذف شد');
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }
}
