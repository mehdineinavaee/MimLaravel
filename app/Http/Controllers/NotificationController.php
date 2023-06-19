<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\BankAccount;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = Notification::orderBy('id', 'desc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                if ($item->total != null) {
                    $total = number_format($item->total);
                } else {
                    $total = '-';
                }

                $output .=
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
                            <button type="button" value=' . $item->id . ' class="edit_notification btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/notification/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('cheque-management/notification.index')
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
    public function store(NotificationRequest $request)
    {
        $notification = new Notification();
        $notification->form_date = $request->input('form_date');
        $notification->form_number = $request->input('form_number');
        $notification->mark_back = $request->input('mark_back');
        $notification->serial_number = $request->input('serial_number');
        $notification->total = str_replace(",", "", $request->input('total'));
        $notification->due_date = $request->input('due_date');
        $notification->payer = $request->input('payer');
        $notification->considerations = $request->input('considerations');
        $notification->bank_account()->associate($request->bank_account_details);
        $notification->save();
        return self::fetchData(200, 'اعلام وصول چک های خوابانده شده ذخیره شد');
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
            $notification->total = str_replace(",", "", $request->input('total'));
            $notification->due_date = $request->input('due_date');
            $notification->payer = $request->input('payer');
            $notification->considerations = $request->input('considerations');
            $notification->bank_account()->associate($request->bank_account_details);
            $notification->update();
            return self::fetchData(200, 'اعلام وصول چک های خوابانده شده ویرایش شد');
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
        return self::fetchData(200, 'اعلام وصول چک های خوابانده شده حذف شد');
    }
}
