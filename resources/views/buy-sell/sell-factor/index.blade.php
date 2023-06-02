@extends('layout.app')
@section('title', 'فاکتور فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور فروش', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن فاکتور فروش" data-toggle="tooltip"></i>
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
                        <th>شماره</th>
                        <th style="min-width: 200px">تاریخ</th>
                        <th style="min-width: 200px">خریدار</th>
                        <th style="min-width: 100px">جمع نهایی</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
                <tfoot>
                    <tr>
                        <th>شماره</th>
                        <th>تاریخ</th>
                        <th>خریدار</th>
                        <th>جمع نهایی</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.sell-factor.create')
    @include('buy-sell.sell-factor.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/sell-factor",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("#data").html("");
                    $.each(response.sell - factors, function(index, item) {
                        $("#data").append(
                            "<tr>\
                                                    <td>" +
                            item.factor_no +
                            "</td>\
                                                    <td>" +
                            item.factor_date +
                            "</td>\
                                                    <td>" +
                            item.buyer +
                            "</td>\
                                                    <td>" +
                            new Intl.NumberFormat().format(item.total) +
                            " ریال" +
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_sell_factor btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/payment-to-account/' +
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
