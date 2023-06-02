<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function fetchData()
    {
        $phone_book = PhoneBook::orderBy('contact', 'asc')->get();
        return response()->json([
            'phone_book' => $phone_book,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return response()->json([
            'status' => 200,
            'message' => 'مخاطب جدید ذخیره شد',
        ]);
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
            return response()->json([
                'status' => 200,
                'message' => 'مخاطب ویرایش شد',
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
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone_book = PhoneBook::find($id);
        $phone_book->delete();
        return response()->json([
            'status' => 200,
            'message' => 'مخاطب حذف شد',
        ]);
    }
}
