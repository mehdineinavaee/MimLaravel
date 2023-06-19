<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">پرسنل جدید</h5>
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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="add_messengerCheckBox">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="add_messengerCheckBox">
                                پیک
                            </label>
                        </div>
                    </div>
                    <div class="border border-1 box col-lg-12 col-md-12 col-sm-12">
                        <label>جنسیت</label>
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important;">
                            <div class="form-group">
                                <label for="add_opt1">
                                    <input class="form-check-input" type="radio" name="group1" id="add_opt1">
                                    مرد
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12" style="margin-right:2rem !important;">
                            <div class="form-group">
                                <label for="add_opt2">
                                    <input class="form-check-input" type="radio" name="group1" id="add_opt2">
                                    زن
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_first_name">نام</label>
                            <input type="text" id="add_first_name" name="add_first_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_first_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="add_last_name">نام خانوادگی</label>
                                <input type="text" id="add_last_name" name="add_last_name" class="form-control"
                                    autocomplete="off" />
                                <div id="add_last_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_father">نام پدر</label>
                            <input type="text" id="add_father" name="add_father" class="form-control"
                                autocomplete="off" />
                            <div id="add_father_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_birthdate">تاریخ تولد</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_birthdate" name="add_birthdate"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_national_code">شماره شناسنامه</label>
                            <input type="text" id="add_national_code" name="add_national_code"
                                class="leftToRight rightAlign inputMaskNationalCode form-control"
                                autocomplete="off" />
                            <div id="add_national_code_error" class="invalid-feedback"></div>
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
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addStaff">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addStaff', function(e) {
                e.preventDefault();

                if (document.getElementById("add_activeCheckBox").checked) {
                    var add_activeCheckBox = "فعال";
                } else {
                    var add_activeCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_messengerCheckBox").checked) {
                    var add_messengerCheckBox = "فعال";
                } else {
                    var add_messengerCheckBox = "غیرفعال";
                }

                if ($('#add_opt1').is(':checked')) {
                    var add_opt_sex = "مرد";
                } else if ($('#add_opt2').is(':checked')) {
                    var add_opt_sex = "زن";
                } else {
                    var add_opt_sex = "غیرفعال";
                }

                var data = {
                    'chk_active': add_activeCheckBox,
                    'chk_messenger': add_messengerCheckBox,
                    'opt_sex': add_opt_sex,
                    'first_name': $('#add_first_name').val(),
                    'last_name': $('#add_last_name').val(),
                    'father': $('#add_father').val(),
                    'birthdate': $('#add_birthdate').val(),
                    'national_code': $('#add_national_code').val(),
                    'occupation': $('#add_occupation').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/staff",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        $('#myData').html(response.output);
                        $('#pagination').html(response.pagination);
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                add_defaultSelectedValue();
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
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_first_name_error").text("");
            $("#add_first_name").removeClass("is-invalid");
            $("#add_last_name_error").text("");
            $("#add_last_name").removeClass("is-invalid");
            $("#add_father_error").text("");
            $("#add_father").removeClass("is-invalid");
            $("#add_birthdate_error").text("");
            $("#add_birthdate").removeClass("is-invalid");
            $("#add_national_code_error").text("");
            $("#add_national_code").removeClass("is-invalid");
            $("#add_occupation_error").text("");
            $("#add_occupation").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $('#add_activeCheckBox').prop('checked', false);
            $('#add_messengerCheckBox').prop('checked', false);
            $('#add_opt1').prop('checked', false);
            $('#add_opt2').prop('checked', false);
        }
    </script>
@endpush
