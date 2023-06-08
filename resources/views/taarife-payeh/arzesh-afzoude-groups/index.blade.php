@extends('layout.app')
@section('title', 'معرفی گروه های ارزش افزوده')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی گروه های ارزش افزوده', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن گروه ارزش افزوده" data-toggle="tooltip"></i>
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
                        <th style="min-width: 250px">نام گروه</th>
                        <th style="min-width: 100px">سال مالی</th>
                        <th style="min-width: 200px">عوارض</th>
                        <th style="min-width: 200px">مالیات</th>
                        <th style="min-width: 200px">سقف معاملات</th>
                        <th style="min-width: 100px">اقدامات</th>
                    </tr>
                </thead>
                <tbody id="myData">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نام گروه</th>
                        <th>سال مالی</th>
                        <th>عوارض</th>
                        <th>مالیات</th>
                        <th>سقف معاملات</th>
                        <th>اقدامات</th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <div id="pagination"></div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.arzesh-afzoude-groups.create')
    @include('taarife-payeh.arzesh-afzoude-groups.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/arzesh-afzoude-groups",
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
