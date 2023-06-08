@extends('layout.app')
@section('title', 'از صندوق به بانک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'از صندوق به بانک', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن صندوق به بانک" data-toggle="tooltip"></i>
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
                        <th style="min-width: 200px">بانک</th>
                        <th style="min-width: 100px">تاریخ فرم</th>
                        <th style="min-width: 200px">شماره فرم</th>
                        <th style="min-width: 200px">مبلغ نقدی</th>
                        <th style="min-width: 200px">ملاحظات</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>بانک</th>
                        <th>تاریخ فرم</th>
                        <th>شماره فرم</th>
                        <th>مبلغ نقدی</th>
                        <th>ملاحظات</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.fund-to-bank.create')
    @include('financial-management.fund-to-bank.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/fund-to-bank",
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
