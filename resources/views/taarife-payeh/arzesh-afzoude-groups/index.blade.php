@extends('layout.app')
@section('title', 'معرفی گروه های ارزش افزوده')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی گروه های ارزش افزوده', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن گروه ارزش افزوده" data-toggle="tooltip"></i>
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
                        <th style="min-width: 90px">نام گروه</th>
                        <th>سال مالی</th>
                        <th>عوارض</th>
                        <th>مالیات</th>
                        <th style="min-width: 90px">سقف معاملات</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام گروه</th>
                        <th>سال مالی</th>
                        <th>عوارض</th>
                        <th>مالیات</th>
                        <th>سقف معاملات</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.arzesh-afzoude-groups.create')
    @include('taarife-payeh.arzesh-afzoude-groups.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/arzesh-afzoude-groups",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.arzesh_afzoude_groups, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                                                <td>" +
                            (index + 1) +
                            "</td>\
                                                                                <td>" +
                            item.group_name +
                            "</td>\
                                                                                <td>" +
                            item.financial_year +
                            "</td>\
                                                                                <td>" +
                            item.avarez +
                            "</td>\
                                                                                <td>" +
                            item.maliyat +
                            "</td>\
                                                                                <td>" +
                            item.saghfe_moamelat +
                            '</td>\
                                                                                <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_arzesh_afzoude_groups btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                                                <button type="button" value="/arzesh-afzoude-groups/' +
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
