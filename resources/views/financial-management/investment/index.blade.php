@extends('layout.app')
@section('title', 'پرداخت شرکا (سرمایه گذاری)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پرداخت شرکا (سرمایه گذاری)', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن پرداخت شرکاء">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        جدید
                    </span>
                </button>
            </h3>
            <br />
            <div class="bg-light" style="border-radius: 10px; padding: 2rem;">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="form-check-label" for="index_opt1">
                            <input class="form-check-input" type="radio" name="group1" id="index_opt1">
                            نمایش بر اساس مبالغ کل
                        </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="form-check-label" for="index_opt2">
                            <input class="form-check-input" type="radio" name="group1" id="index_opt2">
                            نمایش بر اساس مبالغ جزء
                        </label>
                    </div>
                </div>
            </div>
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
                        onChange="fetchDataAsPaginate('index_search','/investment',1,this.value,'index_count','myData','index_pagination')"
                        class="select form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <table class="table-responsive table table-hover table-bordered table-striped"
                style="text-align: center; width: 100%">
                <thead>
                    <tr>
                        <th colspan="12">لیست فرم های پرداخت شرکاء (سرمایه گذاری)</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="min-width: 100px">مشخصات فرم</th>
                        <th colspan="7" style="min-width: 100px">ریز مبالغ موجود در فرم</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 200px">تاریخ فرم</th>
                        <th style="min-width: 200px">کد ارجاع</th>
                        <th style="min-width: 300px">نام طرف حساب</th>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">نوع</th>
                        <th style="min-width: 200px">مبلغ</th>
                        <th style="min-width: 200px">نام بانک و شعبه</th>
                        <th style="min-width: 300px">شماره چک / پیگیری</th>
                        <th style="min-width: 200px">سر رسید</th>
                        <th style="min-width: 200px">پشت نمره</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>جمع</th>
                        <th>0</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
    @include('financial-management.investment.create')
    {{-- @include('financial-management.investment.edit') --}}
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
                    '/investment',
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
                '/investment',
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
                        "/index-search-investment",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
