<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function fetchData()
    {
        $output = '';
        $data = Warehouse::orderBy('id', 'desc')->paginate(10);

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
                            <button type="button" value=' . $item->id . ' class="edit_warehouse btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/warehouse/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
            }
            return [$output, $data];
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
            list($data, $pagination) = self::fetchData();
            return response()->json([
                'output' => $data,
                'pagination' => (string)$pagination->links(),
            ]);
        }
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
        if ($request->ajax()) {
            $warehouse = new Warehouse();
            $warehouse->chk_active = $request->chk_active;
            $warehouse->code = $request->input('code');
            $warehouse->title = $request->input('title');
            $warehouse->save();
            list($data, $pagination) = self::fetchData();
            return response()->json([
                'output' => $data,
                'pagination' => (string)$pagination->links(),
                'status' => 200,
                'message' => 'انبار جدید ذخیره شد',
            ]);
        }
        return view('buy-sell/return-buy-factor.index');
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
        if ($request->ajax()) {
            $warehouse = Warehouse::find($id);
            if ($warehouse) {
                $warehouse->chk_active = $request->chk_active;
                $warehouse->code = $request->input('code');
                $warehouse->title = $request->input('title');
                $warehouse->update();
                list($data, $pagination) = self::fetchData();
                return response()->json([
                    'output' => $data,
                    'pagination' => (string)$pagination->links(),
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
        list($data, $pagination) = self::fetchData();
        return response()->json([
            'output' => $data,
            'pagination' => (string)$pagination->links(),
            'status' => 200,
            'message' => 'انبار حذف شد',
        ]);
    }
}
