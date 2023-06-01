<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountGroupRequest;
use App\Models\AccountGroup;
use Illuminate\Http\Request;

class AccountGroupController extends Controller
{
    public function fetchAccountGroup()
    {
        $account_groups = AccountGroup::orderBy('name', 'asc')->get();
        return response()->json([
            'account_groups' => $account_groups,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return response()->json([
            'status' => 200,
            'message' => 'گروه حساب جدید ذخیره شد',
        ]);
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
            return response()->json([
                'status' => 200,
                'message' => 'گروه حساب ویرایش شد',
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
     * @param  \App\Models\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account_group = AccountGroup::find($id);
        $account_group->delete();
        return response()->json([
            'status' => 200,
            'message' => 'گروه حساب حذف شد',
        ]);
    }
}
