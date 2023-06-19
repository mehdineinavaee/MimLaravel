@extends('layout.app')
@section('title', 'معرفی طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی طرف حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن طرف حساب" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-file" title="فهرست طرف های حساب" data-toggle="tooltip"></i>
                    <br />
                    فهرست
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">فروشنده</th>
                        <th style="min-width: 100px">خریدار</th>
                        <th style="min-width: 120px">واسطه فروش</th>
                        <th style="min-width: 120px">سرمایه گذار</th>
                        <th style="min-width: 100px">بد حساب</th>
                        <th style="min-width: 100px">فعال</th>
                        <th style="min-width: 170px">انتقال به دفترچه تلفن</th>
                        <th style="min-width: 120px">کد</th>
                        <th style="min-width: 250px">نام و نام خانوادگی</th>
                        <th style="min-width: 100px">کد پستی</th>
                        <th style="min-width: 140px">موبایل</th>
                        <th style="min-width: 120px">شهر</th>
                        <th style="min-width: 120px">واسطه فروش</th>
                        <th style="min-width: 100px">پور سانت</th>
                        <th style="min-width: 400px">آدرس</th>
                        <th style="min-width: 280px">نوع شخص</th>
                        <th style="min-width: 250px">مدیر عامل</th>
                        <th style="min-width: 100px">کد ملی</th>
                        <th style="min-width: 100px">تاریخ تولد</th>
                        <th style="min-width: 400px">شغل</th>
                        <th style="min-width: 100px">فاکس</th>
                        <th style="min-width: 100px">تلفن</th>
                        <th style="min-width: 120px">نوع فعالیت</th>
                        <th style="min-width: 120px">کد اقتصادی</th>
                        <th style="min-width: 300px">ایمیل</th>
                        <th style="min-width: 300px">وب سایت</th>
                        <th style="min-width: 200px">سقف اعتبار</th>
                        <th style="min-width: 120px">فقط هشداری</th>
                        <th style="min-width: 100px">منع فروش</th>
                        <th style="min-width: 160px">چک های پاس نشده</th>
                        <th style="min-width: 110px">مانده مشتری</th>
                        <th style="min-width: 160px">چک های خرج نشده</th>
                        <th style="min-width: 180px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فروشنده</th>
                        <th>خریدار</th>
                        <th>واسطه فروش</th>
                        <th>سرمایه گذار</th>
                        <th>بد حساب</th>
                        <th>فعال</th>
                        <th>انتقال به دفترچه تلفن</th>
                        <th>کد</th>
                        <th>نام و نام خانوادگی</th>
                        <th>کد پستی</th>
                        <th>موبایل</th>
                        <th>شهر</th>
                        <th>واسطه فروش</th>
                        <th>پور سانت</th>
                        <th>آدرس</th>
                        <th>نوع شخص</th>
                        <th>مدیر عامل</th>
                        <th>کد ملی</th>
                        <th>تاریخ تولد</th>
                        <th>شغل</th>
                        <th>فاکس</th>
                        <th>تلفن</th>
                        <th>نوع فعالیت</th>
                        <th>کد اقتصادی</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th>سقف اعتبار</th>
                        <th>فقط هشداری</th>
                        <th>منع فروش</th>
                        <th>چک های پاس نشده</th>
                        <th>مانده مشتری</th>
                        <th>چک های خرج نشده</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.taraf-hesab.create')
    @include('taarife-payeh.taraf-hesab.edit')
    @include('taarife-payeh.taraf-hesab.show')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/taraf-hesab",
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
