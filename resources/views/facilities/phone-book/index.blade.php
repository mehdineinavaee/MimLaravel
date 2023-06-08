@extends('layout.app')
@section('title', 'دفترچه تلفن')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دفترچه تلفن', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن مخاطب" data-toggle="tooltip"></i>
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
                        <th style="min-width: 200px">نام مخاطب</th>
                        <th style="min-width: 200px">مخاطب اصلی</th>
                        <th style="min-width: 200px">شغل</th>
                        <th style="min-width: 200px">موبایل</th>
                        <th style="min-width: 200px">فاکس</th>
                        <th style="min-width: 200px">تلفن</th>
                        <th style="min-width: 200px">نوع فعالیت</th>
                        <th style="min-width: 300px">ایمیل</th>
                        <th style="min-width: 300px">وب سایت</th>
                        <th style="min-width: 300px">آدرس</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام مخاطب</th>
                        <th>مخاطب اصلی</th>
                        <th>شغل</th>
                        <th>موبایل</th>
                        <th>فاکس</th>
                        <th>تلفن</th>
                        <th>نوع فعالیت</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th>آدرس</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('facilities.phone-book.create')
    @include('facilities.phone-book.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/phone-book",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $('#myData').html(response.output);
                    $('#pagination').html(response.pagination);
                },
            });
        }
    </script>
@endpush
