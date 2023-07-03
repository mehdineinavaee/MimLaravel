@extends('layout.app')
@section('title', 'انتقال بین انبارها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'انتقال بین انبارها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" data-placement="left" data-placement="left" title="حواله انتقالی جدید">
                        <i class="fa-lg fa fa-plus"></i>
                        <br />
                        جدید
                    </span>
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="form-group mb-3">
                            <input type="search" id="index_invoice_search" name="index_invoice_search" class="form-control"
                                autocomplete="off" placeholder="جستجو" />
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <select id="index_invoice_row"
                            onChange="fetchDataAsPaginate('index_invoice_search','/index-search-warehouse-move',1,this.value,'index_count','myData','index_pagination')"
                            class="select form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center;" id="index_factors_table">
                        <thead>
                            <tr>
                                <th style="min-width: 80px">شماره</th>
                                <th style="min-width: 100px">تاریخ</th>
                                <th style="min-width: 200px">انبار فرستنده</th>
                                <th style="min-width: 150px">انبار گیرنده</th>
                                <th style="min-width: 100px">اقدامات</th>
                            </tr>
                        </thead>
                        <tbody id="myData">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>شماره</th>
                                <th>تاریخ</th>
                                <th>انبار فرستنده</th>
                                <th>انبار گیرنده</th>
                                <th>اقدامات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div id="index_pagination"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="index_count">0</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="select_no">شماره سند</label>
                            <input type="text" id="select_no" name="select_no" class="form-control" autocomplete="off"
                                disabled />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="select_date">تاریخ</label>
                            <input type="text" id="select_date" name="select_date" class="form-control"
                                autocomplete="off" disabled />
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center;">
                        <thead>
                            <tr>
                                <th style="min-width: 200px">شماره سند</th>
                                <th style="min-width: 400px">شرح</th>
                                <th style="min-width: 200px">مقدار</th>
                            </tr>
                        </thead>
                        <tbody id="selectData">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" style="text-align: right">
                                    <label for="select_description">شرح ردیف</label>
                                    <input type="text" id="select_description" name="select_description"
                                        class="form-control" style="text-align: center" autocomplete="off" disabled />
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="index_products_count">0</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @include('warehouse.warehouse-moves.create')
    @include('warehouse.warehouse-moves.edit')
    @include('common.delete')
    @include('common.delete_details')
@endsection

@push('js')
    <script>
        // pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            var row = document.getElementById("index_invoice_row");
            fetchDataAsPaginate
                (
                    'index_invoice_search',
                    '/warehouse-moves',
                    page,
                    row.value,
                    'index_count',
                    'myData',
                    'index_pagination'
                );
        });

        fetchDataAsPaginate
            (
                'index_invoice_search',
                '/warehouse-moves',
                1,
                10,
                'index_count',
                'myData',
                'index_pagination'
            );
        // end pagination

        // search data
        $(document).ready(function() {
            $('#index_invoice_search').on('keyup', function() {
                var value = $(this).val();
                var row = document.getElementById("index_invoice_row").value;
                serach_data
                    (
                        value,
                        row,
                        "/index-search-warehouse-move",
                        "myData",
                        "index_pagination"
                    );
            });
        });
        // end search data

        $(document).ready(function() {
            $("#index_factors_table").on('click', '.indexRow', function() {
                var currentRow = $(this).closest("tr");
                // console.log(currentRow.find("td:eq(0)").html()); شناسه فاکتور برای نمایش جزئیات
                var warehouse_moves_id = currentRow.find("td:eq(0)").html();

                $.ajax({
                    type: "GET",
                    url: "/warehouse-moves-detail/" + warehouse_moves_id + "/edit",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطا',
                                text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                            })
                        } else {
                            // console.log(response);
                            $('#selectData').html(response.warehouse_move_by_id);

                            $('#select_no').val(currentRow.find("td:eq(1)").html());
                            $('#select_date').val(currentRow.find("td:eq(2)").html());
                            $("#index_products_count").html(response.count);
                        }
                    },
                });
            });
        });
    </script>
@endpush
