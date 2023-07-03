<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">مخاطب جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_contact">نام مخاطب</label>
                            <input type="text" id="add_contact" name="add_contact" class="form-control"
                                autocomplete="off" />
                            <div id="add_contact_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="add_main_contact">مخاطب اصلی</label>
                                <input type="text" id="add_main_contact" name="add_main_contact" class="form-control"
                                    autocomplete="off" />
                                <div id="add_main_contact_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_occupation">شغل</label>
                            <input type="text" id="add_occupation" name="add_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="add_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_mobile">موبایل</label>
                            <input type="text" id="add_mobile" name="add_mobile"
                                class="form-control leftToRight rightAlign inputMaskPhone" autocomplete="off" />
                            <div id="add_mobile_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_fax">فاکس</label>
                            <input type="text" id="add_fax" name="add_fax"
                                class="form-control leftToRight rightAlign inputMaskFax" autocomplete="off" />
                            <div id="add_fax_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_tel">تلفن</label>
                            <input type="text" id="add_tel" name="add_tel"
                                class="form-control leftToRight rightAlign inputMaskTel" autocomplete="off" />
                            <div id="add_tel_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_activity_type">نوع فعالیت</label>
                            <input type="text" id="add_activity_type" name="add_activity_type" class="form-control"
                                autocomplete="off" />
                            <div id="add_activity_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_email">ایمیل</label>
                            <input type="text" id="add_email" name="add_email" class="form-control"
                                autocomplete="off" />
                            <div id="add_email_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_website">وب سایت</label>
                            <input type="text" id="add_website" name="add_website" class="form-control"
                                autocomplete="off" />
                            <div id="add_website_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_address">آدرس</label>
                            <input type="text" id="add_address" name="add_address" class="form-control"
                                autocomplete="off" />
                            <div id="add_address_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addPhoneBook">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addPhoneBook', function(e) {
                e.preventDefault();

                var data = {
                    'contact': $('#add_contact').val(),
                    'main_contact': $('#add_main_contact').val(),
                    'occupation': $('#add_occupation').val(),
                    'mobile': $('#add_mobile').val(),
                    'fax': $('#add_fax').val(),
                    'tel': $('#add_tel').val(),
                    'activity_type': $('#add_activity_type').val(),
                    'email': $('#add_email').val(),
                    'website': $('#add_website').val(),
                    'address': $('#add_address').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/phone-book",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        fetchDataAsPaginate
                            (
                                'index_search',
                                '/phone-book',
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
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
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

        // call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        // call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_contact_error").text("");
            $("#add_contact").removeClass("is-invalid");
            $("#add_main_contact_error").text("");
            $("#add_main_contact").removeClass("is-invalid");
            $("#add_occupation_error").text("");
            $("#add_occupation").removeClass("is-invalid");
            $("#add_mobile_error").text("");
            $("#add_mobile").removeClass("is-invalid");
            $("#add_fax_error").text("");
            $("#add_fax").removeClass("is-invalid");
            $("#add_tel_error").text("");
            $("#add_tel").removeClass("is-invalid");
            $("#add_activity_type_error").text("");
            $("#add_activity_type").removeClass("is-invalid");
            $("#add_email_error").text("");
            $("#add_email").removeClass("is-invalid");
            $("#add_website_error").text("");
            $("#add_website").removeClass("is-invalid");
            $("#add_address_error").text("");
            $("#add_address").removeClass("is-invalid");
        }
    </script>
@endpush
