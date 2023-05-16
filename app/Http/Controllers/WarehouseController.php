<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function fetchWarehouse()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->get();
        return response()->json([
            'warehouses' => $warehouses,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/warehouse.index');
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
    public function store(WarehouseRequest $request)
    {
        $warehouse = new Warehouse();
        $warehouse->code = $request->input('code');
        $warehouse->title = $request->input('title');
        $warehouse->save();
        return response()->json([
            'status' => 200,
            'message' => 'انبار جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        if ($warehouse) {
            return response()->json([
                'status' => 200,
                'warehouse' => $warehouse,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'انبار یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRequest $request, $id)
    {
        $warehouse = Warehouse::find($id);
        if ($warehouse) {
            $warehouse->code = $request->input('code');
            $warehouse->title = $request->input('title');
            $warehouse->update();
            return response()->json([
                'status' => 200,
                'message' => 'انبار ویرایش شد',
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
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return response()->json([
            'status' => 200,
            'message' => 'انبار حذف شد',
        ]);
    }
}
