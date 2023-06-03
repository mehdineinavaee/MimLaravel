<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabRequest;
use App\Models\City;
use App\Models\PhoneBook;
use App\Models\TarafHesab;
use App\Models\TarafHesabGroup;
use Illuminate\Http\Request;
use PDF;

class TarafHesabController extends Controller
{
    public function tarafHesabPDF()
    {
        $taraf_hesabs = TarafHesab::orderBy('fullname', 'asc')->get();

        $data = [
            'taraf_hesabs' => $taraf_hesabs
        ];

        $pdf = PDF::loadView('taarife-payeh/taraf-hesab.myPDF', $data);
        return $pdf->stream('document.pdf');
    }

    public function addressPrintPDF($id)
    {
        $taraf_hesab = TarafHesab::find($id);

        $data = [
            'taraf_hesab' => $taraf_hesab
        ];

        $pdf = PDF::loadView('taarife-payeh/taraf-hesab.address-print', $data);
        return $pdf->stream('document.pdf');
    }
    public function fetchData()
    {
        $output = '';
        $data = TarafHesab::orderBy('id', 'desc')->paginate(10);

        if ($data) {
            foreach ($data as $index => $item) {
                switch ($item->person_type) {
                    case ('1'):
                        $person_type = 'حقیقی';
                        break;
                    case ('2'):
                        $person_type = 'حقوقی غیر دولتی';
                        break;
                    case ('3'):
                        $person_type = 'حقوقی دولتی وزارت خانه ها و سازمان ها';
                        break;
                    default:
                        $person_type = '-';
                }

                if ($item->credit_limit != null) {
                    $credit_limit = number_format($item->credit_limit);
                } else {
                    $credit_limit = '-';
                }

                if ($item->broker != null) {
                    $broker = TarafHesab::find($item->broker)->fullname;
                } else {
                    $broker = '-';
                }

                $output .=
                    '
                    <tr>
                        <td>' . $index + 1 . '</td>
                        <td>' . $item->chk_seller . '</td>
                        <td>' . $item->chk_buyer . '</td>
                        <td>' . $item->chk_broker . '</td>
                        <td>' . $item->chk_investor . '</td>
                        <td>' . $item->chk_block_list . '</td>
                        <td>' . $item->chk_active . '</td>
                        <td>' . $item->chk_move_phone . '</td>
                        <td>' . $item->code . '</td>
                        <td>' . $item->fullname . '</td>
                        <td>' . $item->zip_code . '</td>
                        <td>' . $item->phone . '</td>
                        <td>' . $item->city->city_name . '</td>
                        <td>' . $broker . '</td>
                        <td>' . $item->commission . '</td>
                        <td>' . $item->address . '</td>
                        <td>' . $person_type . '</td>
                        <td>' . $item->ceo_fullname . '</td>
                        <td>' . $item->national_code . '</td>
                        <td>' . $item->birthdate . '</td>
                        <td>' . $item->occupation . '</td>
                        <td class="leftToRight">' . $item->fax . '</td>
                        <td class="leftToRight">' . $item->tel . '</td>
                        <td>' . $item->activity_type . '</td>
                        <td>' . $item->economic_code . '</td>
                        <td>' . $item->email . '</td>
                        <td>' . $item->website . '</td>
                        <td>' . $credit_limit . ' ریال</td>
                        <td>' . $item->opt_warning . '</td>
                        <td>' . $item->opt_prohibition_sale . '</td>
                        <td>' . $item->opt_uncleared . '</td>
                        <td>' . $item->opt_customer_balance . '</td>
                        <td>' . $item->not_spent . '</td>
                        <td>
                            <button type="button" value=' . $item->id . ' class="edit_taraf_hesab btn btn-primary btn-sm">
                                <i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value="/taraf-hesab/' . $item->id . '" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value=' . $item->id . ' class="turnover btn btn-primary btn-sm">
                                <i class="fa fa-money" title="گردش حساب" data-toggle="tooltip"></i>
                            </button>
                            <button type="button" value=' . $item->id . ' class="address_print btn btn-primary btn-sm">
                                <i class="fa fa-print" title="چاپ آدرس" data-toggle="tooltip"></i>
                            </button>
                        </td>
                    </tr>
                    ';
            }
            return [$output, $data];
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        $vaseteh_foroosh = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
        $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
        if ($request->ajax()) {
            list($data, $pagination) = self::fetchData();
            return response()->json([
                'output' => $data,
                'pagination' => (string)$pagination->links(),
            ]);
        }
        return view('taarife-payeh/taraf-hesab.index', compact('categories', 'allCategories'))
            ->with('vaseteh_foroosh', $vaseteh_foroosh)
            ->with('cities', $cities);
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
    public function store(TarafHesabRequest $request)
    {
        if ($request->ajax()) {
            $taraf_hesab = new TarafHesab();
            if ($request->chk_broker == "غیرفعال") {
                $reload = "false";
            } else {
                $reload = "true";
            }
            $taraf_hesab->chk_seller = $request->chk_seller;
            $taraf_hesab->chk_buyer = $request->chk_buyer;
            $taraf_hesab->chk_broker = $request->chk_broker;
            $taraf_hesab->chk_investor = $request->chk_investor;
            $taraf_hesab->chk_block_list = $request->chk_block_list;
            $taraf_hesab->chk_active = $request->chk_active;
            $taraf_hesab->chk_move_phone = $request->chk_move_phone;
            $taraf_hesab->code = $request->input('code');
            $taraf_hesab->fullname = $request->input('fullname');
            $taraf_hesab->zip_code = $request->input('zip_code');
            $taraf_hesab->phone = $request->input('phone');
            // city_id رابطه با جدول شهرها
            $taraf_hesab->broker = $request->input('broker');
            $taraf_hesab->commission = $request->input('commission');
            $taraf_hesab->address = $request->input('address');
            $taraf_hesab->person_type = $request->input('person_type');
            $taraf_hesab->ceo_fullname = $request->input('ceo_fullname');
            $taraf_hesab->national_code = $request->input('national_code');
            $taraf_hesab->birthdate = $request->input('birthdate');
            $taraf_hesab->occupation = $request->input('occupation');
            $taraf_hesab->fax = $request->input('fax');
            $taraf_hesab->tel = $request->input('tel');
            $taraf_hesab->activity_type = $request->input('activity_type');
            $taraf_hesab->economic_code = $request->input('economic_code');
            $taraf_hesab->email = $request->input('email');
            $taraf_hesab->website = $request->input('website');
            $taraf_hesab->credit_limit = str_replace(",", "", $request->input('credit_limit'));
            $taraf_hesab->opt_warning = $request->opt_warning;
            $taraf_hesab->opt_prohibition_sale = $request->opt_prohibition_sale;
            $taraf_hesab->opt_uncleared = $request->opt_uncleared;
            $taraf_hesab->opt_customer_balance = $request->opt_customer_balance;
            $taraf_hesab->not_spent = $request->input('not_spent');
            $taraf_hesab->city()->associate($request->city);
            $taraf_hesab->save();
            if ($taraf_hesab->chk_move_phone == "فعال") {
                $phone_book = new PhoneBook();
                $phone_book->contact = $request->input('fullname');
                $phone_book->occupation = $request->input('occupation');
                $phone_book->mobile = $request->input('phone');
                $phone_book->fax = $request->input('fax');
                $phone_book->tel = $request->input('tel');
                $phone_book->activity_type = $request->input('activity_type');
                $phone_book->email = $request->input('email');
                $phone_book->website = $request->input('website');
                $phone_book->address = $request->input('address');
                $phone_book->save();
            }
            list($data, $pagination) = self::fetchData();
            return response()->json([
                'reload' => $reload,
                'status' => 200,
                'message' => 'طرف حساب جدید ذخیره شد',
                'output' => $data,
                'pagination' => (string)$pagination->links(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        if ($taraf_hesab) {
            return response()->json([
                'status' => 200,
                'taraf_hesab' => $taraf_hesab,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'طرف حساب یافت نشد',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        if ($taraf_hesab) {
            return response()->json([
                'status' => 200,
                'taraf_hesab' => $taraf_hesab,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'طرف حساب یافت نشد',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function update(TarafHesabRequest $request,  $id)
    {
        if ($request->ajax()) {
            $taraf_hesab = TarafHesab::find($id);
            if ($taraf_hesab) {
                if ($taraf_hesab->chk_broker == $request->chk_broker) {
                    $reload = "false";
                } else {
                    $reload = "true";
                }
                $taraf_hesab->chk_seller = $request->chk_seller;
                $taraf_hesab->chk_buyer = $request->chk_buyer;
                $taraf_hesab->chk_broker = $request->chk_broker;
                $taraf_hesab->chk_investor = $request->chk_investor;
                $taraf_hesab->chk_block_list = $request->chk_block_list;
                $taraf_hesab->chk_active = $request->chk_active;
                $taraf_hesab->chk_move_phone = $request->chk_move_phone;
                $taraf_hesab->code = $request->input('code');
                $taraf_hesab->fullname = $request->input('fullname');
                $taraf_hesab->zip_code = $request->input('zip_code');
                $taraf_hesab->phone = $request->input('phone');
                // city_id رابطه با جدول شهرها
                $taraf_hesab->broker = $request->input('broker');
                $taraf_hesab->commission = $request->input('commission');
                $taraf_hesab->address = $request->input('address');
                $taraf_hesab->person_type = $request->input('person_type');
                $taraf_hesab->ceo_fullname = $request->input('ceo_fullname');
                $taraf_hesab->national_code = $request->input('national_code');
                $taraf_hesab->birthdate = $request->input('birthdate');
                $taraf_hesab->occupation = $request->input('occupation');
                $taraf_hesab->fax = $request->input('fax');
                $taraf_hesab->tel = $request->input('tel');
                $taraf_hesab->activity_type = $request->input('activity_type');
                $taraf_hesab->economic_code = $request->input('economic_code');
                $taraf_hesab->email = $request->input('email');
                $taraf_hesab->website = $request->input('website');
                $taraf_hesab->credit_limit = str_replace(",", "", $request->input('credit_limit'));
                $taraf_hesab->opt_warning = $request->opt_warning;
                $taraf_hesab->opt_prohibition_sale = $request->opt_prohibition_sale;
                $taraf_hesab->opt_uncleared = $request->opt_uncleared;
                $taraf_hesab->opt_customer_balance = $request->opt_customer_balance;
                $taraf_hesab->not_spent = $request->input('not_spent');
                $taraf_hesab->city()->associate($request->city);
                $taraf_hesab->update();
                if ($taraf_hesab->chk_move_phone == "فعال") {
                    $phone_book = new PhoneBook();
                    $phone_book->contact = $request->input('fullname');
                    $phone_book->occupation = $request->input('occupation');
                    $phone_book->mobile = $request->input('phone');
                    $phone_book->fax = $request->input('fax');
                    $phone_book->tel = $request->input('tel');
                    $phone_book->activity_type = $request->input('activity_type');
                    $phone_book->email = $request->input('email');
                    $phone_book->website = $request->input('website');
                    $phone_book->address = $request->input('address');
                    $phone_book->save();
                }
                list($data, $pagination) = self::fetchData();
                return response()->json([
                    'reload' => $reload,
                    'status' => 200,
                    'message' => 'طرف حساب ویرایش شد',
                    'output' => $data,
                    'pagination' => (string)$pagination->links(),
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'اطلاعاتی یافت نشد',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        $taraf_hesab->delete();
        list($data, $pagination) = self::fetchData();
        return response()->json([
            'status' => 200,
            'message' => 'طرف حساب حذف شد',
            'output' => $data,
            'pagination' => (string)$pagination->links(),
        ]);
    }
}
