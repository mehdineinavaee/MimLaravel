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
                    <i class="fa-lg fa fa-plus" title="افزودن حساب بانکی" data-toggle="tooltip"></i>
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
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.bank-accounts.create')
    @include('taarife-payeh.bank-accounts.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/bank-accounts",
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
