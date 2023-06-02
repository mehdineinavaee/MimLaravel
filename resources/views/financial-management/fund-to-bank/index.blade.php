@extends('layout.app')
@section('title', 'از صندوق به بانک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'از صندوق به بانک', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن صندوق به بانک" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">بانک</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 90px">مبلغ نقدی</th>
                        <th style="min-width: 90px">ملاحظات</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>بانک</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>ملاحظات</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.fund-to-bank.create')
    @include('financial-management.fund-to-bank.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/fund-to-bank",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.fund_to_bank, function(index, item) {
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
                            item.considerations +
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_fund_to_bank btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/fund-to-bank/' +
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
