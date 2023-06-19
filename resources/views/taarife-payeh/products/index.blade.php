@extends('layout.app')
@section('title', 'معرفی کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی کالاها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن کالا" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">کد کالا</th>
                        <th style="min-width: 100px">گروه اصلی</th>
                        <th style="min-width: 100px">گروه فرعی</th>
                        <th style="min-width: 400px">نام کالا</th>
                        <th style="min-width: 200px">واحد کالا</th>
                        <th style="min-width: 200px">فی فروش</th>
                        <th style="min-width: 250px">گروه ارزش افزوده</th>
                        <th style="min-width: 130px">تاریخ معرفی</th>
                        <th style="min-width: 200px">آخرین قیمت خرید</th>
                        <th style="min-width: 250px">بارکد اصلی</th>
                        <th style="min-width: 250px">نقطه سفارش</th>
                        <th style="min-width: 200px">انبار</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فعال</th>
                        <th>کد کالا</th>
                        <th>گروه اصلی</th>
                        <th>گروه فرعی</th>
                        <th>نام کالا</th>
                        <th>واحد کالا</th>
                        <th>فی فروش</th>
                        <th>گروه ارزش افزوده</th>
                        <th>تاریخ معرفی</th>
                        <th>آخرین قیمت خرید</th>
                        <th>بارکد اصلی</th>
                        <th>نقطه سفارش</th>
                        <th>انبار</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.products.create')
    @include('taarife-payeh.products.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/products",
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
