<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChequeBookRequest;
use App\Models\BankAccount;
use App\Models\ChequeBook;
use Illuminate\Http\Request;

class ChequeBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = ChequeBook::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->receive_date . '</td>
                        <td>' . $item->bank_account->account_number . '</td>
                        <td>' . $item->quantity . '</td>
                        <td>' . $item->cheque_from . '</td>
                        <td>' . $item->cheque_to . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_cheque_book btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/cheque-book/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        $bank_accounts = BankAccount::all();
        return view('cheque-management/cheque-book.index')
            ->with('bank_accounts', $bank_accounts);
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
    public function store(ChequeBookRequest $request)
    {
        $cheque_book = new ChequeBook();
        $cheque_book->code = $request->input('code');
        $cheque_book->receive_date = $request->input('receive_date');
        $cheque_book->quantity = $request->input('quantity');
        $cheque_book->cheque_from = $request->input('cheque_from');
        $cheque_book->cheque_to = $request->input('cheque_to');
        $cheque_book->bank_account()->associate($request->bank_account_details);
        $cheque_book->save();
        return self::fetchData(200, 'دسته چک ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function show(ChequeBook $chequeBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cheque_book = ChequeBook::find($id);
        if ($cheque_book) {
            return response()->json([
                'status' => 200,
                'cheque_book' => $cheque_book,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'دسته چک یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function update(ChequeBookRequest $request, $id)
    {
        $cheque_book = ChequeBook::find($id);
        if ($cheque_book) {
            $cheque_book->code = $request->input('code');
            $cheque_book->receive_date = $request->input('receive_date');
            $cheque_book->quantity = $request->input('quantity');
            $cheque_book->cheque_from = $request->input('cheque_from');
            $cheque_book->cheque_to = $request->input('cheque_to');
            $cheque_book->bank_account()->associate($request->bank_account_details);
            $cheque_book->update();
            return self::fetchData(200, 'دسته چک ویرایش شد');
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
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cheque_book = ChequeBook::find($id);
        $cheque_book->delete();
        return self::fetchData(200, 'دسته چک حذف شد');
    }
}
