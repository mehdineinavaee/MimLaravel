@extends('layout.app')
@section('title', 'فاکتور خرید')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور خرید', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن فاکتور فروش" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="data">

        </div>
        <!-- /.card-body -->
    </div>

    @include('buy-sell.buy-factor.create')
    @include('buy-sell.buy-factor.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchBuyFactor();

        function fetchBuyFactor() {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/fetch-buy-factor",
                type: "get",
                data: {
                    CSRF_TOKEN
                },
                success: function(response) {
                    // console.log(response);
                    $("#data").html(response);
                }
            })
        }
    </script>
@endpush
