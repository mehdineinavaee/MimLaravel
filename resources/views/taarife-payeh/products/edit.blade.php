<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش پرسنل</h5>
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
                            <input type="text" id="edit_product_unit" name="edit_product_unit" class="form-control"
                                autocomplete="off" />
                            <div id="edit_product_unit_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_price">فی فروش</label>
                            <input type="text" id="edit_price" name="edit_price" class="form-control"
                                autocomplete="off" />
                            <div id="edit_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_group">گروه ارزش افزوده</label>
                            <input type="text" id="edit_group" name="edit_group" class="form-control"
                                autocomplete="off" />
                            <div id="edit_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_birthdate">تاریخ معرفی</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_birthdate" name="edit_birthdate" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_occupation">آخرین قیمت خرید</label>
                            <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="edit_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_occupation">بارکد اصلی</label>
                            <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="edit_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_occupation">نقطه سفارش</label>
                            <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="edit_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateProduct">تأیید</button>
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
            $("#editInfo").modal("show");

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
                        $("#edit_product_id").val(product_id);
                        $("#edit_code").val(response.product.code);
                        $("#edit_product_name").val(response.product.product_name);
                        $("#edit_product_unit").val(response.product.product_unit);
                    }
                },
            });
        });

        $(document).on("click", ".updateProduct", function(e) {
            e.preventDefault();
            var product_id = $("#edit_product_id").val();
            var data = {
                code: $("#edit_code").val(),
                product_name: $("#edit_product_name").val(),
                product_unit: $("#edit_product_unit").val(),
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
                    Swal.fire(
                            response.message,
                            response.status,
                            'success'
                        )
                        .then((result) => {
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            fetchProducts();
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
            $("#edit_code_error").text("");
            $("#edit_code").removeClass("is-invalid");
            $("#edit_product_name_error").text("");
            $("#edit_product_name").removeClass("is-invalid");
            $("#edit_product_unit_error").text("");
            $("#edit_product_unit").removeClass("is-invalid");
        }
    </script>
@endpush
