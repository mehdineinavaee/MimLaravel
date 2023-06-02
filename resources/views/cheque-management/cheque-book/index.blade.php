@extends('layout.app')
@section('title', 'معرفی دسته چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی دسته چک', 'url' => url()->current()]],
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
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 90px">کد</th>
                        <th style="min-width: 100px">تاریخ دریافت</th>
                        <th style="min-width: 635px">مشخصات حساب بانکی</th>
                        <th style="min-width: 65px">تعداد برگه</th>
                        <th style="min-width: 90px">از سریال</th>
                        <th style="min-width: 90px">تا سریال</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد</th>
                        <th>تاریخ دریافت</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>تعداد برگه</th>
                        <th>از سریال</th>
                        <th>تا سریال</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('cheque-management.cheque-book.create')
    @include('cheque-management.cheque-book.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/cheque-book",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.cheque_book, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                    <td>" +
                            (index + 1) +
                            "</td>\
                                                    <td>" +
                            item.code +
                            "</td>\
                                                    <td>" +
                            item.receive_date +
                            "</td>\
                                                    <td>" +
                            item.bank_account_details +
                            "</td>\
                                                    <td>" +
                            item.quantity +
                            "</td>\
                                                    <td>" +
                            item.cheque_from +
                            "</td>\
                                                    <td>" +
                            item.cheque_to +
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_cheque_book btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/cheque-book/' +
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
