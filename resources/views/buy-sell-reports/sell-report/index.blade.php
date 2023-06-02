@extends('layout.app')
@section('title', 'گزارش فروش به تفکیک ماه، فصل، سال')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش فروش به تفکیک ماه، فصل، سال', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:268px;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
                        </div>
                        <div class="tabs" id="index_tab02">
                            <h6 class="text-muted">سایر شروط</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
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
                                <label for="index_product_code_name">کد یا نام کالا / خدمات</label>
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
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_fiscal_year">سال مالی</label>
                                    <input type="text" id="index_fiscal_year" name="index_fiscal_year"
                                        class="form-control" autocomplete="off" />
                                    <div id="index_fiscal_year_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="index_tab021">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_ceo_fullname">نام مدیر عامل</label>
                                    <input type="text" id="index_ceo_fullname" name="index_ceo_fullname"
                                        class="form-control" autocomplete="off" />
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
                <br />
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-search" title="جستجو" data-toggle="tooltip"></i>
                    <br />
                    نمایش در جدول
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-print" title="گزارش گیری" data-toggle="tooltip"></i>
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
                        <th>زمان</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ماه / فصل</th>
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
                        <th>ماه / فصل</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                        <th>مقدار</th>
                        <th>مبلغ</th>
                    </tr>
                    <tr>
                        <th>زمان</th>
                        <th colspan="2">فروش</th>
                        <th colspan="2">برگشت از فروش</th>
                        <th colspan="2">خالص فروش</th>
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
                url: "/sell-report",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.sell_report, function(index, item) {
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

        $(document).on('click', '.sell_report_print', function(e) {
            e.preventDefault();
            var sell_report_print_id = $(this).val();
            // console.log(sell_report_print_id);

            $.ajax({
                type: "GET",
                url: "/sell-report-print-pdf/" + sell_report_print_id,
            });
        });
    </script>
@endpush
