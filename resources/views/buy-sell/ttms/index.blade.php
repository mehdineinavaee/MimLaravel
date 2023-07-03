@extends('layout.app')
@section('title', 'گزارشات فصلی دارایی (TTMS)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارشات فصلی دارایی (TTMS)', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:268px;">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_type">نوع</label>
                                <select id="index_type" name="index_type" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>نوع را انتخاب کنید</option>
                                    {{-- @foreach ($cities as $city) --}}
                                    <option value="1">
                                        فروش
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_sell_season">فصل فروش</label>
                                <select id="index_sell_season" name="index_sell_season" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>فصل فروش را انتخاب کنید</option>
                                    {{-- @foreach ($cities as $city) --}}
                                    <option value="1">
                                        بهار
                                    </option>
                                    <option value="2">
                                        تابستان
                                    </option>
                                    <option value="3">
                                        پاییز
                                    </option>
                                    <option value="4">
                                        زمستان
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_sell_season_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_sell_year">سال فروش</label>
                                <input type="text" id="index_sell_year" name="index_sell_year" class="form-control"
                                    autocomplete="off" />
                                <div id="index_sell_year_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div style="margin-top:2rem; margin-right:2rem; !important">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-check-label" for="index_chk1">
                                        <input class="form-check-input" type="checkbox" value="" id="index_chk1">
                                        شامل خریداران و فروشندگان بدون کد اقتصادی یا کد ملی
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div style="margin-right:2rem; !important">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label class="form-check-label" for="index_chk2">
                                            <input class="form-check-input" type="checkbox" value="" id="index_chk2">
                                            تجمیع معاملات کمتر از 10 درصد مبلغ حد نصاب
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-right:2rem; !important">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label class="form-check-label" for="index_chk3">
                                            <input class="form-check-input" type="checkbox" value="" id="index_chk3">
                                            تجمیع فاکتورهای هر طرف حساب در یک سطر
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_price">مبلغ حد نصاب معاملات</label>
                                <input type="text" id="index_price" name="index_price" class="form-control"
                                    autocomplete="off" />
                                <div id="index_price_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_date">از تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_date" name="index_from_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_date_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_date">تا تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_date" name="index_to_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_date_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_sell_factor_from">از فاکتور فروش</label>
                                <input type="text" id="index_sell_factor_from" name="index_sell_factor_from"
                                    class="form-control" autocomplete="off" />
                                <div id="index_sell_factor_from_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_sell_factor_to">تا فاکتور فروش</label>
                                <input type="text" id="index_sell_factor_to" name="index_sell_factor_to"
                                    class="form-control" autocomplete="off" />
                                <div id="index_sell_factor_to_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_return_sell_factor_from">از فاکتور برگشت از فروش</label>
                                <input type="text" id="index_return_sell_factor_from"
                                    name="index_return_sell_factor_from" class="form-control" autocomplete="off" />
                                <div id="index_return_sell_factor_from_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_return_sell_factor_to">تا فاکتور برگشت از فروش</label>
                                <input type="text" id="index_return_sell_factor_to" name="index_return_sell_factor_to"
                                    class="form-control" autocomplete="off" />
                                <div id="index_return_sell_factor_to_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_ttms_path">مسیر فایل TTMS</label>
                                <input type="text" id="index_ttms_path" name="index_ttms_path" class="form-control"
                                    autocomplete="off" />
                                <div id="index_ttms_path_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <button type="button" class="btn btn-success showInTable" data-toggle="modal"
                    data-target="#createInfo">
                    <span data-toggle="tooltip" title="جستجو">
                        <i class="fa-lg fa fa-search"></i>
                        <br />
                        نمایش در جدول
                    </span>
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank" title="گزارش گیری"
                    data-toggle="tooltip">
                    <i class="fa-lg fa fa-print"></i>
                    <br />
                    پیش نمایش و چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">نام خریدار</th>
                        <th style="min-width: 100px">برگشتی</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 100px">مالیات ارزش افزوده</th>
                        <th style="min-width: 100px">عوارض شهرداری</th>
                        <th style="min-width: 100px">جمع</th>
                        <th style="min-width: 100px">نام کالا / خدمات</th>
                        <th style="min-width: 100px">کد کالا</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام خریدار</th>
                        <th>برگشتی</th>
                        <th>مبلغ</th>
                        <th>مالیات ارزش افزوده</th>
                        <th>عوارض شهرداری</th>
                        <th>جمع</th>
                        <th>نام کالا / خدمات</th>
                        <th>کد کالا</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:250px;">
            <div class="row d-flex mx-1 mx-sm-3">
                <div class="tabs active" id="index_tab01">
                    <h6 class="font-weight-bold">اطلاعات فروش</h6>
                </div>
                <div class="tabs" id="index_tab02">
                    <h6 class="text-muted">فاکتورهای فروش</h6>
                </div>
                <div class="tabs" id="index_tab03">
                    <h6 class="text-muted">نمایش جمع کل</h6>
                </div>
            </div>
            <div class="line"></div>
            <fieldset class="show" id="index_tab011">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_person_type">نوع شخص</label>
                            <select id="index_person_type" name="index_person_type" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نوع شخص را انتخاب کنید</option>
                                {{-- @foreach ($cities as $city) --}}
                                <option value="1">
                                    فاکتور فروش
                                </option>
                                <option value="2">
                                    فاکتور خرید
                                </option>
                                <option value="3">
                                    برگشت از فروش
                                </option>
                                <option value="4">
                                    برگشت از خرید
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="index_person_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_product_name">نام کالا / خدمات</label>
                            <input type="text" id="index_product_name" name="index_product_name" class="form-control"
                                autocomplete="off" />
                            <div id="index_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_buyer_type">نوع خریدار</label>
                            <input type="text" id="index_buyer_type" name="index_buyer_type" class="form-control"
                                autocomplete="off" />
                            <div id="index_buyer_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_product_code">ایران کد (کد کالا)</label>
                            <input type="text" id="index_product_code" name="index_product_code" class="form-control"
                                autocomplete="off" />
                            <div id="index_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_product_code">نام شرکت / نام خانوادگی خریدار</label>
                            <input type="text" id="index_product_code" name="index_product_code" class="form-control"
                                autocomplete="off" />
                            <div id="index_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="index_tab021">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_ceo_fullname">نام مدیر عامل</label>
                            <input type="text" id="index_ceo_fullname" name="index_ceo_fullname" class="form-control"
                                autocomplete="off" />
                            <div id="index_ceo_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_economic_code">کد اقتصادی</label>
                            <input type="text" id="index_economic_code" name="index_economic_code"
                                class="form-control" autocomplete="off" />
                            <div id="index_economic_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="index_tab031">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_ceo_fullname">نام مدیر عامل</label>
                            <input type="text" id="index_ceo_fullname" name="index_ceo_fullname" class="form-control"
                                autocomplete="off" />
                            <div id="index_ceo_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="index_economic_code">کد اقتصادی</label>
                            <input type="text" id="index_economic_code" name="index_economic_code"
                                class="form-control" autocomplete="off" />
                            <div id="index_economic_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.ttms_print', function(e) {
            e.preventDefault();
            var ttms_id = $(this).val();
            // console.log(ttms_id);

            $.ajax({
                type: "GET",
                url: "/ttms_id-pdf/" + ttms_id,
            });
        });
    </script>
@endpush
