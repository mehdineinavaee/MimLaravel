@extends('layout.app')
@section('title', 'فاکتور برگشت از فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور برگشت از فروش', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="برگشت از فروش" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-print" title="چاپ برگشت از فروش" data-toggle="tooltip"></i>
                    <br />
                    چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>تاریخ</th>
                        <th>خریدار</th>
                        <th>جمع نهایی</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>شماره</th>
                        <th>تاریخ</th>
                        <th>خریدار</th>
                        <th>جمع نهایی</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.return-sell-factor.create')
    @include('buy-sell.return-sell-factor.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/return-sell-factor",
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
