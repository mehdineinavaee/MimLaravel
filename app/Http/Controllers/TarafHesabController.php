<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabRequest;
use App\Models\City;
use App\Models\PhoneBook;
use App\Models\TarafHesab;
use App\Models\TarafHesabGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function fetchTarafHesab()
    {
        $taraf_hesabs = TarafHesab::orderBy('id', 'desc')->get();
        return response()->json([
            'taraf_hesabs' => $taraf_hesabs,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $vaseteh_foroosh = TarafHesab::where('chk_broker', '=', "فعال")->orderBy('fullname', 'asc')->get();
        $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
        $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
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
        $tarafHesab = new TarafHesab();
        if ($request->chk_broker == "غیرفعال") {
            $reload = "false";
        } else {
            $reload = "true";
        }
        $tarafHesab->chk_seller = $request->chk_seller;
        $tarafHesab->chk_buyer = $request->chk_buyer;
        $tarafHesab->chk_broker = $request->chk_broker;
        $tarafHesab->chk_investor = $request->chk_investor;
        $tarafHesab->chk_block_list = $request->chk_block_list;
        $tarafHesab->chk_active = $request->chk_active;
        $tarafHesab->chk_move_phone = $request->chk_move_phone;
        $tarafHesab->code = $request->input('code');
        $tarafHesab->fullname = $request->input('fullname');
        $tarafHesab->zip_code = $request->input('zip_code');
        $tarafHesab->phone = $request->input('phone');
        // city_id رابطه با جدول شهرها
        $tarafHesab->broker = $request->input('broker');
        $tarafHesab->commission = $request->input('commission');
        $tarafHesab->address = $request->input('address');
        $tarafHesab->person_type = $request->input('person_type');
        $tarafHesab->ceo_fullname = $request->input('ceo_fullname');
        $tarafHesab->national_code = $request->input('national_code');
        $tarafHesab->birthdate = $request->input('birthdate');
        $tarafHesab->occupation = $request->input('occupation');
        $tarafHesab->fax = $request->input('fax');
        $tarafHesab->tel = $request->input('tel');
        $tarafHesab->activity_type = $request->input('activity_type');
        $tarafHesab->economic_code = $request->input('economic_code');
        $tarafHesab->email = $request->input('email');
        $tarafHesab->website = $request->input('website');
        $tarafHesab->credit_limit = str_replace(",", "", $request->input('credit_limit'));
        $tarafHesab->opt_warning = $request->opt_warning;
        $tarafHesab->opt_prohibition_sale = $request->opt_prohibition_sale;
        $tarafHesab->opt_uncleared = $request->opt_uncleared;
        $tarafHesab->opt_customer_balance = $request->opt_customer_balance;
        $tarafHesab->not_spent = $request->input('not_spent');
        $tarafHesab->city()->associate($request->city);
        $tarafHesab->save();
        if ($tarafHesab->chk_move_phone == "فعال") {
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
        return response()->json([
            'reload' => $reload,
            'status' => 200,
            'message' => 'طرف حساب جدید ذخیره شد',
        ]);
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
        $tarafHesab = TarafHesab::find($id);
        if ($tarafHesab) {
            if ($tarafHesab->chk_broker == $request->chk_broker) {
                $reload = "false";
            } else {
                $reload = "true";
            }
            $tarafHesab->chk_seller = $request->chk_seller;
            $tarafHesab->chk_buyer = $request->chk_buyer;
            $tarafHesab->chk_broker = $request->chk_broker;
            $tarafHesab->chk_investor = $request->chk_investor;
            $tarafHesab->chk_block_list = $request->chk_block_list;
            $tarafHesab->chk_active = $request->chk_active;
            $tarafHesab->chk_move_phone = $request->chk_move_phone;
            $tarafHesab->code = $request->input('code');
            $tarafHesab->fullname = $request->input('fullname');
            $tarafHesab->zip_code = $request->input('zip_code');
            $tarafHesab->phone = $request->input('phone');
            // city_id رابطه با جدول شهرها
            $tarafHesab->broker = $request->input('broker');
            $tarafHesab->commission = $request->input('commission');
            $tarafHesab->address = $request->input('address');
            $tarafHesab->person_type = $request->input('person_type');
            $tarafHesab->ceo_fullname = $request->input('ceo_fullname');
            $tarafHesab->national_code = $request->input('national_code');
            $tarafHesab->birthdate = $request->input('birthdate');
            $tarafHesab->occupation = $request->input('occupation');
            $tarafHesab->fax = $request->input('fax');
            $tarafHesab->tel = $request->input('tel');
            $tarafHesab->activity_type = $request->input('activity_type');
            $tarafHesab->economic_code = $request->input('economic_code');
            $tarafHesab->email = $request->input('email');
            $tarafHesab->website = $request->input('website');
            $tarafHesab->credit_limit = str_replace(",", "", $request->input('credit_limit'));
            $tarafHesab->opt_warning = $request->opt_warning;
            $tarafHesab->opt_prohibition_sale = $request->opt_prohibition_sale;
            $tarafHesab->opt_uncleared = $request->opt_uncleared;
            $tarafHesab->opt_customer_balance = $request->opt_customer_balance;
            $tarafHesab->not_spent = $request->input('not_spent');
            $tarafHesab->city()->associate($request->city);
            $tarafHesab->update();
            if ($tarafHesab->chk_move_phone == "فعال") {
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
            return response()->json([
                'reload' => $reload,
                'status' => 200,
                'message' => 'طرف حساب ویرایش شد',
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
     * @param  \App\Models\TarafHesab  $tarafHesab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taraf_hesab = TarafHesab::find($id);
        $taraf_hesab->delete();
        return response()->json([
            'status' => 200,
            'message' => 'طرف حساب حذف شد',
        ]);
    }
}
