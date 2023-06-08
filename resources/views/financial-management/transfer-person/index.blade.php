@extends('layout.app')
@section('title', 'انتقال بین اشخاص')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'انتقال بین اشخاص', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن انتقال بین اشخاص" data-toggle="tooltip"></i>
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
                        <th style="min-width: 200px">از طرف حساب</th>
                        <th style="min-width: 200px">به طرف حساب</th>
                        <th style="min-width: 100px">تاریخ فرم</th>
                        <th style="min-width: 100px">شماره فرم</th>
                        <th style="min-width: 200px">مبلغ نقدی</th>
                        <th style="min-width: 300px">شرح سند</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>از طرف حساب</th>
                        <th>به طرف حساب</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>شرح سند</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.transfer-person.create')
    @include('financial-management.transfer-person.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/transfer-person",
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
