<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function fetchService()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return response()->json([
            'services' => $services,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $service->service_code = $request->input('service_code');
        $service->service_name = $request->input('service_name');
        $service->price = $request->input('price');
        $service->group = $request->input('group');
        $service->save();
        return response()->json([
            'status' => 200,
            'message' => 'خدمات جدید ذخیره شد',
        ]);
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
            $service->service_code = $request->input('service_code');
            $service->service_name = $request->input('service_name');
            $service->price = $request->input('price');
            $service->group = $request->input('group');
            $service->update();
            return response()->json([
                'status' => 200,
                'message' => 'خدمات ویرایش شد',
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return response()->json([
            'status' => 200,
            'message' => 'خدمات حذف شد',
        ]);
    }
}
