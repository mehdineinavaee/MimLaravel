@extends('layout.app')
@section('title', 'معرفی کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی کالاها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن کالا" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 250px">فعال</th>
                        <th style="min-width: 90px">کد کالا</th>
                        <th style="min-width: 90px">گروه اصلی</th>
                        <th style="min-width: 90px">گروه فرعی</th>
                        <th style="min-width: 80px">نام کالا</th>
                        <th style="min-width: 90px">واحد کالا</th>
                        <th style="min-width: 250px">فی فروش</th>
                        <th style="min-width: 250px">گروه ارزش افزوده</th>
                        <th style="min-width: 250px">تاریخ معرفی</th>
                        <th style="min-width: 250px">آخرین قیمت خرید</th>
                        <th style="min-width: 250px">بارکد اصلی</th>
                        <th style="min-width: 250px">نقطه سفارش</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فعال</th>
                        <th>کد کالا</th>
                        <th>گروه اصلی</th>
                        <th>گروه فرعی</th>
                        <th>نام کالا</th>
                        <th>واحد کالا</th>
                        <th>فی فروش</th>
                        <th>گروه ارزش افزوده</th>
                        <th>تاریخ معرفی</th>
                        <th>آخرین قیمت خرید</th>
                        <th>بارکد اصلی</th>
                        <th>نقطه سفارش</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.products.create')
    @include('taarife-payeh.products.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/product",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.products, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                    <td>" +
                            (index + 1) +
                            "</td>\
                    <td>" +
                            item.chk_active +
                            "</td>\
                    <td>" +
                            item.code +
                            "</td>\
                    <td>" +
                            item.main_group +
                            "</td>\
                    <td>" +
                            item.sub_group +
                            "</td>\
                    <td>" +
                            item.product_name +
                            "</td>\
                    <td>" +
                            item.product_unit_id +
                            "</td>\
                    <td>" +
                            new Intl.NumberFormat().format(item.sell_price) +
                            " ریال" +
                            "</td>\
                    <td>" +
                            item.value_added_group +
                            "</td>\
                    <td>" +
                            item.introduce_date +
                            "</td>\
                    <td>" +
                            new Intl.NumberFormat().format(item.latest_buy_price) +
                            " ریال" +
                            "</td>\
                    <td>" +
                            item.main_barcode +
                            "</td>\
                    <td>" +
                            item.order_point +
                            '</td>\
                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_product btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                    <button type="button" value="/products/' +
                            item.id +
                            '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button></td>\
                    </tr>'
                        );
                    });
                },
            });
        }
    </script>
@endpush
