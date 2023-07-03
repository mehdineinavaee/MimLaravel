<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش درآمد، هزینه، صندوق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_fund_id">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_systemCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_systemCheckBox">
                                سیستمی
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_form_type">نوع فرم</label>
                                <select id="edit_form_type" name="edit_form_type" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>نوع فرم را انتخاب کنید</option>
                                    <option value="1">
                                        درآمد
                                    </option>
                                    <option value="2">
                                        هزینه
                                    </option>
                                    <option value="3">
                                        صندوق
                                    </option>
                                </select>
                                <div id="edit_form_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_daramad_code">کد درآمد</label>
                            <input type="text" id="edit_daramad_code" name="edit_daramad_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_daramad_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_daramad_name">نام درآمد</label>
                                <input type="text" id="edit_daramad_name" name="edit_daramad_name"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_daramad_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateFund">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_fund', function(e) {
            e.preventDefault();
            var fund_id = $(this).val();
            // console.log(bank_accounts_id);

            $.ajax({
                type: "GET",
                url: "/fund/" + fund_id + "/edit",
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

                        if (response.fund.chk_system == "فعال") {
                            $('#edit_systemCheckBox').prop('checked', true);
                        } else {
                            $('#edit_systemCheckBox').prop('checked', false);
                        }

                        if (response.fund.chk_active == "فعال") {
                            $('#edit_activeCheckBox').prop('checked', true);
                        } else {
                            $('#edit_activeCheckBox').prop('checked', false);
                        }

                        $("#edit_fund_id").val(fund_id);
                        $('#edit_form_type').val(response.fund.form_type).change();
                        $("#edit_daramad_code").val(response.fund.daramad_code);
                        $("#edit_daramad_name").val(response.fund.daramad_name);
                    }
                },
            });
        });

        $(document).on("click", ".updateFund", function(e) {
            e.preventDefault();
            var fund_id = $("#edit_fund_id").val();

            if (document.getElementById("edit_systemCheckBox").checked) {
                var edit_systemCheckBox = "فعال";
            } else {
                var edit_systemCheckBox = "غیرفعال";
            }

            if (document.getElementById("edit_activeCheckBox").checked) {
                var edit_activeCheckBox = "فعال";
            } else {
                var edit_activeCheckBox = "غیرفعال";
            }

            var data = {
                chk_system: edit_systemCheckBox,
                chk_active: edit_activeCheckBox,
                form_type: $("#edit_form_type").val(),
                daramad_code: $("#edit_daramad_code").val(),
                daramad_name: $("#edit_daramad_name").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/fund/" + fund_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/fund',
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
            $("#edit_form_type_error").text("");
            $("#edit_form_type").removeClass("is-invalid");
            $("#edit_daramad_code_error").text("");
            $("#edit_daramad_code").removeClass("is-invalid");
            $("#edit_daramad_name_error").text("");
            $("#edit_daramad_name").removeClass("is-invalid");
        }

        function edit_defaultSelectedValue() {
            $('#edit_systemCheckBox').prop('checked', false);
            $('#edit_activeCheckBox').prop('checked', false);
            $(edit_form_type).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
