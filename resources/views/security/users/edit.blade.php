<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش کاربر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_user_id">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_activeCheckBox">
                                فعال
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_messengerCheckBox">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="edit_messengerCheckBox">
                                پیک
                            </label>
                        </div>
                    </div>
                    <div class="border border-1 box col-lg-12 col-md-12 col-sm-12">
                        <label>جنسیت</label>
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important;">
                            <div class="form-group">
                                <label for="edit_opt1">
                                    <input class="form-check-input" type="radio" name="group1" id="edit_opt1">
                                    مرد
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important;">
                            <div class="form-group">
                                <label for="edit_opt2">
                                    <input class="form-check-input" type="radio" name="group1" id="edit_opt2">
                                    زن
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_role">نقش کاربر</label>
                            <select id="edit_role" name="edit_role" class="form-control">
                                <option value="" selected>نقش را انتخاب کنید
                                </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->role_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_role_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_national_code">شماره شناسنامه</label>
                            <input type="text" id="edit_national_code" name="edit_national_code"
                                class="leftToRight rightAlign inputMaskNationalCode form-control" autocomplete="off" />
                            <div id="edit_national_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_first_name">نام</label>
                            <input type="text" id="edit_first_name" name="edit_first_name" class="form-control"
                                autocomplete="off" />
                            <div id="edit_first_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_last_name">نام خانوادگی</label>
                                <input type="text" id="edit_last_name" name="edit_last_name" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_last_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_father">نام پدر</label>
                            <input type="text" id="edit_father" name="edit_father" class="form-control"
                                autocomplete="off" />
                            <div id="edit_father_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_birthdate">تاریخ تولد</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_birthdate" name="edit_birthdate"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_occupation">شغل</label>
                            <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                                autocomplete="off" />
                            <div id="edit_occupation_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateUser">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_user', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);

            $.ajax({
                type: "GET",
                url: "/users/" + user_id + "/edit",
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

                        if (response.user.chk_active == "فعال") {
                            $('#edit_activeCheckBox').prop('checked', true);
                        } else {
                            $('#edit_activeCheckBox').prop('checked', false);
                        }

                        if (response.user.chk_messenger == "فعال") {
                            $('#edit_messengerCheckBox').prop('checked', true);
                        } else {
                            $('#edit_messengerCheckBox').prop('checked', false);
                        }

                        if (response.user.opt_sex == "مرد") {
                            $('#edit_opt1').prop('checked', true);
                        }

                        if (response.user.opt_sex == "زن") {
                            $('#edit_opt2').prop('checked', true);
                        }

                        $("#edit_user_id").val(user_id);
                        $('#edit_role').val(response.user.role_id).change();
                        $("#edit_national_code").val(response.user.national_code);
                        $("#edit_first_name").val(response.user.first_name);
                        $("#edit_last_name").val(response.user.last_name);
                        $("#edit_father").val(response.user.father);
                        $("#edit_birthdate").val(response.user.birthdate);
                        $("#edit_occupation").val(response.user.occupation);
                        $("#edit_email").val(response.user.email);
                    }
                },
            });
        });

        $(document).on("click", ".updateUser", function(e) {
            e.preventDefault();
            var user_id = $("#edit_user_id").val();

            if (document.getElementById("edit_activeCheckBox").checked) {
                var edit_activeCheckBox = "فعال";
            } else {
                var edit_activeCheckBox = "غیرفعال";
            }

            if (document.getElementById("edit_messengerCheckBox").checked) {
                var edit_messengerCheckBox = "فعال";
            } else {
                var edit_messengerCheckBox = "غیرفعال";
            }

            if ($('#edit_opt1').is(':checked')) {
                var edit_opt_sex = "مرد";
            } else if ($('#edit_opt2').is(':checked')) {
                var edit_opt_sex = "زن";
            } else {
                var edit_opt_sex = "غیرفعال";
            }

            var data = {
                chk_active: edit_activeCheckBox,
                chk_messenger: edit_messengerCheckBox,
                role: $('#edit_role').val(),
                national_code: $('#edit_national_code').val(),
                first_name: $("#edit_first_name").val(),
                last_name: $("#edit_last_name").val(),
                father: $("#edit_father").val(),
                opt_sex: edit_opt_sex,
                birthdate: $('#edit_birthdate').val(),
                occupation: $('#edit_occupation').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/users/" + user_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/users',
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
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_role_error").text("");
            $("#edit_role").removeClass("is-invalid");
            $("#edit_first_name_error").text("");
            $("#edit_first_name").removeClass("is-invalid");
            $("#edit_last_name_error").text("");
            $("#edit_last_name").removeClass("is-invalid");
            $("#edit_father_error").text("");
            $("#edit_father").removeClass("is-invalid");
            $("#edit_birthdate_error").text("");
            $("#edit_birthdate").removeClass("is-invalid");
            $("#edit_national_code_error").text("");
            $("#edit_national_code").removeClass("is-invalid");
            $("#edit_occupation_error").text("");
            $("#edit_occupation").removeClass("is-invalid");
        }

        function edit_defaultSelectedValue() {
            $('#edit_activeCheckBox').prop('checked', false);
            $('#edit_messengerCheckBox').prop('checked', false);
            $('#edit_opt1').prop('checked', false);
            $('#edit_opt2').prop('checked', false);
            $(edit_role).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
