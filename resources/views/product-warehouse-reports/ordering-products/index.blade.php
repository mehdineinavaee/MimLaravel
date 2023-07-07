@extends('layout.app')
@section('title', 'نقطه سفارش کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'نقطه سفارش کالاها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
                        </div>
                        <div class="tabs" id="index_tab02">
                            <h6 class="text-muted">ترتیب نمایش</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <h6 class="row pt-4">
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
                                <div class="form-group mb-3">
                                    <label for="index_product_group_name">نام گروه کالا</label>
                                    <select id="index_product_group_name" name="index_product_group_name"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>گروه کالا را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه گروه های کالا
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_product_group_name_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </h6>
                    </fieldset>
                    <fieldset id="index_tab021">
                        <h6 class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_column">ستون</label>
                                    <select id="index_column" name="index_column" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" selected>ستون را انتخاب کنید</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            مقدار درخواستی
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
                        <th colspan="3">مشخصات کالا</th>
                        <th colspan="6">مقدار</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">کد کالا</th>
                        <th style="min-width: 100px">نام کالا</th>
                        <th style="min-width: 100px">اول دوره</th>
                        <th style="min-width: 100px">وارده</th>
                        <th style="min-width: 100px">صادره</th>
                        <th style="min-width: 100px">موجودی</th>
                        <th style="min-width: 100px">نقطه سفارش</th>
                        <th style="min-width: 100px">درخواستی</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد کالا</th>
                        <th>نام کالا</th>
                        <th>اول دوره</th>
                        <th>وارده</th>
                        <th>صادره</th>
                        <th>موجودی</th>
                        <th>نقطه سفارش</th>
                        <th>درخواستی</th>
                    </tr>
                    <tr>
                        <th colspan="3">مشخصات کالا</th>
                        <th colspan="6">مقدار</th>
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
                url: "/ordering-products",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.ordering_product, function(index, item) {
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

        $(document).on('click', '.ordering_product_print', function(e) {
            e.preventDefault();
            var ordering_product_print_id = $(this).val();
            // console.log(ordering_product_print_id);

            $.ajax({
                type: "GET",
                url: "/ordering-product-print-pdf/" + ordering_product_print_id,
            });
        });
    </script>
@endpush
