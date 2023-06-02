<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductNoUnitRequest;
use App\Models\ProductNoUnit;
use Illuminate\Http\Request;

class ProductNoUnitController extends Controller
{
    public function fetchData()
    {
        $product_no_units = ProductNoUnit::orderBy('id', 'desc')->get();
        return response()->json([
            'productNoUnits' => $product_no_units,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $product_no_unit->code = $request->input('code');
        $product_no_unit->title = $request->input('title');
        $product_no_unit->save();
        return response()->json([
            'status' => 200,
            'message' => 'واحد شمارش کالا جدید ذخیره شد',
        ]);
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
            $product_no_unit->code = $request->input('code');
            $product_no_unit->title = $request->input('title');
            $product_no_unit->update();
            return response()->json([
                'status' => 200,
                'message' => 'واحد شمارش کالا ویرایش شد',
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
     * @param  \App\Models\ProductNoUnit  $productNoUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_no_unit = ProductNoUnit::find($id);
        $product_no_unit->delete();
        return response()->json([
            'status' => 200,
            'message' => 'واحد شمارش کالا حذف شد',
        ]);
    }
}
