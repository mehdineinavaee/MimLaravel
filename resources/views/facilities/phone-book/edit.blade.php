<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش مخاطب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_phone_book_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_contact">نام مخاطب</label>
                            <input type="text" id="edit_contact" name="edit_contact" class="form-control"
                                autocomplete="off" />
                            <div id="edit_contact_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_main_contact">مخاطب اصلی</label>
                                <input type="text" id="edit_main_contact" name="edit_main_contact"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_main_contact_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_occupation">شغل</label>
                            <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="edit_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_mobile">موبایل</label>
                            <input type="text" id="edit_mobile" name="edit_mobile"
                                class="form-control leftToRight leftAlign inputMaskPhone" autocomplete="off" />
                            <div id="edit_mobile_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_fax">فاکس</label>
                            <input type="text" id="edit_fax" name="edit_fax"
                                class="form-control leftToRight leftAlign inputMaskFax" autocomplete="off" />
                            <div id="edit_fax_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_tel">تلفن</label>
                            <input type="text" id="edit_tel" name="edit_tel"
                                class="form-control leftToRight leftAlign inputMaskTel" autocomplete="off" />
                            <div id="edit_tel_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_activity_type">نوع فعالیت</label>
                            <input type="text" id="edit_activity_type" name="edit_activity_type" class="form-control"
                                autocomplete="off" />
                            <div id="edit_activity_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_email">ایمیل</label>
                            <input type="text" id="edit_email" name="edit_email" class="form-control"
                                autocomplete="off" />
                            <div id="edit_email_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_website">وب سایت</label>
                            <input type="text" id="edit_website" name="edit_website" class="form-control"
                                autocomplete="off" />
                            <div id="edit_website_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_address">آدرس</label>
                            <input type="text" id="edit_address" name="edit_address" class="form-control"
                                autocomplete="off" />
                            <div id="edit_address_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updatePhoneBook">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_phone_book', function(e) {
            e.preventDefault();
            var phone_book_id = $(this).val();
            // console.log(phone_book_id);

            $.ajax({
                type: "GET",
                url: "/phone-book/" + phone_book_id + "/edit",
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
                        $("#edit_phone_book_id").val(phone_book_id);
                        $("#edit_contact").val(response.phone_book.contact);
                        $("#edit_main_contact").val(response.phone_book.main_contact);
                        $("#edit_occupation").val(response.phone_book.occupation);
                        $("#edit_mobile").val(response.phone_book.mobile);
                        $("#edit_fax").val(response.phone_book.fax);
                        $("#edit_tel").val(response.phone_book.tel);
                        $("#edit_activity_type").val(response.phone_book.activity_type);
                        $("#edit_email").val(response.phone_book.email);
                        $("#edit_website").val(response.phone_book.website);
                        $("#edit_address").val(response.phone_book.address);
                    }
                },
            });
        });

        $(document).on("click", ".updatePhoneBook", function(e) {
            e.preventDefault();
            var phone_book_id = $("#edit_phone_book_id").val();
            var data = {
                contact: $('#edit_contact').val(),
                main_contact: $('#edit_main_contact').val(),
                occupation: $('#edit_occupation').val(),
                mobile: $('#edit_mobile').val(),
                fax: $('#edit_fax').val(),
                tel: $('#edit_tel').val(),
                activity_type: $('#edit_activity_type').val(),
                email: $('#edit_email').val(),
                website: $('#edit_website').val(),
                address: $('#edit_address').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/phone-book/" + phone_book_id,
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
            $("#edit_contact_error").text("");
            $("#edit_contact").removeClass("is-invalid");
            $("#edit_main_contact_error").text("");
            $("#edit_main_contact").removeClass("is-invalid");
            $("#edit_occupation_error").text("");
            $("#edit_occupation").removeClass("is-invalid");
            $("#edit_mobile_error").text("");
            $("#edit_mobile").removeClass("is-invalid");
            $("#edit_fax_error").text("");
            $("#edit_fax").removeClass("is-invalid");
            $("#edit_tel_error").text("");
            $("#edit_tel").removeClass("is-invalid");
            $("#edit_activity_type_error").text("");
            $("#edit_activity_type").removeClass("is-invalid");
            $("#edit_email_error").text("");
            $("#edit_email").removeClass("is-invalid");
            $("#edit_website_error").text("");
            $("#edit_website").removeClass("is-invalid");
            $("#edit_address_error").text("");
            $("#edit_address").removeClass("is-invalid");
        }
    </script>
@endpush
