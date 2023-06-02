@extends('layout.app')
@section('title', 'سود به تفکیک فاکتورها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سود به تفکیک فاکتورها', 'url' => url()->current()]],
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
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_from_date">از تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="index_from_date" name="index_from_date"
                                            class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_from_date_error" class="invalid-feedback"></div>
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
                                            class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_to_date_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
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
                                <div class="form-group mb-3">
                                    <label for="index_factor_no">شماره فاکتور</label>
                                    <select id="index_factor_no" name="index_factor_no" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>شماره فاکتور را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه فاکتورها
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_factor_no_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_calculate_profit">نحوه محاسبه سود</label>
                                    <select id="index_calculate_profit" name="index_calculate_profit"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>نحوه محاسبه سود را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            روش میانگین متحرک
                                        </option>
                                        <option value="2">
                                            روش آخرین قیمت خرید
                                        </option>
                                        <option value="3">
                                            روش FIFO
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_calculate_profit_error" class="invalid-feedback"></div>
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
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 90px">شماره فاکتور</th>
                        <th style="min-width: 90px">تاریخ فاکتور</th>
                        <th style="min-width: 90px">نام طرف حساب</th>
                        <th style="min-width: 90px">مبلغ فاکتور</th>
                        <th style="min-width: 90px">سود کالا</th>
                        <th style="min-width: 90px">سود خدمات</th>
                        <th style="min-width: 90px">کل سود</th>
                        <th style="min-width: 90px">درصد سهم سود</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>شماره فاکتور</th>
                        <th>تاریخ فاکتور</th>
                        <th>نام طرف حساب</th>
                        <th>مبلغ فاکتور</th>
                        <th>سود کالا</th>
                        <th>سود خدمات</th>
                        <th>کل سود</th>
                        <th>درصد سهم سود</th>
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
                url: "/factors-benefit",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.factors_benefit, function(index, item) {
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
                            '</td>\
                                                                                    </tr>'
                        );
                    });
                },
            });
        }

        $(document).on('click', '.factors_benefit_print', function(e) {
            e.preventDefault();
            var factors_benefit_print_id = $(this).val();
            // console.log(factors_benefit_print_id);

            $.ajax({
                type: "GET",
                url: "/factors-benefit-print-pdf/" + factors_benefit_print_id,
            });
        });
    </script>
@endpush
