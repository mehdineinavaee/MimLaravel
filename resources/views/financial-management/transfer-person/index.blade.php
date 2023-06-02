@extends('layout.app')
@section('title', 'انتقال بین اشخاص')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'انتقال بین اشخاص', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن انتقال بین اشخاص" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">از طرف حساب</th>
                        <th style="min-width: 100px">به طرف حساب</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 90px">مبلغ نقدی</th>
                        <th style="min-width: 90px">شرح سند</th>
                        <th style="min-width: 100px">اقدامات</th>
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
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.transfer-person.create')
    @include('financial-management.transfer-person.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/transfer-person",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.transfer_person, function(index, item) {
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
                            "</td>\
                                                    <td>" +
                            item.considerations +
                            '</td>\
                                                    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_transfer_person btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                    <button type="button" value="/transfer-person/' +
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
