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
                            <input type="text" id="add_product_unit" name="add_product_unit" class="form-control"
                                autocomplete="off" />
                            <div id="add_product_unit_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_price">فی فروش</label>
                            <input type="text" id="add_price" name="add_price" class="form-control"
                                autocomplete="off" />
                            <div id="add_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_group">گروه ارزش افزوده</label>
                            <input type="text" id="add_group" name="add_group" class="form-control"
                                autocomplete="off" />
                            <div id="add_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_birthdate">تاریخ معرفی</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_birthdate" name="add_birthdate" class="form-control"
                                    autocomplete="off" />
                                <div id="add_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_occupation">آخرین قیمت خرید</label>
                            <input type="text" id="add_occupation" name="add_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="add_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_occupation">بارکد اصلی</label>
                            <input type="text" id="add_occupation" name="add_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="add_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_occupation">نقطه سفارش</label>
                            <input type="text" id="add_occupation" name="add_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="add_occupation_error" class="invalid-feedback"></div>
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

                var data = {
                    'code': $('#add_code').val(),
                    'product_name': $('#add_product_name').val(),
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
                                fetchProducts();
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
            $("#add_code_error").text("");
            $("#add_code").removeClass("is-invalid");
            $("#add_product_name_error").text("");
            $("#add_product_name").removeClass("is-invalid");
            $("#add_product_unit_error").text("");
            $("#add_product_unit").removeClass("is-invalid");
        }
    </script>
@endpush
