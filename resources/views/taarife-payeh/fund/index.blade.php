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
                    <i class="fa-lg fa fa-plus"></i>
                    <br />
                    جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 100px">نوع فرم</th>
                        <th style="min-width: 200px">کد درآمد</th>
                        <th style="min-width: 200px">نام درآمد</th>
                        <th style="min-width: 90px">سیستمی</th>
                        <th style="min-width: 90px">فعال</th>
                        <th style="min-width: 80px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>نوع فرم</th>
                        <th>کد درآمد</th>
                        <th>نام درآمد</th>
                        <th>سیستمی</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.fund.create')
    @include('taarife-payeh.fund.edit')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchFund();

        function fetchFund() {
            $.ajax({
                type: "GET",
                url: "/fetch-fund",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.banks_types, function(index, item) {
                        $("tbody").append(
                            "<tr>\
    <td>" +
                            (index + 1) +
                            "</td>\
    <td>" +
                            item.form_type +
                            "</td>\
    <td>" +
                            item.daramad_code +
                            "</td>\
    <td>" +
                            item.daramad_name +
                            '</td>\
    <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_fund btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
    <button type="button" value="/fund/' +
                            item.id +
                            '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button></td>\
    </tr>'
                        );
                    });
                },
            });
        }
    </script>
@endpush
