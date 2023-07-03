<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش خدمات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_service_id">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_service_code">کد خدمات</label>
                            <input type="text" id="edit_service_code" name="edit_service_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_service_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_service_name">نام خدمات</label>
                                <input type="text" id="edit_service_name" name="edit_service_name"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_service_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_price">قیمت ارائه خدمات</label>
                            <input type="text" id="edit_price" name="edit_price" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_price_price');" />
                            <div id="edit_price_error" class="invalid-feedback"></div>
                            <div id="edit_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_group">گروه ارزش افزوده</label>
                            <input type="text" id="edit_group" name="edit_group" class="form-control"
                                autocomplete="off" />
                            <div id="edit_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateService">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_service', function(e) {
            e.preventDefault();
            var service_id = $(this).val();
            // console.log(service_id);

            $.ajax({
                type: "GET",
                url: "/services/" + service_id + "/edit",
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

                        if (response.service.chk_active == "فعال") {
                            $('#edit_activeCheckBox').prop('checked', true);
                        } else {
                            $('#edit_activeCheckBox').prop('checked', false);
                        }

                        $("#edit_service_id").val(service_id);
                        $("#edit_service_code").val(response.service.service_code);
                        $("#edit_service_name").val(response.service.service_name);
                        $('#edit_price').val(new Intl.NumberFormat().format(response.service
                            .price));
                        $("#edit_group").val(response.service.group);
                    }
                },
            });
        });

        $(document).on("click", ".updateService", function(e) {
            e.preventDefault();
            var service_id = $("#edit_service_id").val();

            if (document.getElementById("edit_activeCheckBox").checked) {
                var edit_activeCheckBox = "فعال";
            } else {
                var edit_activeCheckBox = "غیرفعال";
            }

            var data = {
                chk_active: edit_activeCheckBox,
                service_code: $("#edit_service_code").val(),
                service_name: $("#edit_service_name").val(),
                price: $("#edit_price").val(),
                group: $("#edit_group").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/services/" + service_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/services',
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
            $("#edit_service_code_error").text("");
            $("#edit_service_code").removeClass("is-invalid");
            $("#edit_service_name_error").text("");
            $("#edit_service_name").removeClass("is-invalid");
            $("#edit_price_error").text("");
            $("#edit_price").removeClass("is-invalid");
            $("#edit_group_error").text("");
            $("#edit_group").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_price_price").text("");
        }

        function edit_defaultSelectedValue() {
            $('#edit_activeCheckBox').prop('checked', false);
        }
    </script>
@endpush
