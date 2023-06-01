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
                    <input type="hidden" id="edit_staff_id">
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
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important; !important">
                            <div class="form-group">
                                <label for="opt1">
                                    <input class="form-check-input" type="radio" name="group1" id="opt1">
                                    مرد
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important; !important">
                            <div class="form-group">
                                <label for="opt2">
                                    <input class="form-check-input" type="radio" name="group1" id="opt2">
                                    زن
                                </label>
                            </div>
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
                                <input type="text" id="edit_birthdate" name="edit_birthdate" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_national_code">شماره شناسنامه</label>
                            <input type="text" id="edit_national_code" name="edit_national_code"
                                class="form-control" autocomplete="off" />
                            <div id="edit_national_code_error" class="invalid-feedback"></div>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateStaff">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_staff', function(e) {
            e.preventDefault();
            var staff_id = $(this).val();
            // console.log(staff_id);

            $.ajax({
                type: "GET",
                url: "/staff/" + staff_id + "/edit",
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

                        $("#edit_staff_id").val(staff_id);
                        $("#edit_first_name").val(response.staff.first_name);
                        $("#edit_last_name").val(response.staff.last_name);
                        $("#edit_father").val(response.staff.father);
                    }
                },
            });
        });

        $(document).on("click", ".updateStaff", function(e) {
            e.preventDefault();
            var staff_id = $("#edit_staff_id").val();
            var data = {
                first_name: $("#edit_first_name").val(),
                last_name: $("#edit_last_name").val(),
                father: $("#edit_father").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/staff/" + staff_id,
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
                            fetchStaff();
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
            $("#edit_first_name_error").text("");
            $("#edit_first_name").removeClass("is-invalid");
            $("#edit_last_name_error").text("");
            $("#edit_last_name").removeClass("is-invalid");
            $("#edit_father_error").text("");
            $("#edit_father").removeClass("is-invalid");
        }
    </script>
@endpush
