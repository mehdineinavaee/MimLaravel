@extends('layout.app')
@section('title', 'خواباندن چک به حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'خواباندن چک به حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن چک به حساب">
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
                        onChange="fetchDataAsPaginate('index_search','/deposit',1,this.value,'index_count','myData','index_pagination')"
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
                        <th style="min-width: 100px">شماره فرم</th>
                        <th style="min-width: 100px">تاریخ فرم</th>
                        <th style="min-width: 200px">محل خواباندن چک</th>
                        <th style="min-width: 100px">پشت نمره</th>
                        <th style="min-width: 150px">شماره سریال چک</th>
                        <th style="min-width: 200px">مبلغ چک</th>
                        <th style="min-width: 150px">تاریخ سر رسید</th>
                        <th style="min-width: 200px">مشخصات حساب بانکی</th>
                        <th style="min-width: 200px">پرداخت کننده</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>شماره فرم</th>
                        <th>تاریخ فرم</th>
                        <th>محل خواباندن چک</th>
                        <th>پشت نمره</th>
                        <th>شماره سریال چک</th>
                        <th>مبلغ چک</th>
                        <th>تاریخ سر رسید</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>پرداخت کننده</th>
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

    @include('cheque-management.deposit.create')
    @include('cheque-management.deposit.edit')
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
                    '/deposit',
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
                '/deposit',
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
                        "/index-search-deposit",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
