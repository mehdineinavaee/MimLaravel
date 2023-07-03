@extends('layout.app')
@section('title', 'معرفی حساب های بانکی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی حساب های بانکی', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن حساب بانکی">
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
                        onChange="fetchDataAsPaginate('index_search','/bank-accounts',1,this.value,'index_count','myData','index_pagination')"
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
                        <th style="min-width: 200px">نوع حساب</th>
                        <th style="min-width: 200px">شماره حساب</th>
                        <th style="min-width: 300px">شماره شبا</th>
                        <th style="min-width: 200px">شماره کارت</th>
                        <th style="min-width: 200px">نام بانک</th>
                        <th style="min-width: 200px">نام شعبه</th>
                        <th style="min-width: 400px">آدرس شعبه</th>
                        <th style="min-width: 200px">نوع چاپ چک</th>
                        <th style="min-width: 100px">فعال</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نوع حساب</th>
                        <th>شماره حساب</th>
                        <th>شماره شبا</th>
                        <th>شماره کارت</th>
                        <th>نام بانک</th>
                        <th>نام شعبه</th>
                        <th>آدرس شعبه</th>
                        <th>نوع چاپ چک</th>
                        <th>فعال</th>
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

    @include('taarife-payeh.bank-accounts.create')
    @include('taarife-payeh.bank-accounts.edit')
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
                    '/bank-accounts',
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
                '/bank-accounts',
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
                        "/index-search-bank-account",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
