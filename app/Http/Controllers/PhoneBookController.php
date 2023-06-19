<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchData($status, $message)
    {
        $output = '';
        $data = PhoneBook::orderBy('contact', 'asc')->paginate();

        if ($data) {
            foreach ($data as $index => $item) {
                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->contact . '</td>
                        <td>' . $item->main_contact . '</td>
                        <td>' . $item->occupation . '</td>
                        <td>' . $item->mobile . '</td>
                        <td class="leftToRight">' . $item->fax . '</td>
                        <td class="leftToRight">' . $item->tel . '</td>
                        <td>' . $item->activity_type . '</td>
                        <td>' . $item->email . '</td>
                        <td>' . $item->website . '</td>
                        <td>' . $item->address . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_phone_book btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/phone-book/' . $item->id . '" class="delete btn btn-danger btn-sm">
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
        return view('facilities/phone-book.index');
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
    public function store(PhoneBookRequest $request)
    {
        $phone_book = new PhoneBook();
        $phone_book->contact = $request->input('contact');
        $phone_book->main_contact = $request->input('main_contact');
        $phone_book->occupation = $request->input('occupation');
        $phone_book->mobile = $request->input('mobile');
        $phone_book->fax = $request->input('fax');
        $phone_book->tel = $request->input('tel');
        $phone_book->activity_type = $request->input('activity_type');
        $phone_book->email = $request->input('email');
        $phone_book->website = $request->input('website');
        $phone_book->address = $request->input('address');
        $phone_book->save();
        return self::fetchData(200, 'مخاطب جدید ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone_book = PhoneBook::find($id);
        if ($phone_book) {
            return response()->json([
                'status' => 200,
                'phone_book' => $phone_book,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'مخاطب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneBookRequest $request, $id)
    {
        $phone_book = PhoneBook::find($id);
        if ($phone_book) {
            $phone_book->contact = $request->input('contact');
            $phone_book->main_contact = $request->input('main_contact');
            $phone_book->occupation = $request->input('occupation');
            $phone_book->mobile = $request->input('mobile');
            $phone_book->fax = $request->input('fax');
            $phone_book->tel = $request->input('tel');
            $phone_book->activity_type = $request->input('activity_type');
            $phone_book->email = $request->input('email');
            $phone_book->website = $request->input('website');
            $phone_book->address = $request->input('address');
            $phone_book->update();
            return self::fetchData(200, 'مخاطب ویرایش شد');
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
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone_book = PhoneBook::find($id);
        $phone_book->delete();
        return self::fetchData(200, 'مخاطب حذف شد');
    }
}
