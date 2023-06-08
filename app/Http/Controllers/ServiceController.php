<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function fetchData($status, $message)
    {
        $output = '';
        $data = Service::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {

                if ($item->price != null) {
                    $price = number_format($item->price);
                } else {
                    $price = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->service_code . '</td>
                        <td>' . $item->service_name . '</td>
                        <td>' . $price . ' ریال</td>
                        <td>' . $item->group . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_service btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/services/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('taarife-payeh/services.index');
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
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->chk_active = $request->input('chk_active');
        $service->service_code = $request->input('service_code');
        $service->service_name = $request->input('service_name');
        $service->price = str_replace(",", "", $request->input('price'));
        $service->group = $request->input('group');
        $service->save();
        return self::fetchData(200, 'خدمات جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        if ($service) {
            return response()->json([
                'status' => 200,
                'service' => $service,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'خدمات یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->chk_active = $request->input('chk_active');
            $service->service_code = $request->input('service_code');
            $service->service_name = $request->input('service_name');
            $service->price = str_replace(",", "", $request->input('price'));
            $service->group = $request->input('group');
            $service->update();
            return self::fetchData(200, 'خدمات ویرایش شد');
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return self::fetchData(200, 'خدمات حذف شد');
    }
}
