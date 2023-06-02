@extends('layout.app')
@section('title', 'دفترچه تلفن')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دفترچه تلفن', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن مخاطب" data-toggle="tooltip"></i>
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
                        <th style="min-width: 90px">نام مخاطب</th>
                        <th style="min-width: 90px">مخاطب اصلی</th>
                        <th style="min-width: 90px">شغل</th>
                        <th style="min-width: 80px">موبایل</th>
                        <th style="min-width: 90px">فاکس</th>
                        <th style="min-width: 150px">تلفن ها</th>
                        <th style="min-width: 90px">نوع فعالیت</th>
                        <th style="min-width: 150px">ایمیل</th>
                        <th style="min-width: 150px">وب سایت</th>
                        <th style="min-width: 250px">آدرس</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام مخاطب</th>
                        <th>مخاطب اصلی</th>
                        <th>شغل</th>
                        <th>موبایل</th>
                        <th>فاکس</th>
                        <th>تلفن ها</th>
                        <th>نوع فعالیت</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th>آدرس</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('facilities.phone-book.create')
    @include('facilities.phone-book.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/phone-book",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.phone_book, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                    <td>" +
                            (index + 1) +
                            "</td>\
                                                    <td>" +
                            item.contact +
                            "</td>\
                                                    <td>" +
                            item.main_contact +
                            "</td>\
                                                    <td>" +
                            item.occupation +
                            "</td>\
                                                    <td>" +
                            item.mobile +
                            "</td>\
                                                    <td>" +
                            item.fax +
                            "</td>\
                                                    <td>" +
                            item.tel +
                            "</td>\
                                                    <td>" +
                            item.activity_type +
                            "</td>\
                                                    <td>" +
                            item.email +
                            "</td>\
                                                    <td>" +
                            item.website +
                            "</td>\
                                                    <td>" +
                            item.address +
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_phone_book btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/phone-book/' +
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
