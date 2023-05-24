<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChequeBookRequest;
use App\Models\ChequeBook;
use Illuminate\Http\Request;

class ChequeBookController extends Controller
{
    public function fetchChequeBook()
    {
        $cheque_book = ChequeBook::orderBy('id', 'desc')->get();
        return response()->json([
            'cheque_book' => $cheque_book,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/cheque-book.index');
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
        $cheque_book->bank_account_details = $request->input('bank_account_details');
        $cheque_book->quantity = $request->input('quantity');
        $cheque_book->cheque_from = $request->input('cheque_from');
        $cheque_book->cheque_to = $request->input('cheque_to');
        $cheque_book->save();
        return response()->json([
            'status' => 200,
            'message' => 'دسته چک ذخیره شد',
        ]);
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
            $cheque_book->bank_account_details = $request->input('bank_account_details');
            $cheque_book->quantity = $request->input('quantity');
            $cheque_book->cheque_from = $request->input('cheque_from');
            $cheque_book->cheque_to = $request->input('cheque_to');
            $cheque_book->update();
            return response()->json([
                'status' => 200,
                'message' => 'دسته چک ویرایش شد',
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
     * @param  \App\Models\ChequeBook  $chequeBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cheque_book = ChequeBook::find($id);
        $cheque_book->delete();
        return response()->json([
            'status' => 200,
            'message' => 'دسته چک حذف شد',
        ]);
    }
}
