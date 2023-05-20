@extends('layout.app')
@section('title', 'برگشت چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'برگشت چک', 'url' => url()->current()]],
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
                        <th style="min-width: 90px">تاریخ فرم</th>
                        <th style="min-width: 100px">شماره فرم</th>
                        <th style="min-width: 100px">پشت نمره</th>
                        <th style="min-width: 130px">شماره سریال چک</th>
                        <th style="min-width: 200px">مبلغ چک</th>
                        <th style="min-width: 90px">تاریخ سر رسید</th>
                        <th style="min-width: 150px">مشخصات حساب بانکی</th>
                        <th style="min-width: 90px">پرداخت کننده</th>
                        <th style="min-width: 90px">ملاحظات</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>پشت نمره</th>
                        <th>شماره سریال چک</th>
                        <th>مبلغ چک</th>
                        <th>تاریخ سر رسید</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>پرداخت کننده</th>
                        <th>ملاحظات</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('cheque-management.returning-cheque.create')
    @include('cheque-management.returning-cheque.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchReturningCheque();

        function fetchReturningCheque() {
            $.ajax({
                type: "GET",
                url: "/fetch-returning-cheque",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.returning_cheque, function(index, item) {
                        $("tbody").append(
                            "<tr>\
    <td>" +
                            (index + 1) +
                            "</td>\
    <td>" +
                            item.form_date +
                            "</td>\
    <td>" +
                            item.form_number +
                            "</td>\
    <td>" +
                            item.mark_back +
                            "</td>\
    <td>" +
                            item.serial_number +
                            "</td>\
    <td>" +
                            item.total +
                            "</td>\
    <td>" +
                            item.due_date +
                            "</td>\
    <td>" +
                            item.bank_account_details +
                            "</td>\
    <td>" +
                            item.payer +
                            "</td>\
    <td>" +
                            item.considerations +
                            '</td>\
    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_returning_cheque btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
    <button type="button" value="/returning-cheque/' +
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
