<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">تغییر رمز عبور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="update_old_password">رمز عبور فعلی</label>
                            <input type="password" id="update_old_password" name="update_old_password"
                                class="form-control" autocomplete="off" />
                            <div id="update_old_password_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="update_password">رمز عبور جدید</label>
                            <input type="password" id="update_password" name="update_password" class="form-control"
                                autocomplete="off" />
                            <div id="update_password_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="update_confirm_password">تکرار رمز عبور</label>
                            <input type="password" id="update_confirm_password" name="update_confirm_password"
                                class="form-control" autocomplete="off" />
                            <div id="update_confirm_password_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updatePassword">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on("click", ".updatePassword", function(e) {
            e.preventDefault();

            var data = {
                old_password: $('#update_old_password').val(),
                password: $('#update_password').val(),
                confirm_password: $('#update_confirm_password').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "/update-password",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: response.message
                        })
                    } else {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#editInfo").modal("hide");
                                $("#editInfo").find("input").val("");
                                update_clearErrors();
                            });
                    }
                },
                error: function(errors) {
                    update_clearErrors();
                    $.each(errors.responseJSON.errors, function(key, err_values) {
                        // console.log(key);
                        // console.log(err_values);
                        $("#update_" + key + "_error").text(err_values[0]);
                        $("#update_" + key).addClass("is-invalid");
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
            update_clearErrors();
            $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function update_clearErrors() {
            $("#update_old_password_error").text("");
            $("#update_old_password").removeClass("is-invalid");
            $("#update_password_error").text("");
            $("#update_password").removeClass("is-invalid");
            $("#update_confirm_password_error").text("");
            $("#update_confirm_password").removeClass("is-invalid");
        }
    </script>
@endpush
