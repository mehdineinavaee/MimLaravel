@extends('layout.app')
@section('title', 'صورت حساب سود و زیان')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'صورت حساب سود و زیان', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem; min-height:250px;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_from_date">از تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="index_from_date" name="index_from_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_from_date_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_to_date">تا تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="index_to_date" name="index_to_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_to_date_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:2rem; margin-right:2rem; !important">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label class="form-check-label" for="index_zeroCheckBox">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="index_zeroCheckBox">
                                            شامل اسناد موقت
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <br />
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-search" title="جستجو" data-toggle="tooltip"></i>
                    <br />
                    نمایش در جدول
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-print" title="گزارش گیری" data-toggle="tooltip"></i>
                    <br />
                    پیش نمایش و چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="min-width: 90px">عنوان</th>
                        <th style="min-width: 90px">مبلغ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>عنوان</th>
                        <th>مبلغ</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('js')
    <script>
        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "/benefit-loss-bill",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.benefit_loss_bill, function(index, item) {
                        $("#data").append(
                            "<tr>\
                                                                                                <td>" +
                            (index + 1) +
                            "</td>\
                                                                                                <td>" +
                            item.product_code +
                            "</td>\
                                                                                                <td>" +
                            item.product_name +
                            "</td>\
                                                                                                <td>" +
                            item.amount +
                            "</td>\
                                                                                                <td>" +
                            new Intl.NumberFormat().format(item.price) +
                            " ریال" +
                            "</td>\
                                                                                                    <td>" +
                            new Intl.NumberFormat().format(item.discount) +
                            " ریال" +
                            "</td>\
                                                                                                    <td>" +
                            new Intl.NumberFormat().format(item.total) +
                            " ریال" +
                            '</td>\
                                                                                                </tr>'
                        );
                    });
                },
            });
        }

        $(document).on('click', '.benefit_loss_bill_print', function(e) {
            e.preventDefault();
            var benefit_loss_bill_print_id = $(this).val();
            // console.log(benefit_loss_bill_print_id);

            $.ajax({
                type: "GET",
                url: "/benefit-loss-bill-print-pdf/" + benefit_loss_bill_print_id,
            });
        });
    </script>
@endpush
