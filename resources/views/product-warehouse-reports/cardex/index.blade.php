@extends('layout.app')
@section('title', 'گردش کالا در انبار (کاردکس)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گردش کالا در انبار (کاردکس)', 'url' => url()->current()]],
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
                                    <label for="index_warehouse_name">نام انبار</label>
                                    <select id="index_warehouse_name" name="index_warehouse_name"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>انبار را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            انبار 1
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_warehouse_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="index_product_code_name">کد / نام کالا</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">...</button>
                                    </div>
                                    <input type="text" id="index_product_code_name" name="index_product_code_name"
                                        class="form-control" autocomplete="off" disabled
                                        value="نام کالا رو انتخاب نمایید" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_document_type">نوع سند</label>
                                    <select id="index_document_type" name="index_document_type" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>نوع سند را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه اسناد
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_document_type_error" class="invalid-feedback"></div>
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
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-right: 1rem; margin-top:1rem">
                                <label class="form-check-label" for="index_pageCheckBox">
                                    <input class="form-check-input" type="checkbox" value="" id="index_pageCheckBox">
                                    مانده از صفحه قبل در صفحه اول صفر باشد
                                </label>
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
                        <th colspan="5">اطلاعات سند</th>
                        <th colspan="5">ورود و خروج کالا</th>
                        <th style="min-width: 90px">سایر اطلاعات</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                        <th><input type="text" id="index_to_date" name="index_to_date" placeholder="جستجو"
                                class="form-control" autocomplete="off" /></th>
                    </tr>
                    <tr>
                        <th><input class="form-check-input" type="checkbox" value="" id="index_CheckBox"></th>
                        <th>ردیف</th>
                        <th style="min-width: 90px">تاریخ</th>
                        <th style="min-width: 90px">نوع سند</th>
                        <th style="min-width: 90px">شماره</th>
                        <th style="min-width: 90px">وارده</th>
                        <th style="min-width: 90px">صادره</th>
                        <th style="min-width: 90px">موجودی</th>
                        <th style="min-width: 90px">بهای واحد</th>
                        <th style="min-width: 90px">مبلغ کل</th>
                        <th style="min-width: 90px">رویداد مالی</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th><input class="form-check-input" type="checkbox" value="" id="index_CheckBox"></th>
                        <th>ردیف</th>
                        <th>تاریخ</th>
                        <th>نوع سند</th>
                        <th>شماره</th>
                        <th>وارده</th>
                        <th>صادره</th>
                        <th>موجودی</th>
                        <th>بهای واحد</th>
                        <th>مبلغ کل</th>
                        <th>رویداد مالی</th>
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
                url: "/cardex",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.cardex, function(index, item) {
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

        $(document).on('click', '.cardex_print', function(e) {
            e.preventDefault();
            var cardex_print_id = $(this).val();
            // console.log(cardex_print_id);

            $.ajax({
                type: "GET",
                url: "/cardex-print-pdf/" + cardex_print_id,
            });
        });
    </script>
@endpush
