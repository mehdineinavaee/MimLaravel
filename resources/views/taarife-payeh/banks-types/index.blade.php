@extends('layout.app')
@section('title', 'معرفی انواع بانک های کشور')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی انواع بانک های کشور', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن بانک" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">کد بانک</th>
                        <th style="min-width: 200px">نام بانک</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد بانک</th>
                        <th>نام بانک</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.banks-types.create')
    @include('taarife-payeh.banks-types.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchBanksTypes();

        function fetchBanksTypes() {
            $.ajax({
                type: "GET",
                url: "/fetch-banks-types",
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
                            item.bank_code +
                            "</td>\
                                                <td>" +
                            item.bank_name +
                            '</td>\
                                                <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_banks_types btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                <button type="button" value="/banks-types/' +
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
