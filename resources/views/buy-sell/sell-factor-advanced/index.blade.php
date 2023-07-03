@extends('layout.app')
@section('title', 'پیش فاکتور فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پیش فاکتور فروش', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInvoice">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن پیش فاکتور فروش">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        جدید
                    </span>
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="form-group mb-3">
                            <input type="search" id="index_invoice_search" name="index_invoice_search" class="form-control"
                                autocomplete="off" placeholder="جستجو" />
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <select id="index_invoice_row"
                            onChange="fetchDataAsPaginate('index_invoice_search','/sell-factor-advanced',1,this.value,'index_count','myData','index_pagination')"
                            class="select form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center;" id="index_factors_table">
                        <thead>
                            <tr>
                                <th style="min-width: 80px">شماره</th>
                                <th style="min-width: 100px">تاریخ</th>
                                <th style="min-width: 200px">درخواست کننده</th>
                                <th style="min-width: 150px">جمع نهایی</th>
                                <th style="min-width: 100px">اقدامات</th>
                            </tr>
                        </thead>
                        <tbody id="myData">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>شماره</th>
                                <th>تاریخ</th>
                                <th>درخواست کننده</th>
                                <th>جمع نهایی</th>
                                <th>اقدامات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="select_factor_no">شماره فاکتور</label>
                            <input type="text" id="select_factor_no" name="select_factor_no" class="form-control"
                                autocomplete="off" disabled />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="select_factor_date">تاریخ</label>
                            <input type="text" id="select_factor_date" name="select_factor_date" class="form-control"
                                autocomplete="off" disabled />
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="select_taraf_hesab">طرف حساب</label>
                            <input type="text" id="select_taraf_hesab" name="select_taraf_hesab" class="form-control"
                                autocomplete="off" disabled />
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center;">
                        <thead>
                            <tr>
                                <th style="min-width: 100px">کد کالا</th>
                                <th style="min-width: 300px">محصول</th>
                                <th style="min-width: 200px">بهای واحد</th>
                                <th style="min-width: 200px">مبلغ کل</th>
                                <th style="min-width: 100px">مقدار</th>
                                <th style="min-width: 100px">تخفیف</th>
                                <th style="min-width: 300px">ملاحظات</th>
                                <th style="min-width: 300px">حذف محصول از فاکتور</th>
                            </tr>
                        </thead>
                        <tbody id="selectData">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7" style="text-align: right">جمع کل فاکتور</th>
                                <th>
                                    <input type="text" id="select_total_without_discount"
                                        name="select_total_without_discount" class="form-control" style="text-align: center"
                                        autocomplete="off" disabled />
                                </th>
                            </tr>
                            <tr>
                                <th colspan="7" style="text-align: right">جمع تخفیفات</th>
                                <th>
                                    <input type="text" id="select_total_discount" name="select_total_discount"
                                        class="form-control" style="text-align: center" autocomplete="off" disabled />
                                </th>
                            </tr>
                            <tr>
                                <th colspan="7" style="text-align: right">مالیات و عوارض</th>
                                <th>
                                    <input type="text" id="select_maliyat" name="select_maliyat" class="form-control"
                                        style="text-align: center" autocomplete="off" disabled />
                                </th>
                            </tr>
                            <tr>
                                <th colspan="7" style="text-align: right">جمع نهایی</th>
                                <th>
                                    <input type="text" id="select_total_with_discount"
                                        name="select_total_with_discount" class="form-control" style="text-align: center"
                                        autocomplete="off" disabled />
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="index_products_count">0</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.sell-factor-advanced.create')
    @include('buy-sell.sell-factor-advanced.edit')
    @include('common.delete')
    @include('common.delete_details')
@endsection

@push('js')
    <script>
        // pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            var row = document.getElementById("index_invoice_row");
            fetchDataAsPaginate
                (
                    'index_invoice_search',
                    '/sell-factor-advanced',
                    page,
                    row.value,
                    'index_count',
                    'myData',
                    'index_pagination'
                );
        });

        fetchDataAsPaginate
            (
                'index_invoice_search',
                '/sell-factor-advanced',
                1,
                10,
                'index_count',
                'myData',
                'index_pagination'
            );
        // end pagination

        // search data
        $(document).ready(function() {
            $('#index_invoice_search').on('keyup', function() {
                var value = $(this).val();
                var row = document.getElementById("index_invoice_row").value;
                serach_data
                    (
                        value,
                        row,
                        "/index-search-sell-factor-advanced",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data

        $(document).ready(function() {
            $("#index_factors_table").on('click', '.indexRow', function() {
                var currentRow = $(this).closest("tr");
                // console.log(currentRow.find("td:eq(0)").html()); شناسه فاکتور برای نمایش جزئیات
                var sell_factor_advanced_id = currentRow.find("td:eq(0)").html();

                $.ajax({
                    type: "GET",
                    url: "/sell-factor-advanced-detail/" + sell_factor_advanced_id + "/edit",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطا',
                                text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                            })
                        } else {
                            // console.log(response);
                            $('#selectData').html(response.sell_factor_advanced_by_id);

                            $('#select_factor_no').val(currentRow.find("td:eq(1)").html());
                            $('#select_factor_date').val(currentRow.find("td:eq(2)").html());
                            $('#select_taraf_hesab').val(currentRow.find("td:eq(3)")
                                .html());
                            $("#select_total_without_discount").val(new Intl.NumberFormat()
                                .format(response.total_without_discount) + " ریال");
                            $("#select_total_discount").val(new Intl.NumberFormat()
                                .format(response.total_with_discount) + " ریال");
                            $("#select_maliyat").val(0 + " ریال");
                            $("#select_total_with_discount").val(currentRow.find("td:eq(4)")
                                .html());
                            $("#index_products_count").html(response.count);
                        }
                    },
                });
            });
        });
    </script>
@endpush
