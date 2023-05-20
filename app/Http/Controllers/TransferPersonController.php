<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferPersonRequest;
use App\Models\TransferPerson;
use Illuminate\Http\Request;

class TransferPersonController extends Controller
{
    public function fetchTransferPerson()
    {
        $transfer_person = TransferPerson::orderBy('id', 'desc')->get();
        return response()->json([
            'transfer_person' => $transfer_person,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financial-management/transfer-person.index');
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
    public function store(TransferPersonRequest $request)
    {
        $transfer_person = new TransferPerson();
        $transfer_person->from_taraf_hesab = $request->input('from_taraf_hesab');
        $transfer_person->to_taraf_hesab = $request->input('to_taraf_hesab');
        $transfer_person->form_date = $request->input('form_date');
        $transfer_person->form_number = $request->input('form_number');
        $transfer_person->cash_amount = $request->input('cash_amount');
        $transfer_person->considerations = $request->input('considerations');
        $transfer_person->save();
        return response()->json([
            'status' => 200,
            'message' => 'انتقال بین اشخاص جدید ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function show(TransferPerson $transferPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer_person = TransferPerson::find($id);
        if ($transfer_person) {
            return response()->json([
                'status' => 200,
                'transfer_person' => $transfer_person,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'انتقال بین اشخاص یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function update(TransferPersonRequest $request, $id)
    {
        $transfer_person = TransferPerson::find($id);
        if ($transfer_person) {
            $transfer_person->from_taraf_hesab = $request->input('from_taraf_hesab');
            $transfer_person->to_taraf_hesab = $request->input('to_taraf_hesab');
            $transfer_person->form_date = $request->input('form_date');
            $transfer_person->form_number = $request->input('form_number');
            $transfer_person->cash_amount = $request->input('cash_amount');
            $transfer_person->considerations = $request->input('considerations');
            $transfer_person->update();
            return response()->json([
                'status' => 200,
                'message' => 'انتقال بین اشخاص ویرایش شد',
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
     * @param  \App\Models\TransferPerson  $transferPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer_person = TransferPerson::find($id);
        $transfer_person->delete();
        return response()->json([
            'status' => 200,
            'message' => 'انتقال بین اشخاص حذف شد',
        ]);
    }
}
