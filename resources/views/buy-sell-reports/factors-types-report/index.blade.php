@extends('layout.app')
@section('title', 'گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:346px;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
                        </div>
                        <div class="tabs" id="index_tab02">
                            <h6 class="text-muted">سایر شروط</h6>
                        </div>
                        <div class="tabs" id="index_tab03">
                            <h6 class="text-muted">ترتیب نمایش</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <h6 class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_product_name">طرف حساب</label>
                                    <select id="index_product_name" name="index_product_name" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>کلیه طرف های حساب</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            نام طرف حساب
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_product_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_calculate_profit">نوع فاکتور</label>
                                    <select id="index_calculate_profit" name="index_calculate_profit"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>نوع فاکتور را انتخاب کنید</option>
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
                                    <div id="index_calculate_profit_error" class="invalid-feedback"></div>
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
                                    <div class="form-group mb-3">
                                        <label for="add_fullname">از شماره</label>
                                        <input type="text" id="add_fullname" name="add_fullname" class="form-control"
                                            autocomplete="off" />
                                        <div id="add_fullname_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <div class="form-group mb-3">
                                        <label for="add_fullname">تا شماره</label>
                                        <input type="text" id="add_fullname" name="add_fullname" class="form-control"
                                            autocomplete="off" />
                                        <div id="add_fullname_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </h6>
                    </fieldset>
                    <fieldset id="index_tab021">
                        <h6 class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_product_name">گروه طرف های حساب</label>
                                    <select id="index_product_name" name="index_product_name"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>کلیه گروه طرف های حساب</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            نام گروه طرف حساب
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_product_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_calculate_profit">گروه فاکتورها</label>
                                    <select id="index_calculate_profit" name="index_calculate_profit"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>کلیه گروه فاکتورها</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            گروه فاکتور یک
                                        </option>
                                        <option value="2">
                                            گروه فاکتور دو
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_calculate_profit_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </h6>
                    </fieldset>
                    <fieldset id="index_tab031">
                        <h6 class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_column">ستون</label>
                                    <select id="index_column" name="index_column" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>ستون را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            تاریخ فاکتور
                                        </option>
                                        <option value="2">
                                            شماره فاکتور
                                        </option>
                                        <option value="3">
                                            نوع فاکتور
                                        </option>
                                        <option value="4">
                                            کد مشتری
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_column_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_sort_type">ترتیب</label>
                                    <select id="index_sort_type" name="index_sort_type" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>ترتیب را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            صعودی
                                        </option>
                                        <option value="2">
                                            نزولی
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_sort_type_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </h6>
                    </fieldset>
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
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="form-group mb-3">
                        <input type="search" id="index_invoice_search" name="index_invoice_search" class="form-control"
                            autocomplete="off" placeholder="جستجو" />
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12">
                    <select id="index_invoice_row"
                        onChange="fetchDataAsPaginate('index_invoice_search','/sell-factor',1,this.value,'index_count','myData','index_pagination')"
                        class="select form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="index_checked_all" name="index_checked_all"
                                class="form-control" />
                        </th>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">تاریخ فاکتور</th>
                        <th style="min-width: 200px">شماره فاکتور</th>
                        <th style="min-width: 200px">کد طرف حساب</th>
                        <th style="min-width: 300px" colspan="2">نام طرف حساب</th>
                        <th style="min-width: 200px">مبلغ نهایی فاکتور</th>
                        <th style="min-width: 200px">واسطه</th>
                        <th style="min-width: 200px">گروه فاکتور</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>235</th>
                        <th>تاریخ فاکتور</th>
                        <th>شماره فاکتور</th>
                        <th>کد طرف حساب</th>
                        <th colspan="2">نام طرف حساب</th>
                        <th>23,000</th>
                        <th>واسطه</th>
                        <th>گروه فاکتور</th>
                    </tr>
                    <tr>
                        <th colspan="4">تعداد ردیف های انتخاب شده</th>
                        <th></th>
                        <th>مبلغ</th>
                        <th></th>
                        <th>راس فاکتور</th>
                        <th>----/--/--</th>
                        <th>
                            <button type="button" id="index_rase_factor" name="index_rase_factor" class="btn btn-info">
                                محاسبه راس فاکتور
                            </button>
                        </th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="index_pagination"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                    مجموع رکوردها:
                    <span id="index_count">0</span>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
