@extends('layout.app')
@section('title', 'از بانک به صندوق')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'از بانک به صندوق', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن بانک به صندوق" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">عنوان هزینه</th>
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
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان هزینه</th>
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
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.bank-to-fund.create')
    @include('financial-management.bank-to-fund.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/bank-to-fund",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.bank_to_fund, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                    <td>" +
                            (index + 1) +
                            "</td>\
                                                    <td>" +
                            item.bank +
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
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_bank_to_fund btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/bank-to-fund/' +
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
