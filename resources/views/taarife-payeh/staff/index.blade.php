@extends('layout.app')
@section('title', 'معرفی پرسنل')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی پرسنل', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن پرسنل" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">فعال</th>
                        <th style="min-width: 100px">پیک</th>
                        <th style="min-width: 100px">جنسیت</th>
                        <th style="min-width: 170px">نام</th>
                        <th style="min-width: 250px">نام خانوادگی</th>
                        <th style="min-width: 170px">نام پدر</th>
                        <th style="min-width: 100px">تاریخ تولد</th>
                        <th style="min-width: 100px">شناسنامه</th>
                        <th style="min-width: 400px">شغل</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فعال</th>
                        <th>پیک</th>
                        <th>جنسیت</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>تاریخ تولد</th>
                        <th>شناسنامه</th>
                        <th>شغل</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.staff.create')
    @include('taarife-payeh.staff.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/staff",
                dataType: "json",
                success: function(response) {
                    $('#myData').html(response.output);
                    $('#pagination').html(response.pagination);
                },
            });
        }
    </script>
@endpush
