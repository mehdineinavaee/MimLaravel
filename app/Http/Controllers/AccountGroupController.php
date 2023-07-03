<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountGroupRequest;
use App\Models\AccountGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AccountGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_account_group($row, $status, $message)
    {
        $data = AccountGroup::orderBy('name', 'asc')->paginate($row);

        $account_groups = '';

        $count = DB::table('account_groups')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $account_groups .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->name . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_account_group btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/account-group/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $account_groups,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_account_group(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $account_groups = AccountGroup::where('code', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('name', 'asc')->paginate($request->row);
            }
            if ($account_groups) {
                foreach ($account_groups as $index => $item) {
                    $search .=
                        '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->name . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_account_group btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/account-group/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$account_groups->links(),
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
        if ($request->ajax()) {
            $row = $request["row"];
            return self::index_fetch_account_group($row, 200, '');
        }
        return view('taarife-payeh/account-group.index');
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
    public function store(AccountGroupRequest $request)
    {
        $account_group = new AccountGroup();
        $account_group->code = $request->input('code');
        $account_group->name = $request->input('name');
        $account_group->save();
        $row = $request["row"];
        return self::index_fetch_account_group($row, 200, 'گروه حساب جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AccountGroup $accountGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_group = AccountGroup::find($id);
        if ($account_group) {
            return response()->json([
                'status' => 200,
                'account_group' => $account_group,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'گروه حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function update(AccountGroupRequest $request, $id)
    {
        $account_group = AccountGroup::find($id);
        if ($account_group) {
            $account_group->code = $request->input('code');
            $account_group->name = $request->input('name');
            $account_group->update();
            $row = $request["row"];
            return self::index_fetch_account_group($row, 200, 'گروه حساب ویرایش شد');
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
     * @param  \App\Models\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account_group = AccountGroup::find($id);
        $account_group->delete();
        return self::index_fetch_account_group(10, 200, 'گروه حساب حذف شد');
    }
}
