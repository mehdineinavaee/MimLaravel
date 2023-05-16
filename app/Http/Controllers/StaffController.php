<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function fetchStaff()
    {
        $staffs = Staff::orderBy('id', 'desc')->get();
        // $staffs = Staff::all();
        return response()->json([
            'staffs' => $staffs,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/staff.index');
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
    public function store(StaffRequest $request)
    {
        $staff = new Staff();
        $staff->first_name = $request->input('first_name');
        $staff->last_name = $request->input('last_name');
        $staff->father = $request->input('father');
        $staff->save();
        return response()->json([
            'status' => 200,
            'message' => 'پرسنل جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        if ($staff) {
            return response()->json([
                'status' => 200,
                'staff' => $staff,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'پرسنل یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, $id)
    {
        $staff = Staff::find($id);
        if ($staff) {
            $staff->first_name = $request->input('first_name');
            $staff->last_name = $request->input('last_name');
            $staff->father = $request->input('father');
            $staff->update();
            return response()->json([
                'status' => 200,
                'message' => 'پرسنل ویرایش شد',
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return response()->json([
            'status' => 200,
            'message' => 'پرسنل حذف شد',
        ]);
    }
}
