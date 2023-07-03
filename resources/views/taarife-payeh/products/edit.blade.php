<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش کالا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_product_id">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_code">کد کالا</label>
                            <input type="text" id="edit_code" name="edit_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_main_group">گروه اصلی</label>
                                <input type="text" id="edit_main_group" name="edit_main_group" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_main_group_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_sub_group">گروه فرعی</label>
                            <input type="text" id="edit_sub_group" name="edit_sub_group" class="form-control"
                                autocomplete="off" />
                            <div id="edit_sub_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product">نام کالا</label>
                            <input type="text" id="edit_product_name" name="edit_product_name" class="form-control"
                                autocomplete="off" />
                            <div id="edit_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product_unit">واحد کالا</label>
                            <select id="edit_product_unit" name="edit_product_unit" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>واحد کالا را انتخاب کنید</option>
                                @foreach ($product_unit as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_product_unit_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_sell_price">فی فروش</label>
                            <input type="text" id="edit_sell_price" name="edit_sell_price" class="form-control"
                                onkeyup="separateNum(this.value,this,'edit_sell_price_price');" autocomplete="off" />
                            <div id="edit_sell_price_error" class="invalid-feedback"></div>
                            <div id="edit_sell_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_value_added_group">گروه ارزش افزوده</label>
                            <input type="text" id="edit_value_added_group" name="edit_value_added_group"
                                class="form-control" autocomplete="off" />
                            <div id="edit_value_added_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_introduce_date">تاریخ معرفی</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_introduce_date" name="edit_introduce_date"
                                    class="form-control leftToRight rightAlign inputMaskDate" autocomplete="off" />
                                <div id="edit_introduce_date_error" style="margin-right:38px;"
                                    class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_latest_buy_price">آخرین قیمت خرید</label>
                            <input type="text" id="edit_latest_buy_price" name="edit_latest_buy_price"
                                class="form-control"
                                onkeyup="separateNum(this.value,this,'edit_latest_buy_price_price');"
                                autocomplete="off" />
                            <div id="edit_latest_buy_price_error" class="invalid-feedback"></div>
                            <div id="edit_latest_buy_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_main_barcode">بارکد اصلی</label>
                            <input type="text" id="edit_main_barcode" name="edit_main_barcode"
                                class="form-control" autocomplete="off" />
                            <div id="edit_main_barcode_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_order_point">نقطه سفارش</label>
                            <input type="text" id="edit_order_point" name="edit_order_point" class="form-control"
                                autocomplete="off" />
                            <div id="edit_order_point_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_warehouse_name">نام انبار</label>
                            <select id="edit_warehouse_name" name="edit_warehouse_name" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value={{ $warehouse->id }}>
                                        {{ $warehouse->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_warehouse_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateProduct">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_product', function(e) {
            e.preventDefault();
            var product_id = $(this).val();
            // console.log(product_id);

            $.ajax({
                type: "GET",
                url: "/products/" + product_id + "/edit",
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

                        if (response.product.chk_active == "فعال") {
                            $('#edit_activeCheckBox').prop('checked', true);
                        } else {
                            $('#edit_activeCheckBox').prop('checked', false);
                        }

                        $("#edit_product_id").val(product_id);
                        $("#edit_code").val(response.product.code);
                        $("#edit_main_group").val(response.product.main_group);
                        $("#edit_sub_group").val(response.product.sub_group);
                        $("#edit_product_name").val(response.product.product_name);
                        $('#edit_sell_price').val(new Intl.NumberFormat().format(response.product
                            .sell_price));
                        $("#edit_value_added_group").val(response.product.value_added_group);
                        $("#edit_introduce_date").val(response.product.introduce_date);
                        $('#edit_latest_buy_price').val(new Intl.NumberFormat().format(response.product
                            .latest_buy_price));
                        $("#edit_main_barcode").val(response.product.main_barcode);
                        $("#edit_order_point").val(response.product.order_point);
                        $('#edit_product_unit').val(response.product.product_unit_id).change();
                        $('#edit_warehouse_name').val(response.product.warehouse_id).change();
                    }
                },
            });
        });

        $(document).on("click", ".updateProduct", function(e) {
            e.preventDefault();

            if (document.getElementById("edit_activeCheckBox").checked) {
                var edit_activeCheckBox = "فعال";
            } else {
                var edit_activeCheckBox = "غیرفعال";
            }

            var product_id = $("#edit_product_id").val();

            var data = {
                chk_active: edit_activeCheckBox,
                code: $("#edit_code").val(),
                main_group: $("#edit_main_group").val(),
                sub_group: $("#edit_sub_group").val(),
                product_name: $("#edit_product_name").val(),
                sell_price: $("#edit_sell_price").val(),
                value_added_group: $("#edit_value_added_group").val(),
                introduce_date: $("#edit_introduce_date").val(),
                latest_buy_price: $("#edit_latest_buy_price").val(),
                main_barcode: $("#edit_main_barcode").val(),
                order_point: $("#edit_order_point").val(),
                product_unit: $("#edit_product_unit").val(),
                warehouse_name: $("#edit_warehouse_name").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/products/" + product_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/products',
                            1,
                            10,
                            'index_count',
                            'myData',
                            'index_pagination'
                        );
                    Swal.fire(
                            response.message,
                            response.status,
                            'success'
                        )
                        .then((result) => {
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            edit_clearPrice();
                            edit_defaultSelectedValue();
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

        // call function on modal shown
        $('#editInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        // call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_clearErrors();
            edit_clearPrice();
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_code_error").text("");
            $("#edit_code").removeClass("is-invalid");
            $("#edit_main_group_error").text("");
            $("#edit_main_group").removeClass("is-invalid");
            $("#edit_sub_group_error").text("");
            $("#edit_sub_group").removeClass("is-invalid");
            $("#edit_product_name_error").text("");
            $("#edit_product_name").removeClass("is-invalid");
            $("#edit_product_unit_error").text("");
            $("#edit_product_unit").removeClass("is-invalid");
            $("#edit_sell_price_error").text("");
            $("#edit_sell_price").removeClass("is-invalid");
            $("#edit_value_added_group_error").text("");
            $("#edit_value_added_group").removeClass("is-invalid");
            $("#edit_introduce_date_error").text("");
            $("#edit_introduce_date").removeClass("is-invalid");
            $("#edit_latest_buy_price_error").text("");
            $("#edit_latest_buy_price").removeClass("is-invalid");
            $("#edit_main_barcode_error").text("");
            $("#edit_main_barcode").removeClass("is-invalid");
            $("#edit_order_point_error").text("");
            $("#edit_order_point").removeClass("is-invalid");
            $("#edit_warehouse_name_error").text("");
            $("#edit_warehouse_name").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_sell_price_price").text("");
            $("#edit_latest_buy_price_price").text("");
        }

        function edit_defaultSelectedValue() {
            $('#edit_activeCheckBox').prop('checked', false);
            $(edit_product_unit).prop('selectedIndex', 0).change();
            $(edit_warehouse_name).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
