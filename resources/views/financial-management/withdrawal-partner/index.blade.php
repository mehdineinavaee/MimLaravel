@extends('layout.app')
@section('title', 'برداشت شرکا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'برداشت شرکا', 'url' => url()->current()]],
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
                        <th style="min-width: 100px">از طرف حساب</th>
                        <th style="min-width: 100px">به طرف حساب</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 90px">مبلغ نقدی</th>
                        <th style="min-width: 90px">شرح سند</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>از طرف حساب</th>
                        <th>به طرف حساب</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>شرح سند</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.withdrawal-partner.create')
    @include('financial-management.withdrawal-partner.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchWithdrawalPartner();

        function fetchWithdrawalPartner() {
            $.ajax({
                type: "GET",
                url: "/fetch-withdrawal-partner",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.withdrawal_partner, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                            <td>" +
                            (index + 1) +
                            "</td>\
                            <td>" +
                            item.from_taraf_hesab +
                            "</td>\
                            <td>" +
                            item.to_taraf_hesab +
                            "</td>\
                            <td>" +
                            item.form_date +
                            "</td>\
                            <td>" +
                            item.form_number +
                            "</td>\
                            <td>" +
                            item.cash_amount +
                            '</td>\
                            <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_withdrawal_partner btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                            <button type="button" value="/withdrawal-partner/' +
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
