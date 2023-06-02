<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetchData()
    {
        $notification = Notification::orderBy('id', 'desc')->get();
        return response()->json([
            'notification' => $notification,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cheque-management/notification.index');
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
    public function store(NotificationRequest $request)
    {
        $notification = new Notification();
        $notification->form_date = $request->input('form_date');
        $notification->form_number = $request->input('form_number');
        $notification->mark_back = $request->input('mark_back');
        $notification->serial_number = $request->input('serial_number');
        $notification->total = $request->input('total');
        $notification->due_date = $request->input('due_date');
        $notification->bank_account_details = $request->input('bank_account_details');
        $notification->payer = $request->input('payer');
        $notification->considerations = $request->input('considerations');
        $notification->save();
        return response()->json([
            'status' => 200,
            'message' => 'اعلام وصول چک های خوابانده شده ذخیره شد',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            return response()->json([
                'status' => 200,
                'notification' => $notification,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اعلام وصول چک های خوابانده شده یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(NotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->form_date = $request->input('form_date');
            $notification->form_number = $request->input('form_number');
            $notification->mark_back = $request->input('mark_back');
            $notification->serial_number = $request->input('serial_number');
            $notification->total = $request->input('total');
            $notification->due_date = $request->input('due_date');
            $notification->bank_account_details = $request->input('bank_account_details');
            $notification->payer = $request->input('payer');
            $notification->considerations = $request->input('considerations');
            $notification->update();
            return response()->json([
                'status' => 200,
                'message' => 'اعلام وصول چک های خوابانده شده ویرایش شد',
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
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return response()->json([
            'status' => 200,
            'message' => 'اعلام وصول چک های خوابانده شده حذف شد',
        ]);
    }
}
