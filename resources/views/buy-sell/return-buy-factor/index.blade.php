@extends('layout.app')
@section('title', 'فاکتور برگشت از خرید')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور برگشت از خرید', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن فاکتور برگشت از خرید" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th style="min-width: 80px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>شماره</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.return-buy-factor.create')
    @include('buy-sell.return-buy-factor.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/return-buy-factor",
                dataType: "json",
                success: function(response) {
                    $('#myData').html(response.output);
                    $('#pagination').html(response.pagination);
                },
            });
        }
    </script>
@endpush
