@extends('layout.app')
@section('title', 'معرفی سرفصل های حساب (کل، معین، تفصیل)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی سرفصل های حساب (کل، معین، تفصیل)', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createKol">
                    <i class="fa-lg fa fa-plus" title="افزودن کل" data-toggle="tooltip"></i>
                    <br />
                    کل جدید
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createMoein">
                    <i class="fa-lg fa fa-plus" title="افزودن معین" data-toggle="tooltip"></i>
                    <br />
                    معین جدید
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createTafsil">
                    <i class="fa-lg fa fa-plus" title="افزودن تفصیل" data-toggle="tooltip"></i>
                    <br />
                    تفصیل جدید
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th style="min-width: 100px">کد حساب</th>
                        <th style="min-width: 200px">نام حساب</th>
                        <th style="min-width: 200px">گروه حساب</th>
                        <th style="min-width: 90px">سطح</th>
                        <th style="min-width: 90px">ماهیت</th>
                        <th style="min-width: 90px">تفصیل شناور</th>
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
                        <th>کد حساب</th>
                        <th>نام حساب</th>
                        <th>گروه حساب</th>
                        <th>سطح</th>
                        <th>ماهیت</th>
                        <th>تفصیل شناور</th>
                        <th>سیستمی</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.kol.create')
    {{-- @include('taarife-payeh.kol.edit') --}}
    @include('taarife-payeh.moein.create')
    {{-- @include('taarife-payeh.moein.edit') --}}
    @include('taarife-payeh.tafsil.create')
    {{-- @include('taarife-payeh.tafsil.edit') --}}
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchAccountHeadings();

        function fetchAccountHeadings() {
            $.ajax({
                type: "GET",
                url: "/fetch-account-heading",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    // $.each(response.account_headings, function(index, item) {
                    //     $("tbody").append(
                    //         "<tr>\
                    //     <td>" +
                    //         (index + 1) +
                    //         "</td>\
                    //     <td>" +
                    //         item.form_type +
                    //         "</td>\
                    //     <td>" +
                    //         item.daramad_code +
                    //         "</td>\
                    //     <td>" +
                    //         item.daramad_name +
                    //         "</td>\
                    //                         <td>" +
                    //         "system" +
                    //         "</td>\
                    //                         <td>" +
                    //         "active" +
                    //         '</td>\
                    //     <td style="text-align: center"><button type="button" value="' +
                    //         item.id +
                    //         '" class="edit_fund btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                    //     <button type="button" value="/fund/' +
                    //         item.id +
                    //         '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button></td>\
                    //     </tr>'
                    //     );
                    // });
                },
            });
        }
    </script>
@endpush
