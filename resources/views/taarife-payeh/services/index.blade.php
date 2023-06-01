@extends('layout.app')
@section('title', 'معرفی خدمات')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی خدمات', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن خدمات" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 90px">کد خدمات</th>
                        <th style="min-width: 80px">نام خدمات</th>
                        <th style="min-width: 150px">قیمت ارائه خدمات</th>
                        <th style="min-width: 150px">گروه ارزش افزوده</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد خدمات</th>
                        <th>نام خدمات</th>
                        <th>قیمت ارائه خدمات</th>
                        <th>گروه ارزش افزوده</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.services.create')
    @include('taarife-payeh.services.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchServices();

        function fetchServices() {
            $.ajax({
                type: "GET",
                url: "/fetch-service",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.services, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                                    <td>" +
                            (index + 1) +
                            "</td>\
                                                                    <td>" +
                            item.service_code +
                            "</td>\
                                                                    <td>" +
                            item.service_name +
                            "</td>\
                                                                    <td>" +
                            item.price +
                            "</td>\
                                                                    <td>" +
                            item.group +
                            "</td>\
                                                                    <td>" +
                            item.chk_active +
                            '</td>\
                                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_service btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                                    <button type="button" value="/services/' +
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
