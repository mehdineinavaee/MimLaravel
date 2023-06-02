<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">کالای جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="add_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="add_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_code">کد کالا</label>
                            <input type="text" id="add_code" name="add_code" class="form-control"
                                autocomplete="off" />
                            <div id="add_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="add_main_group">گروه اصلی</label>
                                <input type="text" id="add_main_group" name="add_main_group" class="form-control"
                                    autocomplete="off" />
                                <div id="add_main_group_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_sub_group">گروه فرعی</label>
                            <input type="text" id="add_sub_group" name="add_sub_group" class="form-control"
                                autocomplete="off" />
                            <div id="add_sub_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product">نام کالا</label>
                            <input type="text" id="add_product_name" name="add_product_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product_unit">واحد کالا</label>
                            <select id="add_product_unit" name="add_product_unit" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>واحد کالا را انتخاب کنید</option>
                                @foreach ($product_unit as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_product_unit_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_sell_price">فی فروش</label>
                            <input type="text" id="add_sell_price" name="add_sell_price" class="form-control"
                                onkeyup="separateNum(this.value,this,'add_sell_price_price');" autocomplete="off" />
                            <div id="add_sell_price_error" class="invalid-feedback"></div>
                            <div id="add_sell_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_value_added_group">گروه ارزش افزوده</label>
                            <input type="text" id="add_value_added_group" name="add_value_added_group"
                                class="form-control" autocomplete="off" />
                            <div id="add_value_added_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_introduce_date">تاریخ معرفی</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_introduce_date" name="add_introduce_date"
                                    class="form-control leftToRight leftAlign inputMaskDate" autocomplete="off" />
                                <div id="add_introduce_date_error" style="margin-right:38px;"
                                    class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_latest_buy_price">آخرین قیمت خرید</label>
                            <input type="text" id="add_latest_buy_price" name="add_latest_buy_price"
                                class="form-control"
                                onkeyup="separateNum(this.value,this,'add_latest_buy_price_price');"
                                autocomplete="off" />
                            <div id="add_latest_buy_price_error" class="invalid-feedback"></div>
                            <div id="add_latest_buy_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_main_barcode">بارکد اصلی</label>
                            <input type="text" id="add_main_barcode" name="add_main_barcode" class="form-control"
                                autocomplete="off" />
                            <div id="add_main_barcode_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_order_point">نقطه سفارش</label>
                            <input type="text" id="add_order_point" name="add_order_point" class="form-control"
                                autocomplete="off" />
                            <div id="add_order_point_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addProduct">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addProduct', function(e) {
                e.preventDefault();

                if (document.getElementById("add_activeCheckBox").checked) {
                    var add_activeCheckBox = "فعال";
                } else {
                    var add_activeCheckBox = "غیرفعال";
                }

                var data = {
                    'chk_active': add_activeCheckBox,
                    'code': $('#add_code').val(),
                    'main_group': $('#add_main_group').val(),
                    'sub_group': $('#add_sub_group').val(),
                    'product_name': $('#add_product_name').val(),
                    'sell_price': $('#add_sell_price').val(),
                    'value_added_group': $('#add_value_added_group').val(),
                    'introduce_date': $('#add_introduce_date').val(),
                    'latest_buy_price': $('#add_latest_buy_price').val(),
                    'main_barcode': $('#add_main_barcode').val(),
                    'order_point': $('#add_order_point').val(),
                    'product_unit': $('#add_product_unit').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/products",
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
                                add_clearPrice();
                                add_defaultSelectedValue();
                                fetchData();
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
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_code_error").text("");
            $("#add_code").removeClass("is-invalid");
            $("#add_main_group_error").text("");
            $("#add_main_group").removeClass("is-invalid");
            $("#add_sub_group_error").text("");
            $("#add_sub_group").removeClass("is-invalid");
            $("#add_product_name_error").text("");
            $("#add_product_name").removeClass("is-invalid");
            $("#add_product_unit_error").text("");
            $("#add_product_unit").removeClass("is-invalid");
            $("#add_sell_price_error").text("");
            $("#add_sell_price").removeClass("is-invalid");
            $("#add_value_added_group_error").text("");
            $("#add_value_added_group").removeClass("is-invalid");
            $("#add_introduce_date_error").text("");
            $("#add_introduce_date").removeClass("is-invalid");
            $("#add_latest_buy_price_error").text("");
            $("#add_latest_buy_price").removeClass("is-invalid");
            $("#add_main_barcode_error").text("");
            $("#add_main_barcode").removeClass("is-invalid");
            $("#add_order_point_error").text("");
            $("#add_order_point").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_sell_price_price").text("");
            $("#add_latest_buy_price_price").text("");
        }

        function add_defaultSelectedValue() {
            $('#add_activeCheckBox').prop('checked', false);
            $(add_product_unit).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
