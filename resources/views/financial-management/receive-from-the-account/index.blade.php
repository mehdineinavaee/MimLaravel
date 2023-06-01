@extends('layout.app')
@section('title', 'دریافت از طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دریافت از طرف حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن دریافت از طرف حساب" data-toggle="tooltip"></i>
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
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام طرف حساب</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>ملاحظات</th>
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

    @include('financial-management.receive-from-the-account.create')
    @include('financial-management.receive-from-the-account.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchReceiveFromTheAccount();

        function fetchReceiveFromTheAccount() {
            $.ajax({
                type: "GET",
                url: "/fetch-receive-from-the-account",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.receive_from_the_accounts, function(index, item) {
                        $("tbody").append(
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
                            item.cash_amount +
                            "</td>\
                <td>" +
                            item.considerations1 +
                            "</td>\
                <td>" +
                            item.date +
                            "</td>\
                <td>" +
                            item.bank_account_details +
                            "</td>\
                <td>" +
                            item.deposit_amount +
                            "</td>\
                <td>" +
                            item.wage +
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
                            '" class="edit_receive_from_the_account btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                <button type="button" value="/receive-from-the-account/' +
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
