@extends('layout.app')
@section('title', 'معرفی حساب های بانکی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی حساب های بانکی', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن حساب بانکی" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">نوع حساب</th>
                        <th style="min-width: 200px">شماره حساب</th>
                        <th style="min-width: 200px">شماره شبا</th>
                        <th style="min-width: 200px">شماره کارت</th>
                        <th style="min-width: 200px">نام بانک</th>
                        <th style="min-width: 200px">نام شعبه</th>
                        <th style="min-width: 200px">آدرس شعبه</th>
                        <th style="min-width: 200px">نوع چاپ چک</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نوع حساب</th>
                        <th>شماره حساب</th>
                        <th>شماره شبا</th>
                        <th>شماره کارت</th>
                        <th>نام بانک</th>
                        <th>نام شعبه</th>
                        <th>آدرس شعبه</th>
                        <th>نوع چاپ چک</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.bank-accounts.create')
    @include('taarife-payeh.bank-accounts.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchBankAccounts();

        function fetchBankAccounts() {
            $.ajax({
                type: "GET",
                url: "/fetch-bank-accounts",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.banks_types, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                            <td>" +
                            (index + 1) +
                            "</td>\
                                            <td>" +
                            item.account_type +
                            "</td>\
                                            <td>" +
                            item.account_number +
                            "</td>\
                                            <td>" +
                            item.shaba_number +
                            "</td>\
                                            <td>" +
                            item.cart_number +
                            "</td>\
                                            <td>" +
                            item.bank_name +
                            "</td>\
                                            <td>" +
                            item.branch_name +
                            "</td>\
                                            <td>" +
                            item.branch_address +
                            "</td>\
                                            <td>" +
                            item.cheque_print_type +
                            "</td>\
                                            <td>" +
                            item.chk_active +
                            '</td>\
                                            <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_bank_accounts btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                            <button type="button" value="/bank-accounts/' +
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
