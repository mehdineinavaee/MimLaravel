<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_staff($row, $status, $message)
    {
        $data = Staff::orderBy('id', 'desc')->paginate($row);

        $staffs = '';

        $count = DB::table('staff')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $staffs .=
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
            return response()->json([
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $staffs,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_staff(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $staffs = Staff::where('first_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('father', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('birthdate', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('national_code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('occupation', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($staffs) {
                foreach ($staffs as $index => $item) {
                    $search .=
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
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$staffs->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('staff')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_staff($row, 200, '');
            }
            return view('taarife-payeh/staff.index');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('staff')) {
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
            $row = $request["row"];
            return self::index_fetch_staff($row, 200, 'پرسنل جدید ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('staff')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('staff')) {
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
                $row = $request["row"];
                return self::index_fetch_staff($row, 200, 'پرسنل ویرایش شد');
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اطلاعاتی یافت نشد',
                ]);
            }
        } else {
            return abort(401);
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
        if (Gate::allows('staff')) {
            $staff = Staff::find($id);
            $staff->delete();
            return self::index_fetch_staff(10, 200, 'پرسنل حذف شد');
        } else {
            return abort(401);
        }
    }
}
