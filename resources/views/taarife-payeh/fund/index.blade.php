@extends('layout.app')
@section('title', 'معرفی درآمد / هزینه / صندوق')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی درآمد / هزینه / صندوق', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن درآمد / هزینه / صندوق" data-toggle="tooltip"></i>
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
                        <th style="min-width: 100px">نوع فرم</th>
                        <th style="min-width: 200px">کد درآمد</th>
                        <th style="min-width: 200px">نام درآمد</th>
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
                        <th>نوع فرم</th>
                        <th>کد درآمد</th>
                        <th>نام درآمد</th>
                        <th>سیستمی</th>
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

    @include('taarife-payeh.fund.create')
    @include('taarife-payeh.fund.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/fund",
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
