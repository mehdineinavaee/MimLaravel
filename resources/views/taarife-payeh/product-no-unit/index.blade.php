@extends('layout.app')
@section('title', 'معرفی واحد شمارش کالا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی واحد شمارش کالا', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 90px">کد واحد</th>
                        <th style="min-width: 250px">نام واحد کالا</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد واحد</th>
                        <th>نام واحد کالا</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.product-no-unit.create')
    @include('taarife-payeh.product-no-unit.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchProductNoUnit();

        function fetchProductNoUnit() {
            $.ajax({
                type: "GET",
                url: "/fetch-product-no-unit",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.productNoUnits, function(index, item) {
                        $("tbody").append(
                            "<tr>\
            <td>" +
                            (index + 1) +
                            "</td>\
            <td>" +
                            item.code +
                            "</td>\
            <td>" +
                            item.title +
                            "</td>\
            <td>" +
                            item.chk_active +
                            '</td>\
            <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_product_no_unit btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                        <button type="button" value="/product-no-unit/' +
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
