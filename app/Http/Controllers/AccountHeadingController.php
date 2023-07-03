<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\AccountHeading;
use App\Models\Kol;
use App\Models\Moein;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AccountHeadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_account_heading($row, $status, $message)
    {
        $data = AccountHeading::orderBy('id', 'desc')->paginate($row);

        $account_headings = '';

        $count = DB::table('account_headings')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $account_headings .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $account_headings,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_account_heading(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $staffs = AccountHeading::where('first_name', 'LIKE', '%' . $request->search . '%')
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
        if ($request->ajax()) {
            $row = $request["row"];
            return self::index_fetch_account_heading($row, 200, '');
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
