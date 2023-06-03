<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function fetchData()
    {
        $output = '';
        $data = Staff::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>' . $item->chk_messenger . '</td>
                        <td>' . $item->opt_sex . '</td>
                        <td>' . $item->first_name . '</td>
                        <td>' . $item->last_name . '</td>
                        <td>' . $item->father . '</td>
                        <td>' . $item->birthdate . '</td>
                        <td>' . $item->national_code . '</td>
                        <td>' . $item->occupation . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_staff btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/staff/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $staff->chk_active = $request->chk_active;
        $staff->chk_messenger = $request->chk_messenger;
        $staff->opt_sex = $request->opt_sex;
        $staff->first_name = $request->input('first_name');
        $staff->last_name = $request->input('last_name');
        $staff->father = $request->input('father');
        $staff->birthdate = $request->input('birthdate');
        $staff->national_code = $request->input('national_code');
        $staff->occupation = $request->input('occupation');
        $staff->save();
        list($data, $pagination) = self::fetchData();
        return response()->json([
            'output' => $data,
            'pagination' => (string)$pagination->links(),
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
            $staff->chk_active = $request->chk_active;
            $staff->chk_messenger = $request->chk_messenger;
            $staff->opt_sex = $request->opt_sex;
            $staff->first_name = $request->input('first_name');
            $staff->last_name = $request->input('last_name');
            $staff->father = $request->input('father');
            $staff->birthdate = $request->input('birthdate');
            $staff->national_code = $request->input('national_code');
            $staff->occupation = $request->input('occupation');
            $staff->update();
            list($data, $pagination) = self::fetchData();
            return response()->json([
                'output' => $data,
                'pagination' => (string)$pagination->links(),
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
        list($data, $pagination) = self::fetchData();
        return response()->json([
            'output' => $data,
            'pagination' => (string)$pagination->links(),
            'status' => 200,
            'message' => 'پرسنل حذف شد',
        ]);
    }
}
