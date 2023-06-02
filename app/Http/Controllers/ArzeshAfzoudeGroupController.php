<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArzeshAfzoudeGroupRequest;
use App\Models\ArzeshAfzoudeGroup;
use Illuminate\Http\Request;

class ArzeshAfzoudeGroupController extends Controller
{
    public function fetchData()
    {
        $arzesh_afzoude_groups = ArzeshAfzoudeGroup::orderBy('id', 'desc')->get();
        return response()->json([
            'arzesh_afzoude_groups' => $arzesh_afzoude_groups,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taarife-payeh/arzesh-afzoude-groups.index');
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
    public function store(ArzeshAfzoudeGroupRequest $request)
    {
        $arzesh_afzoude_group = new ArzeshAfzoudeGroup();
        $arzesh_afzoude_group->group_name = $request->input('group_name');
        $arzesh_afzoude_group->financial_year = $request->input('financial_year');
        $arzesh_afzoude_group->avarez = $request->input('avarez');
        $arzesh_afzoude_group->save();
        return response()->json([
            'status' => 200,
            'message' => 'گروه ارزش افزوده جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ArzeshAfzoudeGroup $arzeshAfzoudeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arzesh_afzoude_group = ArzeshAfzoudeGroup::find($id);
        if ($arzesh_afzoude_group) {
            return response()->json([
                'status' => 200,
                'arzesh_afzoude_group' => $arzesh_afzoude_group,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'گروه ارزش افزوده یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(ArzeshAfzoudeGroupRequest $request, $id)
    {
        $arzesh_afzoude_group = ArzeshAfzoudeGroup::find($id);
        if ($arzesh_afzoude_group) {
            $arzesh_afzoude_group->group_name = $request->input('group_name');
            $arzesh_afzoude_group->financial_year = $request->input('financial_year');
            $arzesh_afzoude_group->avarez = $request->input('avarez');
            $arzesh_afzoude_group->update();
            return response()->json([
                'status' => 200,
                'message' => 'گروه ارزش افزوده ویرایش شد',
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
     * @param  \App\Models\ArzeshAfzoudeGroup  $arzeshAfzoudeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arzesh_afzoude_group = ArzeshAfzoudeGroup::find($id);
        $arzesh_afzoude_group->delete();
        return response()->json([
            'status' => 200,
            'message' => 'گروه ارزش افزوده حذف شد',
        ]);
    }
}
