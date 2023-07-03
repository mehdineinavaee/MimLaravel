@extends('layout.app')
@section('title', 'معرفی سرفصل های حساب (کل، معین، تفصیل)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی سرفصل های حساب (کل، معین، تفصیل)', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createKol">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن کل">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        کل جدید
                    </span>
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createMoein">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن معین">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        معین جدید
                    </span>
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createTafsil">
                    <span data-toggle="tooltip" data-placement="left" title="افزودن تفصیل">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        تفصیل جدید
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
                        onChange="fetchDataAsPaginate('index_search','/account-heading',1,this.value,'index_count','myData','index_pagination')"
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
                        <th style="min-width: 100px">کد حساب</th>
                        <th style="min-width: 200px">نام حساب</th>
                        <th style="min-width: 200px">گروه حساب</th>
                        <th style="min-width: 100px">سطح</th>
                        <th style="min-width: 100px">ماهیت</th>
                        <th style="min-width: 120px">تفصیل شناور</th>
                        <th style="min-width: 100px">سیستمی</th>
                        <th style="min-width: 100px">فعال</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد حساب</th>
                        <th>نام حساب</th>
                        <th>گروه حساب</th>
                        <th>سطح</th>
                        <th>ماهیت</th>
                        <th>تفصیل شناور</th>
                        <th>سیستمی</th>
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

    @include('taarife-payeh.kol.create')
    {{-- @include('taarife-payeh.kol.edit') --}}
    @include('taarife-payeh.moein.create')
    {{-- @include('taarife-payeh.moein.edit') --}}
    @include('taarife-payeh.tafsil.create')
    {{-- @include('taarife-payeh.tafsil.edit') --}}
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
                    '/account-heading',
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
                '/account-heading',
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
                        "/index-search-account-heading",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data
    </script>
@endpush
