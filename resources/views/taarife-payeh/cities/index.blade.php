@extends('layout.app')
@section('title', 'معرفی شهرهای کشور')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی شهرهای کشور', 'url' => url()->current()]],
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
                        <th style="min-width: 200px">کد شهر</th>
                        <th style="min-width: 200px">نام شهر</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد شهر</th>
                        <th>نام شهر</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.cities.create')
    @include('taarife-payeh.cities.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchCities();

        function fetchCities() {
            $.ajax({
                type: "GET",
                url: "/fetch-cities",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.cities, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                            <td>" +
                            (index + 1) +
                            "</td>\
                                            <td>" +
                            item.city_code +
                            "</td>\
                                            <td>" +
                            item.city_name +
                            '</td>\
                                            <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_city btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                            <button type="button" value="/cities/' +
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
