<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PhoneBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_fetch_phone_book($row, $status, $message)
    {
        $data = PhoneBook::orderBy('contact', 'asc')->paginate($row);

        $phone_books = '';

        $count = DB::table('phone_books')->count();

        if ($data) {
            foreach ($data as $index => $item) {
                $phone_books .=
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
                'status' => $status,
                'message' => $message,
                'count' => $count,
                'data' => $phone_books,
                'pagination' => (string)$data->links(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function index_search_phone_book(Request $request)
    {
        if ($request->ajax()) {
            $search = '';
            if ($request->row != null) {
                $phone_books = PhoneBook::where('contact', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('main_contact', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('occupation', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('mobile', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('fax', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tel', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('activity_type', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('website', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('contact', 'asc')->paginate($request->row);
            }
            if ($phone_books) {
                foreach ($phone_books as $index => $item) {
                    $search .=
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
                    'status' => 200,
                    'data' => $search,
                    'pagination' => (string)$phone_books->links(),
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
        if (Gate::allows('phone_book')) {
            if ($request->ajax()) {
                $row = $request["row"];
                return self::index_fetch_phone_book($row, 200, '');
            }
            return view('facilities/phone-book.index');
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
    public function store(PhoneBookRequest $request)
    {
        if (Gate::allows('phone_book')) {
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
            $row = $request["row"];
            return self::index_fetch_phone_book($row, 200, 'مخاطب جدید ذخیره شد');
        } else {
            return abort(401);
        }
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
        if (Gate::allows('phone_book')) {
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
        } else {
            return abort(401);
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
        if (Gate::allows('phone_book')) {
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
                $row = $request["row"];
                return self::index_fetch_phone_book($row, 200, 'مخاطب ویرایش شد');
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
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('phone_book')) {
            $phone_book = PhoneBook::find($id);
            $phone_book->delete();
            return self::index_fetch_phone_book(10, 200, 'مخاطب حذف شد');
        } else {
            return abort(401);
        }
    }
}
