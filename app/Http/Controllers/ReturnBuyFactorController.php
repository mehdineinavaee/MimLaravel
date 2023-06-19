<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnBuyFactorRequest;
use App\Models\ReturnBuyFactor;
use Illuminate\Http\Request;

class ReturnBuyFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = ReturnBuyFactor::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $item->return_buy_factor_no . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_return_buy_factor btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/return-buy-factor/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('buy-sell/return-buy-factor.index');
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
        $return_buy_factor = new ReturnBuyFactor();
        $return_buy_factor->return_buy_factor_no = $request->input('return_buy_factor_no');
        $return_buy_factor->save();
        return self::fetchData(200, 'فاکتور برگشت از خرید ذخیره شد');
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
        $return_buy_factor = ReturnBuyFactor::find($id);
        if ($return_buy_factor) {
            $return_buy_factor->return_buy_factor_no = $request->input('return_buy_factor_no');
            $return_buy_factor->update();
            return self::fetchData(200, 'فاکتور برگشت از خرید ویرایش شد');
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
     * @param  \App\Models\ReturnBuyFactor  $returnBuyFactor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return_buy_factor = ReturnBuyFactor::find($id);
        $return_buy_factor->delete();
        return self::fetchData(200, 'فاکتور برگشت از خرید حذف شد');
    }
}
