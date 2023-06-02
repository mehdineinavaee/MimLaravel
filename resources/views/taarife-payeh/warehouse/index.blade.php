@extends('layout.app')
@section('title', 'معرفی انبارها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی انبارها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن انبار" data-toggle="tooltip"></i>
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
                        <th style="min-width: 90px">کد انبار</th>
                        <th style="min-width: 250px">نام انبار</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد انبار</th>
                        <th>نام انبار</th>
                        <th>فعال</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.warehouse.create')
    @include('taarife-payeh.warehouse.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/warehouse",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.warehouses, function(index, item) {
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
                            '" class="edit_warehouse btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                            <button type="button" value="/warehouse/' +
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
