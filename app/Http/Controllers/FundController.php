<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundRequest;
use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = Fund::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                switch ($item->form_type) {
                    case ('1'):
                        $form_type = 'درآمد';
                        break;
                    case ('2'):
                        $form_type = 'هزینه';
                        break;
                    case ('3'):
                        $form_type = 'صندوق';
                        break;
                    default:
                        $form_type = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $form_type . '</td>
                        <td>' . $item->daramad_code . '</td>
                        <td>' . $item->daramad_name . '</td>
                        <td>' . $item->chk_system . '</td>
                        <td>' . $item->chk_active . '</td>

                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_fund btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/fund/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('taarife-payeh/fund.index');
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
    public function store(FundRequest $request)
    {
        $fund = new Fund();
        $fund->chk_system = $request->chk_system;
        $fund->chk_active = $request->chk_active;
        $fund->form_type = $request->input('form_type');
        $fund->daramad_code = $request->input('daramad_code');
        $fund->daramad_name = $request->input('daramad_name');
        $fund->save();
        return self::fetchData(200, 'درآمد، هزینه، صندوق جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fund = Fund::find($id);
        if ($fund) {
            return response()->json([
                'status' => 200,
                'fund' => $fund,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'درآمد، هزینه، صندوق یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fund = Fund::find($id);
        if ($fund) {
            $fund->chk_system = $request->chk_system;
            $fund->chk_active = $request->chk_active;
            $fund->form_type = $request->input('form_type');
            $fund->daramad_code = $request->input('daramad_code');
            $fund->daramad_name = $request->input('daramad_name');
            $fund->update();
            return self::fetchData(200, 'درآمد، هزینه، صندوق ویرایش شد');
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
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund = Fund::find($id);
        $fund->delete();
        return self::fetchData(200, 'درآمد، هزینه، صندوق حذف شد');
    }
}
