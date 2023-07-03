@extends('layout.app')
@section('title', 'گزارش آماری فروش بر اساس مشتری')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش آماری فروش بر اساس مشتری', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:353px;">
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
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="index_product_code_name">کد / نام کالا</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">...</button>
                                    </div>
                                    <input type="text" id="index_product_code_name" name="index_product_code_name"
                                        class="form-control" autocomplete="off" disabled value="کلیه کالاها / خدمات" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_product_group_name">نام گروه کالا</label>
                                    <select id="index_product_group_name" name="index_product_group_name"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>نام گروه کالا را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه گروه های کالا از جدول مربوطه نمایش داده شود
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_product_group_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_taraf_hesab">طرف حساب</label>
                                    <select id="index_taraf_hesab" name="index_taraf_hesab" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>طرف حساب را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه طرف های حساب
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_taraf_hesab_error" class="invalid-feedback"></div>
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
                        </div>
                    </fieldset>
                    <fieldset id="index_tab021">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_taraf_hesab_group">گروه طرف های حساب</label>
                                    <select id="index_taraf_hesab_group" name="index_taraf_hesab_group"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>گروه طرف های حساب را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه گروه طرف های حساب
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_taraf_hesab_group_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_factor_group">گروه فاکتورها</label>
                                    <select id="index_factor_group" name="index_factor_group" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>گروه فاکتورها را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه گروه فاکتورها
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_factor_group_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="index_tab031">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_column">ستون</label>
                                    <select id="index_column" name="index_column" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>ستون را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            مشخصات کالا
                                        </option>
                                        <option value="2">
                                            فروش
                                        </option>
                                        <option value="3">
                                            برگشت از فروش
                                        </option>
                                        <option value="4">
                                            خالص فروش
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
                        </div>
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
            <table class="table-responsive table table-hover table-bordered table-striped"
                style="text-align: center; width: 100%">
                <thead>
                    <tr>
                        <th colspan="3">مشخصات طرف حساب</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">کد خریدار</th>
                        <th style="min-width: 100px">نام خریدار</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد خریدار</th>
                        <th>نام خریدار</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                    </tr>
                    <tr>
                        <th colspan="3">مشخصات طرف حساب</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <table class="table-responsive table table-hover table-bordered table-striped"
                style="text-align: center; width: 100%">
                <thead>
                    <tr style="background-color: #f8f9fa">
                        <th colspan="9">
                            لیست فروش های:
                            <label for="index_product_buys_list">Empty</label>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">مشخصات کالا</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">کد کالا</th>
                        <th style="min-width: 100px">نام کالا</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 100px">مقدار</th>
                        <th style="min-width: 100px">مبلغ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد کالا</th>
                        <th>نام کالا</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                    </tr>
                    <tr>
                        <th colspan="3">مشخصات کالا</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <table class="table-responsive table table-hover table-bordered table-striped"
                style="text-align: center; width: 100%">
                <thead>
                    <tr style="background-color: #f8f9fa">
                        <th colspan="9">
                            لیست فاکتورهای طرف حساب:
                            <label for="index_product_buys_list">Empty</label>
                        </th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">نوع فاکتور</th>
                        <th style="min-width: 100px">تاریخ فاکتور</th>
                        <th style="min-width: 100px">شماره فاکتور</th>
                        <th style="min-width: 100px">مقدار در فاکتور</th>
                        <th style="min-width: 100px">مبلغ نهایی فاکتور</th>
                        <th style="min-width: 100px">شرح فاکتور</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نوع فاکتور</th>
                        <th>تاریخ فاکتور</th>
                        <th>شماره فاکتور</th>
                        <th>مقدار در فاکتور</th>
                        <th>مبلغ نهایی فاکتور</th>
                        <th>شرح فاکتور</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/customer-report",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.customer_report, function(index, item) {
                        $("#data").append(
                            "<tr>\
                                                                                                                                                                                                                                                                                            <td>" +
                            (index + 1) +
                            "</td>\
                                                                                                                                                                                                                                                                                            <td>" +
                            item.product_code +
                            "</td>\
                                                                                                                                                                                                                                                                                            <td>" +
                            item.product_name +
                            "</td>\
                                                                                                                                                                                                                                                                                            <td>" +
                            item.amount +
                            "</td>\
                                                                                                                                                                                                                                                                                            <td>" +
                            new Intl.NumberFormat().format(item.price) +
                            " ریال" +
                            "</td>\
                                                                                                                                                                                                                                                                                                <td>" +
                            new Intl.NumberFormat().format(item.discount) +
                            " ریال" +
                            "</td>\
                                                                                                                                                                                                                                                                                                <td>" +
                            new Intl.NumberFormat().format(item.total) +
                            " ریال" +
                            "</td>\
                                                                                                                                                                                                                                                                                        <td>" +
                            new Intl.NumberFormat().format(item.total) +
                            " ریال" +
                            '</td>\
                                                                                                                                                                                                                                                                                            </tr>'
                        );
                    });
                },
            });
        }

        $(document).on('click', '.customer_report_print', function(e) {
            e.preventDefault();
            var customer_report_print_id = $(this).val();
            // console.log(customer_report_print_id);

            $.ajax({
                type: "GET",
                url: "/customer-report-print-pdf/" + customer_report_print_id,
            });
        });
    </script>
@endpush
