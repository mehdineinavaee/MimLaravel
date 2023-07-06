<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_user($row, $status, $message)
    {
        if (Gate::allows('users')) {
            $data = User::orderBy('last_name', 'asc')->paginate($row);

            $users = '';

            $count = DB::table('users')->count();

            if ($data) {
                foreach ($data as $index => $item) {
                    $users .=
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
                            <button type="button" value=' . $item->id . ' class="edit_user btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/users/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                    'data' => $users,
                    'pagination' => (string)$data->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                ]);
            }
        } else {
            return abort(401);
        }
    }

    public function index_search_user(Request $request)
    {
        if (Gate::allows('users')) {
            if ($request->ajax()) {
                $search = '';
                if ($request->row != null) {
                    $users = User::where('national_code', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('father', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('opt_sex', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('birthdate', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('occupation', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->orderBy('last_name', 'asc')->paginate($request->row);
                }
                if ($users) {
                    foreach ($users as $index => $item) {
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
                            <button type="button" value=' . $item->id . ' class="edit_user btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/users/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                    }
                    return response()->json([
                        'status' => 200,
                        'data' => $search,
                        'pagination' => (string)$users->links(),
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                    ]);
                }
            }
        } else {
            return abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('users')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_user($row, 200, '');
            }
            $roles = Role::All();
            return view('security/users.index')
                ->with('roles', $roles);
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

    public function store(UserRequest $request)
    {
        if (Gate::allows('users')) {
            $user = new User();
            $user->chk_active = $request->chk_active;
            $user->chk_messenger = $request->chk_messenger;
            $user->national_code = $request->input('national_code');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->father = $request->input('father');
            $user->opt_sex = $request->opt_sex;
            $user->birthdate = $request->input('birthdate');
            $user->occupation = $request->input('occupation');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role()->associate($request->role);
            $user->save();
            $row = $request["row"];
            return self::index_fetch_user($row, 200, 'کاربر جدید ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('users')) {
            $user = User::find($id);
            if ($user) {
                return response()->json([
                    'status' => 200,
                    'user' => $user,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'کاربر یافت نشد',
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('users')) {
            $request->validate([
                'national_code' => 'nullable|numeric|digits:10',
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50', // digits_between:2,4
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
                'father' => 'nullable|regex:/^[\pL\s\-]+$/u|max:50',
                // 'birthdate' => 'nullable|date',
                'role' => 'required',
            ]);
            $user = User::find($id);
            if ($user) {
                $user->chk_active = $request->chk_active;
                $user->chk_messenger = $request->chk_messenger;
                $user->national_code = $request->input('national_code');
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->father = $request->input('father');
                $user->opt_sex = $request->opt_sex;
                $user->birthdate = $request->input('birthdate');
                $user->occupation = $request->input('occupation');
                $user->role()->associate($request->role);
                $user->update();
                $row = $request["row"];
                return self::index_fetch_user($row, 200, 'کاربر ویرایش شد');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('users')) {
            $user = User::find($id);
            $user->delete();
            return self::index_fetch_user(10, 200, 'کاربر حذف شد');
        } else {
            return abort(401);
        }
    }
}
