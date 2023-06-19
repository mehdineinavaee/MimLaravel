<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArzeshAfzoudeGroupRequest;
use App\Models\ArzeshAfzoudeGroup;
use Illuminate\Http\Request;

class ArzeshAfzoudeGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = ArzeshAfzoudeGroup::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->avarez != null) {
                    $avarez = number_format($item->avarez);
                } else {
                    $avarez = '-';
                }

                if ($item->maliyat != null) {
                    $maliyat = number_format($item->maliyat);
                } else {
                    $maliyat = '-';
                }

                if ($item->saghfe_moamelat != null) {
                    $saghfe_moamelat = number_format($item->saghfe_moamelat);
                } else {
                    $saghfe_moamelat = '-';
                }
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->group_name . '</td>
                        <td>' . $item->financial_year . '</td>
                        <td>' . $avarez . ' ریال</td>
                        <td>' . $maliyat . ' ریال</td>
                        <td>' . $saghfe_moamelat . ' ریال</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_arzesh_afzoude_groups btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/arzesh-afzoude-groups/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $arzesh_afzoude_group->avarez = str_replace(",", "", $request->input('avarez'));
        $arzesh_afzoude_group->maliyat = str_replace(",", "", $request->input('maliyat'));
        $arzesh_afzoude_group->saghfe_moamelat = str_replace(",", "", $request->input('saghfe_moamelat'));
        $arzesh_afzoude_group->save();
        return self::fetchData(200, 'گروه ارزش افزوده جدید ذخیره شد');
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
            $arzesh_afzoude_group->avarez = str_replace(",", "", $request->input('avarez'));
            $arzesh_afzoude_group->maliyat = str_replace(",", "", $request->input('maliyat'));
            $arzesh_afzoude_group->saghfe_moamelat = str_replace(",", "", $request->input('saghfe_moamelat'));
            $arzesh_afzoude_group->update();
            return self::fetchData(200, 'گروه ارزش افزوده ویرایش شد');
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
        return self::fetchData(200, 'گروه ارزش افزوده حذف شد');
    }
}
