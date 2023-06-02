<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش فاکتور برگشت از فروش</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="edit_return_sell_factor_id">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_customer_type">نوع مشتری</label>
                            <select id="edit_customer_type" name="edit_customer_type" class="form-control select2"
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
                            <div id="edit_customer_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_buyer">خریدار</label>
                            <select id="edit_buyer" name="edit_buyer" class="form-control select2" style="width: 100%;">
                                <option value="" selected>خریدار را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    خریدار 1
                                </option>
                                <option value="2">
                                    خریدار 2
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="edit_buyer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_factor_no">شماره فاکتور</label>
                            <input type="text" id="edit_factor_no" name="edit_factor_no" class="form-control"
                                autocomplete="off" />
                            <div id="edit_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_factor_date">تاریخ فاکتور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_factor_date" name="edit_factor_date"
                                    class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_factor_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_broker">واسطه فروش</label>
                            <select id="edit_broker" name="edit_broker" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    واسطه فروش 1
                                </option>
                                <option value="2">
                                    واسطه فروش 2
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="edit_broker_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_commission">پورسانت</label>
                            <input type="text" id="edit_commission" name="edit_commission" class="form-control"
                                autocomplete="off" />
                            <div id="edit_commission_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product_code">کد کالا</label>
                            <input type="text" id="edit_product_code" name="edit_product_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product_name">نام کالا</label>
                            <select id="edit_product_name" name="edit_product_name" class="form-control select2"
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
                            <div id="edit_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_amount">مقدار</label>
                            <input type="text" id="edit_amount" name="edit_amount" class="form-control"
                                autocomplete="off" />
                            <div id="edit_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_sell_price">بهای واحد</label>
                            <input type="text" id="edit_sell_price" name="edit_sell_price" class="form-control"
                                autocomplete="off" />
                            <div id="edit_sell_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_discount">درصد تخفیف</label>
                            <input type="text" id="edit_discount" name="edit_discount" class="form-control"
                                autocomplete="off" />
                            <div id="edit_discount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_total">مبلغ کل</label>
                            <input type="text" id="edit_total" name="edit_total" class="form-control"
                                autocomplete="off" />
                            <div id="edit_total_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_warehouse_name">نام انبار</label>
                            <select id="edit_warehouse_name" name="edit_warehouse_name" class="form-control select2"
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
                            <div id="edit_warehouse_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_considerations">ملاحظات</label>
                            <input type="text" id="edit_considerations" name="edit_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="edit_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateReturnSellFactor">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_sell_factor', function(e) {
            e.preventDefault();
            var return_sell_factor_id = $(this).val();
            // console.log(return_sell_factor_id);

            $.ajax({
                type: "GET",
                url: "/return-sell-factor/" + return_sell_factor_id + "/edit",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#editInfo").modal("show");

                        $("#edit_sell_factor_id").val(sell_factor_id);
                        $("#edit_customer_type").val(response.sell_factor
                            .customer_type);
                        $("#edit_buyer").val(response.sell_factor.buyer);
                        $("#edit_factor_no").val(response.sell_factor.factor_no);
                        $("#edit_factor_date").val(response.sell_factor.factor_date);
                        $("#edit_broker").val(response.sell_factor
                            .broker);
                        $("#edit_commission").val(response.sell_factor
                            .commission);
                        $("#edit_amount").val(response.sell_factor.amount);
                        $("#edit_discount").val(response.sell_factor.discount);
                        $("#edit_total").val(response.sell_factor.total);
                        $("#edit_warehouse_name").val(response.sell_factor
                            .warehouse_name);
                        $("#edit_considerations").val(response.sell_factor.considerations);
                        $("#edit_settlement_deadline").val(response.sell_factor.settlement_deadline);
                        $("#edit_settlement_date").val(response.sell_factor
                            .settlement_date);
                    }
                },
            });
        });

        $(document).on("click", ".updateReturnSellFactor", function(e) {
            e.preventDefault();
            var return_sell_factor_id = $("#edit_return_sell_factor_id").val();
            var data = {
                customer_type: $('#edit_customer_type').val(),
                buyer: $('#edit_buyer').val(),
                factor_no: $('#edit_factor_no').val(),
                factor_date: $('#edit_factor_date').val(),
                broker: $('#edit_broker').val(),
                commission: $('#edit_commission').val(),
                amount: $('#edit_amount').val(),
                discount: $('#edit_discount').val(),
                total: $('#edit_total').val(),
                warehouse_name: $('#edit_warehouse_name').val(),
                considerations: $('#edit_considerations').val(),
                settlement_deadline: $('#edit_settlement_deadline').val(),
                settlement_date: $('#edit_settlement_date').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/return-sell-factor/" + return_sell_factor_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    Swal.fire(
                            response.message,
                            response.status,
                            'success'
                        )
                        .then((result) => {
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            fetchData();
                        });
                },
                error: function(errors) {
                    edit_clearErrors();
                    $.each(errors.responseJSON.errors, function(key, err_values) {
                        // console.log(key);
                        // console.log(err_values);
                        $("#edit_" + key + "_error").text(err_values[0]);
                        $("#edit_" + key).addClass("is-invalid");
                    });
                }
            });
        });

        //call function on modal shown
        $('#editInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_clearErrors();
        })

        function edit_clearErrors() {
            $("#edit_customer_type_error").text("");
            $("#edit_customer_type").removeClass("is-invalid");
            $("#edit_buyer_error").text("");
            $("#edit_buyer").removeClass("is-invalid");
            $("#edit_factor_no_error").text("");
            $("#edit_factor_no").removeClass("is-invalid");
            $("#edit_factor_date_error").text("");
            $("#edit_factor_date").removeClass("is-invalid");
            $("#edit_broker_error").text("");
            $("#edit_broker").removeClass("is-invalid");
            $("#edit_commission_error").text("");
            $("#edit_commission").removeClass("is-invalid");
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_discount_error").text("");
            $("#edit_discount").removeClass("is-invalid");
            $("#edit_total_error").text("");
            $("#edit_total").removeClass("is-invalid");
            $("#edit_warehouse_name_error").text("");
            $("#edit_warehouse_name").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
            $("#edit_settlement_deadline_error").text("");
            $("#edit_settlement_deadline").removeClass("is-invalid");
            $("#edit_settlement_date_error").text("");
            $("#edit_settlement_date").removeClass("is-invalid");
        }
    </script>
@endpush
