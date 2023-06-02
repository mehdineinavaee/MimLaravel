@extends('layout.app')
@section('title', 'معرفی گروه حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی گروه حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن گروه حساب" data-toggle="tooltip"></i>
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
                        <th style="min-width: 80px">کد گروه حساب</th>
                        <th style="min-width: 300px">نام گروه حساب</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد گروه حساب</th>
                        <th>نام گروه حساب</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.account-group.create')
    @include('taarife-payeh.account-group.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/account-group",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.account_groups, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                        <td>" +
                            (index + 1) +
                            "</td>\
                                                        <td>" +
                            item.code +
                            "</td>\
                                                        <td>" +
                            item.name +
                            '</td>\
                                                        <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_account_group btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                        <button type="button" value="/account-group/' +
                            item.id +
                            '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button>\
                                                       </tr>'
                        );
                    });
                },
            });
        }
    </script>
@endpush
