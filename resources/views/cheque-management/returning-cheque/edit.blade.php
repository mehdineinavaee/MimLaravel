<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش برگشت چک</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_returning_cheque_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_form_date">تاریخ فرم</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_form_date" name="edit_form_date"
                                    class="normal-example form-control" autocomplete="off" />
                                <div id="edit_form_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_form_number">شماره فرم</label>
                            <input type="text" id="edit_form_number" name="edit_form_number" class="form-control"
                                autocomplete="off" />
                            <div id="edit_form_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_mark_back">پشت نمره</label>
                            <input type="text" id="edit_mark_back" name="edit_mark_back" class="form-control"
                                autocomplete="off" />
                            <div id="edit_mark_back_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_serial_number">شماره سریال چک</label>
                            <input type="text" id="edit_serial_number" name="edit_serial_number" class="form-control"
                                autocomplete="off" />
                            <div id="edit_serial_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_total">مبلغ چک</label>
                            <input type="text" id="edit_total" name="edit_total" class="form-control"
                                autocomplete="off" />
                            <div id="edit_total_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_due_date">تاریخ سر رسید</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_due_date" name="edit_due_date"
                                    class="normal-example form-control" autocomplete="off" />
                                <div id="edit_due_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_bank_account_details">مشخصات حساب بانکی</label>
                            <input type="text" id="edit_bank_account_details" name="edit_bank_account_details"
                                class="form-control" autocomplete="off" />
                            <div id="edit_bank_account_details_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_payer">پرداخت کننده</label>
                            <input type="text" id="edit_payer" name="edit_payer" class="form-control"
                                autocomplete="off" />
                            <div id="edit_payer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_considerations">ملاحظات</label>
                            <input type="text" id="edit_considerations" name="edit_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="edit_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateReturningCheque">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_returning_cheque', function(e) {
            e.preventDefault();
            var returning_cheque_id = $(this).val();
            // console.log(returning_cheque_id);

            $.ajax({
                type: "GET",
                url: "/returning-cheque/" + returning_cheque_id + "/edit",
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

                        $("#edit_returning_cheque_id").val(returning_cheque_id);
                        $("#edit_form_date").val(response.returning_cheque.form_date);
                        $("#edit_form_number").val(response.returning_cheque.form_number);
                        $("#edit_mark_back").val(response.returning_cheque.mark_back);
                        $("#edit_serial_number").val(response.returning_cheque.serial_number);
                        $("#edit_total").val(response.returning_cheque.total);
                        $("#edit_due_date").val(response.returning_cheque.due_date);
                        $("#edit_bank_account_details").val(response.returning_cheque
                            .bank_account_details);
                        $("#edit_payer").val(response.returning_cheque.payer);
                        $("#edit_considerations").val(response.returning_cheque.considerations);
                    }
                },
            });
        });

        $(document).on("click", ".updateReturningCheque", function(e) {
            e.preventDefault();
            var returning_cheque_id = $("#edit_returning_cheque_id").val();
            var data = {
                returning_cheque_id: $("#edit_returning_cheque_id").val(),
                form_date: $("#edit_form_date").val(),
                form_number: $("#edit_form_number").val(),
                mark_back: $("#edit_mark_back").val(),
                serial_number: $("#edit_serial_number").val(),
                total: $("#edit_total").val(),
                due_date: $("#edit_due_date").val(),
                bank_account_details: $("#edit_bank_account_details").val(),
                payer: $("#edit_payer").val(),
                considerations: $("#edit_considerations").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/returning-cheque/" + returning_cheque_id,
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
                            fetchReturningCheque();
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
            $("#edit_form_date_error").text("");
            $("#edit_form_date").removeClass("is-invalid");
            $("#edit_form_number_error").text("");
            $("#edit_form_number").removeClass("is-invalid");
            $("#edit_mark_back_error").text("");
            $("#edit_mark_back").removeClass("is-invalid");
            $("#edit_serial_number_error").text("");
            $("#edit_serial_number").removeClass("is-invalid");
            $("#edit_total_error").text("");
            $("#edit_total").removeClass("is-invalid");
            $("#edit_due_date_error").text("");
            $("#edit_due_date").removeClass("is-invalid");
            $("#edit_bank_account_details_error").text("");
            $("#edit_bank_account_details").removeClass("is-invalid");
            $("#edit_payer_error").text("");
            $("#edit_payer").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
        }
    </script>
@endpush
