@extends('layout.app')
@section('title', 'بانک به بانک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'بانک به بانک', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن بانک به بانک">
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
                        onChange="fetchDataAsPaginate('index_search','/bank-to-bank',1,this.value,'index_count','myData','index_pagination')"
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
                        <th style="min-width: 100px">از بانک</th>
                        <th style="min-width: 100px">به بانک</th>
                        <th style="min-width: 100px">تاریخ فرم</th>
                        <th style="min-width: 100px">شماره فرم</th>
                        <th style="min-width: 200px">مبلغ نقدی</th>
                        <th style="min-width: 200px">ملاحظات</th>
                        <th style="min-width: 100px">تاریخ</th>
                        <th style="min-width: 300px">مشخصات حساب بانکی</th>
                        <th style="min-width: 200px">مبلغ واریزی</th>
                        <th style="min-width: 200px">کارمزد</th>
                        <th style="min-width: 200px">شماره پیگیری</th>
                        <th style="min-width: 200px">ملاحظات</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>از بانک</th>
                        <th>به بانک</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>ملاحظات</th>
                        <th>تاریخ</th>
                        <th>مشخصات حساب بانکی</th>
                        <th>مبلغ واریزی</th>
                        <th>کارمزد</th>
                        <th>شماره پیگیری</th>
                        <th>ملاحظات</th>
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

    @include('financial-management.bank-to-bank.create')
    @include('financial-management.bank-to-bank.edit')
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
                    '/bank-to-bank',
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
                '/bank-to-bank',
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
                        "/index-search-bank-to-bank",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
