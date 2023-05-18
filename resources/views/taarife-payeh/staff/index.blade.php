@extends('layout.app')
@section('title', 'معرفی پرسنل')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی پرسنل', 'url' => url()->current()]],
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
            <table id="example1" class="table-responsive table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>فعال</th>
                        <th>پیک</th>
                        <th>جنسیت</th>
                        <th style="min-width: 90px">نام</th>
                        <th style="min-width: 90px">نام خانوادگی</th>
                        <th style="min-width: 90px">نام پدر</th>
                        <th style="min-width: 80px">تاریخ تولد</th>
                        <th style="min-width: 90px">شناسنامه</th>
                        <th style="min-width: 250px">شغل</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فعال</th>
                        <th>پیک</th>
                        <th>جنسیت</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>تاریخ تولد</th>
                        <th>شناسنامه</th>
                        <th>شغل</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.staff.create')
    @include('taarife-payeh.staff.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchStaff();

        function fetchStaff() {
            $.ajax({
                type: "GET",
                url: "/fetch-staff",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.staffs, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                            <td>" +
                            (index + 1) +
                            "</td>\
                            <td>" +
                            item.chk_active +
                            "</td>\
                            <td>" +
                            item.chk_messenger +
                            "</td>\
                            <td>" +
                            item.opt_sex +
                            "</td>\
                            <td>" +
                            item.first_name +
                            "</td>\
                            <td>" +
                            item.last_name +
                            "</td>\
                            <td>" +
                            item.father +
                            "</td>\
                            <td>" +
                            item.birthdate +
                            "</td>\
                            <td>" +
                            item.national_code +
                            "</td>\
                            <td>" +
                            item.occupation +
                            '</td>\
                            <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_staff btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                            <button type="button" value="/staff/' +
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
