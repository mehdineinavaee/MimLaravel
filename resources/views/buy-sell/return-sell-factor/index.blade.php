@extends('layout.app')
@section('title', 'فاکتور برگشت از فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور برگشت از فروش', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="برگشت از فروش" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-print" title="چاپ برگشت از فروش" data-toggle="tooltip"></i>
                    <br />
                    چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>تاریخ</th>
                        <th>خریدار</th>
                        <th>جمع نهایی</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>شماره</th>
                        <th>تاریخ</th>
                        <th>خریدار</th>
                        <th>جمع نهایی</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.return-sell-factor.create')
    @include('buy-sell.return-sell-factor.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchReturnSellFactor();

        function fetchReturnSellFactor() {
            $.ajax({
                type: "GET",
                url: "/fetch-return-sell-factor",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.return_sell_factors, function(index, item) {
                        $("tbody").append(
                            "<tr>\
    <td>" +
                            item.sell_factor_no +
                            "</td>\
    <td>" +
                            item.date +
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
                            '" class="edit_return_sell_factor btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
    <button type="button" value="/return-sell-factor/' +
                            item.id +
                            '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button>\
    </tr>'
                        );
                    });
                },
            });
        }
    </script>
@endpush
