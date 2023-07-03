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
                    <span data-toggle="tooltip" data-placement="left" title="افزودن کالا">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        جدید
                    </span>
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="form-group mb-3">
                        <input type="search" id="index_search" name="index_search" class="form-control" autocomplete="off"
                            placeholder="جستجو" />
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-12">
                    <select id="index_row"
                        onChange="fetchDataAsPaginate('index_search','/products',1,this.value,'index_count','myData','index_pagination')"
                        class="select form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="index_pagination"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                    مجموع رکوردها:
                    <span id="index_count">0</span>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.products.create')
    @include('taarife-payeh.products.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        // pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            var row = document.getElementById("index_row");
            fetchDataAsPaginate
                (
                    'index_search',
                    '/products',
                    page,
                    row.value,
                    'index_count',
                    'myData',
                    'index_pagination'
                );
        });

        fetchDataAsPaginate
            (
                'index_search',
                '/products',
                1,
                10,
                'index_count',
                'myData',
                'index_pagination'
            );
        // end pagination

        // search data
        $(document).ready(function() {
            $('#index_search').on('keyup', function() {
                var value = $(this).val();
                var row = document.getElementById("index_row").value;
                serach_data
                    (
                        value,
                        row,
                        "/index-search-product",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
