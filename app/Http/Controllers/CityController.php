<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Exports\CityExport;
use Excel;

class CityController extends Controller
{
    public function exportCSV()
    {
        return Excel::download(new CityExport, 'citylist.xlsx');
    }

    public function fetchCities()
    {
        $cities = City::orderBy('city_name', 'asc')->get();
        return response()->json([
            'cities' => $cities,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/cities.index');
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
    public function store(CityRequest $request)
    {
        $city = new City();
        $city->city_code = $request->input('city_code');
        $city->city_name = $request->input('city_name');
        $city->save();
        return response()->json([
            'status' => 200,
            'message' => 'شهر جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        if ($city) {
            return response()->json([
                'status' => 200,
                'city' => $city,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'شهر یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        if ($city) {
            $city->city_code = $request->input('city_code');
            $city->city_name = $request->input('city_name');
            $city->update();
            return response()->json([
                'status' => 200,
                'message' => 'شهر ویرایش شد',
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return response()->json([
            'status' => 200,
            'message' => 'شهر حذف شد',
        ]);
    }
}
