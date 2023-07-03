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
                                    <label for="from_date">از تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="from_date" name="from_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="from_date_error" class="invalid-feedback" style="margin-right: 38px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="to_date">تا تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="to_date" name="to_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="to_date_error" class="invalid-feedback" style="margin-right: 38px;"></div>
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
                <button type="button" class="btn btn-success showInTable" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" title="جستجو">
                        <i class="fa-lg fa fa-search"></i>
                        <br />
                        نمایش در جدول
                    </span>
                </button>
                <a href={{ route('benefitLossBillPDF') }} class="btn btn-info" target="_blank" title="گزارش گیری"
                    data-toggle="tooltip">
                    <i class="fa-lg fa fa-print"></i>
                    <br />
                    پیش نمایش و چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="min-width: 200px"></th>
                        <th style="min-width: 500px">عنوان</th>
                        <th style="min-width: 300px">مبلغ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <th style="text-align: right">موجودی ریالی اول دوره کالا</th>
                        <th>
                            <input type="text" id="inventory_first_period" name="inventory_first_period"
                                class="form-control" autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th>اطلاق می شود</th>
                        <th style="text-align: right">کل خرید با کسر برداشت از خرید و تخفیفات</th>
                        <th>
                            <input type="text" id="buy_total" name="buy_total" class="form-control" autocomplete="off"
                                style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th>کسر می شود</th>
                        <th style="text-align: right">موجودی ریالی انبارها منتهی به تاریخ 1402/04/05</th>
                        <th>
                            <input type="text" id="inventory_warehouse" name="inventory_warehouse" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>

                    <tr style="background-color: azure; color: blue;">
                        <th>برقرار است</th>
                        <th style="text-align: right">قیمت تمام شده کالای فروخته شده</th>
                        <th>
                            <input type="text" id="sold_price1" name="sold_price1" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th style="text-align: right">کل فروش با کسر برداشت از فروش و تخفیفات</th>
                        <th>
                            <input type="text" id="sell_total" name="sell_total" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th>کسر می شود</th>
                        <th style="text-align: right">قیمت تمام شده کالای فروخته شده</th>
                        <th>
                            <input type="text" id="sold_price2" name="sold_price2" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>

                    <tr style="background-color: azure; color: blue;">
                        <th>برقرار است</th>
                        <th style="text-align: right">سود ناویژه (سود حاصل از خرید و فروش)</th>
                        <th>
                            <input type="text" id="special_interest1" name="special_interest1" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th style="text-align: right">سود ناویژه (سود حاصل از خرید و فروش)</th>
                        <th>
                            <input type="text" id="special_interest2" name="special_interest2" class="form-control"
                                autocomplete="off" style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th>اطلاق می شود</th>
                        <th style="text-align: right">درآمدها</th>
                        <th>
                            <input type="text" id="incomes" name="incomes" class="form-control" autocomplete="off"
                                style="text-align: center" disabled />
                        </th>
                    </tr>
                    <tr>
                        <th>کسر می شود</th>
                        <th style="text-align: right">هزینه ها</th>
                        <th>
                            <input type="text" id="costs" name="costs" class="form-control" autocomplete="off"
                                style="text-align: center" disabled />
                        </th>
                    </tr>

                    <tr style="background-color: azure; color: red;">
                        <th>برقرار است</th>
                        <th style="text-align: right">سود ویژه (نهایی)</th>
                        <th>
                            <input type="text" id="profit" name="profit" class="form-control" autocomplete="off"
                                style="text-align: center" disabled />
                        </th>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
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
        $(document).on('click', '.benefit_loss_bill_print', function(e) {
            e.preventDefault();
            var benefit_loss_bill_print_id = $(this).val();
            // console.log(benefit_loss_bill_print_id);

            $.ajax({
                type: "GET",
                url: "/benefit-loss-bill-print-pdf/" + benefit_loss_bill_print_id,
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.showInTable', function(e) {
                e.preventDefault();
                var data = {
                    'from_date': $('#from_date').val(),
                    'to_date': $('#to_date').val(),
                }

                $.ajax({
                    type: "GET",
                    url: "/benefit-loss-bill-invoice",
                    data: data,
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
                            $('#inventory_first_period').val(response.data
                                .inventory_first_period);
                            $('#buy_total').val(response.data.buy_total);
                            $('#inventory_warehouse').val(response.data.inventory_warehouse);
                            $('#sold_price1').val(response.data.sold_price1);
                            $('#sell_total').val(response.data.sell_total);
                            $('#sold_price2').val(response.data.sold_price2);
                            $('#special_interest1').val(response.data.special_interest1);
                            $('#special_interest2').val(response.data.special_interest2);
                            $('#incomes').val(response.data.incomes);
                            $('#costs').val(response.data.costs);
                            $('#profit').val(response.data.profit);
                        }
                    },

                    error: function(errors) {
                        clearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#" + key + "_error").text(err_values[0]);
                            $("#" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        function clearErrors() {
            $("#from_date_error").text("");
            $("#from_date").removeClass("is-invalid");
            $("#to_date_error").text("");
            $("#to_date").removeClass("is-invalid");
        }
    </script>
@endpush
