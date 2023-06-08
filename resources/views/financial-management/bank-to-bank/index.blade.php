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
                    <i class="fa-lg fa fa-plus" title="افزودن بانک به بانک" data-toggle="tooltip"></i>
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
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('financial-management.bank-to-bank.create')
    @include('financial-management.bank-to-bank.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/bank-to-bank",
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
