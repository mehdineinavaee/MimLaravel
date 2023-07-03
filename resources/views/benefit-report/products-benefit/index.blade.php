@extends('layout.app')
@section('title', 'سود به تفکیک کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سود به تفکیک کالاها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:268px;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
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
                                    <label for="index_product_name">نام کالا</label>
                                    <select id="index_product_name" name="index_product_name" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>نام کالا را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه کالاها
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_product_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
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
                </div>
                <br />
                <button type="button" class="btn btn-success showInTable" data-toggle="modal" data-target="#createInfo">
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
                        <th style="min-width: 100px">کد کالا</th>
                        <th style="min-width: 100px">نام کالا</th>
                        <th style="min-width: 100px">جمع فروش کالا</th>
                        <th style="min-width: 100px">سود ناخالص فروش</th>
                        <th style="min-width: 100px">درصد سهم سود</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد کالا</th>
                        <th>نام کالا</th>
                        <th>جمع فروش کالا</th>
                        <th>سود ناخالص فروش</th>
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
