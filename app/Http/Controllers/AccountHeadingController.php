<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\AccountHeading;
use App\Models\Kol;
use App\Models\Moein;
use Illuminate\Http\Request;

class AccountHeadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = AccountHeading::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_account_heading btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/account_heading/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $account_groups = AccountGroup::all();
        $kols = Kol::all();
        $moeins = Moein::all();
        return view('taarife-payeh/account-headings.index')
            ->with('account_groups', $account_groups)
            ->with('kols', $kols)
            ->with('moeins', $moeins);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function show(AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountHeading $accountHeading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountHeading  $accountHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountHeading $accountHeading)
    {
        //
    }
}
