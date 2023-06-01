<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">برگشت از فروش جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_customer_type">نوع مشتری</label>
                            <select id="add_customer_type" name="add_customer_type" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نوع مشتری را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    مشتری دائم
                                </option>
                                <option value="2">
                                    مشتری رهگذر
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_customer_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_buyer">خریدار</label>
                            <select id="add_buyer" name="add_buyer" class="form-control select2" style="width: 100%;">
                                <option value="" selected>خریدار را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_buyer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_no">شماره فاکتور</label>
                            <input type="text" id="add_factor_no" name="add_factor_no" class="form-control"
                                autocomplete="off" />
                            <div id="add_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_date">تاریخ فاکتور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_factor_date" name="add_factor_date"
                                    class="normal-example form-control" autocomplete="off" />
                                <div id="add_factor_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_broker">واسطه فروش</label>
                            <select id="add_broker" name="add_broker" class="form-control select2" style="width: 100%;">
                                <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                @foreach ($vasete_foroosh as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_broker_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_commission">پورسانت</label>
                            <input type="text" id="add_commission" name="add_commission" class="form-control"
                                autocomplete="off" />
                            <div id="add_commission_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product_code">کد کالا</label>
                            <input type="text" id="add_product_code" name="add_product_code" class="form-control"
                                autocomplete="off" />
                            <div id="add_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product_name">نام کالا</label>
                            <select id="add_product_name" name="add_product_name" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام کالا را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    کالا 1
                                </option>
                                <option value="2">
                                    کالا 2
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_amount">مقدار</label>
                            <input type="text" id="add_amount" name="add_amount" class="form-control"
                                autocomplete="off" />
                            <div id="add_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_sell_price">بهای واحد</label>
                            <input type="text" id="add_sell_price" name="add_sell_price" class="form-control"
                                autocomplete="off" />
                            <div id="add_sell_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_discount">درصد تخفیف</label>
                            <input type="text" id="add_discount" name="add_discount" class="form-control"
                                autocomplete="off" />
                            <div id="add_discount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_total">مبلغ کل</label>
                            <input type="text" id="add_total" name="add_total" class="form-control"
                                autocomplete="off" />
                            <div id="add_total_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_warehouse_name">نام انبار</label>
                            <select id="add_warehouse_name" name="add_warehouse_name" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    انبار 1
                                </option>
                                <option value="2">
                                    انبار 2
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_warehouse_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_considerations">ملاحظات</label>
                            <input type="text" id="add_considerations" name="add_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="add_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addReturnSellFactor">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addReturnSellFactor', function(e) {
                e.preventDefault();

                var data = {
                    'customer_type': $('#add_customer_type').val(),
                    'buyer': $('#add_buyer').val(),
                    'factor_no': $('#add_factor_no').val(),
                    'factor_date': $('#add_factor_date').val(),
                    'broker': $('#add_broker').val(),
                    'commission': $('#add_commission').val(),
                    'amount': $('#add_amount').val(),
                    'discount': $('#add_discount').val(),
                    'total': $('#add_total').val(),
                    'warehouse_name': $('#add_warehouse_name').val(),
                    'considerations': $('#add_considerations').val(),
                    'settlement_deadline': $('#add_settlement_deadline').val(),
                    'settlement_date': $('#add_settlement_date').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/return-sell-factor",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                fetchSellFactor();
                            });
                    },

                    error: function(errors) {
                        add_clearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#add_" + key + "_error").text(err_values[0]);
                            $("#add_" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        //call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
        })

        function add_clearErrors() {
            $("#add_customer_type_error").text("");
            $("#add_customer_type").removeClass("is-invalid");
            $("#add_buyer_error").text("");
            $("#add_buyer").removeClass("is-invalid");
            $("#add_factor_no_error").text("");
            $("#add_factor_no").removeClass("is-invalid");
            $("#add_factor_date_error").text("");
            $("#add_factor_date").removeClass("is-invalid");
            $("#add_broker_error").text("");
            $("#add_broker").removeClass("is-invalid");
            $("#add_commission_error").text("");
            $("#add_commission").removeClass("is-invalid");
            $("#add_amount_error").text("");
            $("#add_amount").removeClass("is-invalid");
            $("#add_discount_error").text("");
            $("#add_discount").removeClass("is-invalid");
            $("#add_total_error").text("");
            $("#add_total").removeClass("is-invalid");
            $("#add_warehouse_name_error").text("");
            $("#add_warehouse_name").removeClass("is-invalid");
            $("#add_considerations_error").text("");
            $("#add_considerations").removeClass("is-invalid");
            $("#add_settlement_deadline_error").text("");
            $("#add_settlement_deadline").removeClass("is-invalid");
            $("#add_settlement_date_error").text("");
            $("#add_settlement_date").removeClass("is-invalid");
        }
    </script>
@endpush
