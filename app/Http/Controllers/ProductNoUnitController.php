<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductNoUnitRequest;
use App\Models\ProductNoUnit;
use Illuminate\Http\Request;

class ProductNoUnitController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = ProductNoUnit::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->title . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_product_no_unit btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/product-no-unit/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('taarife-payeh/product-no-unit.index');
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
    public function store(ProductNoUnitRequest $request)
    {
        $product_no_unit = new ProductNoUnit();
        $product_no_unit->chk_active = $request->chk_active;
        $product_no_unit->code = $request->input('code');
        $product_no_unit->title = $request->input('title');
        $product_no_unit->save();
        return self::fetchData(200, 'واحد شمارش کالا جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductNoUnit $productNoUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_no_unit = ProductNoUnit::find($id);
        if ($product_no_unit) {
            return response()->json([
                'status' => 200,
                'product_no_unit' => $product_no_unit,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'واحد شمارش کالا یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function update(ProductNoUnitRequest $request, $id)
    {
        $product_no_unit = ProductNoUnit::find($id);
        if ($product_no_unit) {
            $product_no_unit->chk_active = $request->chk_active;
            $product_no_unit->code = $request->input('code');
            $product_no_unit->title = $request->input('title');
            $product_no_unit->update();
            return self::fetchData(200, 'واحد شمارش کالا ویرایش شد');
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
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_no_unit = ProductNoUnit::find($id);
        $product_no_unit->delete();
        return self::fetchData(200, 'واحد شمارش کالا حذف شد');
    }
}
