@extends('layout.app')
@section('title', 'پس گرفتن چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پس گرفتن چک', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن سند">
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
                        onChange="fetchDataAsPaginate('index_search','/cashing-cheque',1,this.value,'index_count','myData','index_pagination')"
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
                        <th colspan="10" style="background-color: azure; color:blue;">
                            لیست فرم های چک های پس گرفته شده
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3" style="background-color: beige; color:red;">مشخصات فرم</th>
                        <th colspan="7" style="background-color: beige; color:red;">مشخصات چک های موجود در فرم</th>
                    </tr>
                    <tr>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 100px">کد ارجاع</th>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 200px">شماره سریال چک</th>
                        <th style="min-width: 200px">مبلغ چک</th>
                        <th style="min-width: 200px">سر رسید</th>
                        <th style="min-width: 300px">مشخصات حساب بانکی</th>
                        <th style="min-width: 200px">دریافت کننده</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>شماره فرم</th>
                        <th>تاریخ فرم</th>
                        <th>کد ارجاع</th>
                        <th>ردیف</th>
                        <th>شماره سریال چک</th>
                        <th>مبلغ چک</th>
                        <th>سر رسید</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>دریافت کننده</th>
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
                    '/cashing-cheque',
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
                '/cashing-cheque',
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
                        "/index-search-cashing-cheque",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
