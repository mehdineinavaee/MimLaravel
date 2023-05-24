@extends('layout.app')
@section('title', 'پرداخت به طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پرداخت به طرف حساب', 'url' => url()->current()]],
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
                        <th style="min-width: 100px">نام طرف حساب</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 90px">مبلغ نقدی</th>
                        <th style="min-width: 90px">ملاحظات</th>
                        <th style="min-width: 90px">بابت</th>
                        <th style="min-width: 90px">تاریخ</th>
                        <th style="min-width: 90px">مشخصات حساب بانکی</th>
                        <th style="min-width: 90px">مبلغ واریزی</th>
                        <th style="min-width: 90px">کارمزد</th>
                        <th style="min-width: 90px">شماره پیگیری</th>
                        <th style="min-width: 90px">ملاحظات</th>
                        <th style="min-width: 90px">تخفیف پرداختی</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام طرف حساب</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>ملاحظات</th>
                        <th>بابت</th>
                        <th>تاریخ</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>مبلغ واریزی</th>
                        <th>کارمزد</th>
                        <th>شماره پیگیری</th>
                        <th>ملاحظات</th>
                        <th>تخفیف پرداختی</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.payment-to-account.create')
    @include('financial-management.payment-to-account.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchPaymentToAccount();

        function fetchPaymentToAccount() {
            $.ajax({
                type: "GET",
                url: "/fetch-payment-to-account",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("#data").html("");
                    $.each(response.payment_to_accounts, function(index, item) {
                        $("#data").append(
                            "<tr>\
                    <td>" +
                            (index + 1) +
                            "</td>\
                    <td>" +
                            item.taraf_hesab_name +
                            "</td>\
                    <td>" +
                            item.form_date +
                            "</td>\
                    <td>" +
                            item.form_number +
                            "</td>\
                    <td>" +
                            new Intl.NumberFormat().format(item.cash_amount) +
                            " ریال" +
                            "</td>\
                    <td>" +
                            item.considerations1 +
                            "</td>\
                    <td>" +
                            item.payment_for +
                            "</td>\
                    <td>" +
                            item.date +
                            "</td>\
                    <td>" +
                            item.bank_account_details +
                            "</td>\
                    <td>" +
                            new Intl.NumberFormat().format(item.deposit_amount) +
                            " ریال" +
                            "</td>\
                    <td>" +
                            new Intl.NumberFormat().format(item.wage) +
                            " ریال" +
                            "</td>\
                    <td>" +
                            item.issue_tracking +
                            "</td>\
                    <td>" +
                            item.considerations2 +
                            "</td>\
                    <td>" +
                            item.paid_discount +
                            '</td>\
                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_payment_to_account btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
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
