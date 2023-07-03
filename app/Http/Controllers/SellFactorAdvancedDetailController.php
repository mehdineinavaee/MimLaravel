<?php

namespace App\Http\Controllers;

use App\Models\SellFactorAdvanced;
use App\Models\SellFactorAdvancedDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SellFactorAdvancedDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch_sell_factor_advanced_id($id, $status, $message)
    {
        $sell_factor_advanced = SellFactorAdvanced::findOrFail($id);
        $sell_factor_advanced_by_id = '';

        if ($sell_factor_advanced) {
            $count = $sell_factor_advanced->products->count();
            $total_with_discount = 0;
            $total_without_discount = 0;
            foreach ($sell_factor_advanced->products as $product) {
                $quantity = $product->pivot->amount;
                $sell_price = $product->sell_price;
                $price_without_discount = ($quantity * $sell_price);
                $price_with_discount = $product->pivot->total;
                $total_with_discount = $total_with_discount + ($price_without_discount - $price_with_discount);
                $total_without_discount = $total_without_discount + $price_without_discount;

                $sell_factor_advanced_by_id .=
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
                            <button type="button" value="/destroy-sell-factor-advanced/' . $sell_factor_advanced->id . '/' . $product->id . '" class="delete_details btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                ';
            }

            return response()->json([
                'count' => $count,
                'sell_factor_advanced_by_id' => $sell_factor_advanced_by_id,
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

    public function update_sell_factor_advanced(Request $request, $sell_factor_advanced_id, $product_id)
    {
        $sell_factor_advanced_item = SellFactorAdvanced::findOrFail($sell_factor_advanced_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($sell_factor_advanced_item) {
            foreach ($sell_factor_advanced_item as $product) {
                $product->pivot->total = $request->invoice_total;
                $product->pivot->amount = $request->input('invoice_amount');
                $product->pivot->discount = $request->input('invoice_discount');
                $product->pivot->considerations = $request->input('invoice_considerations');
                $product->pivot->update();
                return self::fetch_sell_factor_advanced_id($sell_factor_advanced_id, 200, 'آیتم پیش فاکتور فروش ویرایش شد');
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
     * @param  \App\Models\SellFactorAdvancedDetail  $sellFactorAdvancedDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SellFactorAdvancedDetail $sellFactorAdvancedDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellFactorAdvancedDetail  $sellFactorAdvancedDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return self::fetch_sell_factor_advanced_id($id, 200, '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellFactorAdvancedDetail  $sellFactorAdvancedDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellFactorAdvancedDetail $sellFactorAdvancedDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellFactorAdvancedDetail  $sellFactorAdvancedDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy_sell_factor_advanced($sell_factor_advanced_id, $product_id)
    {
        $sell_factor_advanced_item = SellFactorAdvanced::findOrFail($sell_factor_advanced_id)->products()->having('pivot_product_id', '=', $product_id)->get();
        if ($sell_factor_advanced_item) {
            foreach ($sell_factor_advanced_item as $product) {
                $product->pivot->delete();
                return self::fetch_sell_factor_advanced_id($sell_factor_advanced_id, 200, 'آیتم پیش فاکتور فروش حذف شد');
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }
}
