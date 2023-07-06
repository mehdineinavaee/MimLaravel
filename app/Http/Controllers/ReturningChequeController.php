<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturningChequeRequest;
use App\Models\BankAccount;
use App\Models\ReturningCheque;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReturningChequeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_returning_cheque($row, $status, $message)
    {
        $data = ReturningCheque::orderBy('id', 'desc')->paginate($row);

        $returning_cheques = '';

        $count = DB::table('returning_cheques')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                $returning_cheques .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->form_date . '</td>
                        <td>' . $item->form_number . '</td>
                        <td>' . $item->mark_back . '</td>
                        <td>' . $item->serial_number . '</td>
                        <td>' . $total . ' ریال</td>
                        <td>' . $item->due_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->payer . '</td>
                        <td>' . $item->considerations . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_returning_cheque btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/returning-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
                'data' => $returning_cheques,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_returning_cheque(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $returning_cheques = ReturningCheque::where('form_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('form_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('mark_back', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('serial_number', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('total', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('due_date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payer', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('considerations', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('id', 'desc')->paginate($request->row);
            }
            if ($returning_cheques) {
                foreach ($returning_cheques as $index => $item) {
                    if ($item->total != null) {
                        $total = number_format($item->total);
                    } else {
                        $total = '-';
                    }

                    $search .=
                        '
                        <tr>
                            <td>' . $index + 1 . '</td>
                            <td>' . $item->form_date . '</td>
                            <td>' . $item->form_number . '</td>
                            <td>' . $item->mark_back . '</td>
                            <td>' . $item->serial_number . '</td>
                            <td>' . $total . ' ریال</td>
                            <td>' . $item->due_date . '</td>
                            <td>' . $item->bank_account->account_number . '</td>
                            <td>' . $item->payer . '</td>
                            <td>' . $item->considerations . '</td>
                            <td>
                                <button type="button" value=' . $item->id . ' class="edit_returning_cheque btn btn-primary btn-sm">
                                    <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                                </button>
                                <button type="button" value="/returning-cheque/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                    <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
                return response()->json([
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$returning_cheques->links(),
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
        if (Gate::allows('returning_cheque')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_returning_cheque($row, 200, '');
            }
            $bank_accounts = BankAccount::all();
            return view('cheque-management/returning-cheque.index')
                ->with('bank_accounts', $bank_accounts);
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
    public function store(ReturningChequeRequest $request)
    {
        if (Gate::allows('returning_cheque')) {
            $returning_cheque = new ReturningCheque();
            $returning_cheque->form_date = $request->input('form_date');
            $returning_cheque->form_number = $request->input('form_number');
            $returning_cheque->mark_back = $request->input('mark_back');
            $returning_cheque->serial_number = $request->input('serial_number');
            $returning_cheque->total = str_replace(",", "", $request->input('total'));
            $returning_cheque->due_date = $request->input('due_date');
            $returning_cheque->payer = $request->input('payer');
            $returning_cheque->considerations = $request->input('considerations');
            $returning_cheque->bank_account()->associate($request->bank_account_details);
            $returning_cheque->save();
            $row = $request["row"];
            return self::index_fetch_returning_cheque($row, 200, 'برگشت چک ذخیره شد');
        } else {
            return abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function show(ReturningCheque $returningCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('returning_cheque')) {
            $returning_cheque = ReturningCheque::find($id);
            if ($returning_cheque) {
                return response()->json([
                    'status' => 200,
                    'returning_cheque' => $returning_cheque,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'برگشت چک یافت نشد',
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function update(ReturningChequeRequest $request, $id)
    {
        if (Gate::allows('returning_cheque')) {
            $returning_cheque = ReturningCheque::find($id);
            if ($returning_cheque) {
                $returning_cheque->form_date = $request->input('form_date');
                $returning_cheque->form_number = $request->input('form_number');
                $returning_cheque->mark_back = $request->input('mark_back');
                $returning_cheque->serial_number = $request->input('serial_number');
                $returning_cheque->total = str_replace(",", "", $request->input('total'));
                $returning_cheque->due_date = $request->input('due_date');
                $returning_cheque->payer = $request->input('payer');
                $returning_cheque->considerations = $request->input('considerations');
                $returning_cheque->bank_account()->associate($request->bank_account_details);
                $returning_cheque->update();
                $row = $request["row"];
                return self::index_fetch_returning_cheque($row, 200, 'برگشت چک ویرایش شد');
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
     * @param  \App\Models\ReturningCheque  $returningCheque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('returning_cheque')) {
            $returning_cheque = ReturningCheque::find($id);
            $returning_cheque->delete();
            return self::index_fetch_returning_cheque(10, 200, 'برگشت چک حذف شد');
        } else {
            return abort(401);
        }
    }
}
