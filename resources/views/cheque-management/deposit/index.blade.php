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
                    <i class="fa-lg fa fa-plus" title="افزودن چک به حساب" data-toggle="tooltip"></i>
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
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('cheque-management.deposit.create')
    @include('cheque-management.deposit.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/deposit",
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
