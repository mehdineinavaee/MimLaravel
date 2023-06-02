<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش دسته چک</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_cheque_book_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_code">کد</label>
                            <input type="text" id="edit_code" name="edit_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_receive_date">تاریخ دریافت</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_receive_date" name="edit_receive_date"
                                    class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_receive_date_error" class="invalid-feedback"></div>
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
                            <label for="edit_quantity">تعداد برگه</label>
                            <input type="text" id="edit_quantity" name="edit_quantity" class="form-control"
                                autocomplete="off" />
                            <div id="edit_quantity_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_cheque_from">از سریال</label>
                            <input type="text" id="edit_cheque_from" name="edit_cheque_from" class="form-control"
                                autocomplete="off" />
                            <div id="edit_cheque_from_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_cheque_to">تا سریال</label>
                            <input type="text" id="edit_cheque_to" name="edit_cheque_to" class="form-control"
                                autocomplete="off" />
                            <div id="edit_cheque_to_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateChequeBook">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_cheque_book', function(e) {
            e.preventDefault();
            var cheque_book_id = $(this).val();
            // console.log(cheque_book_id);

            $.ajax({
                type: "GET",
                url: "/cheque-book/" + cheque_book_id + "/edit",
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
                        $("#edit_cheque_book_id").val(cheque_book_id);
                        $("#edit_code").val(response.cheque_book.code);
                        $("#edit_receive_date").val(response.cheque_book.receive_date);
                        $("#edit_bank_account_details").val(response.cheque_book.bank_account_details);
                        $("#edit_quantity").val(response.cheque_book.quantity);
                        $("#edit_cheque_from").val(response.cheque_book.cheque_from);
                        $("#edit_cheque_to").val(response.cheque_book.cheque_to);
                    }
                },
            });
        });

        $(document).on("click", ".updateChequeBook", function(e) {
            e.preventDefault();
            var cheque_book_id = $("#edit_cheque_book_id").val();
            var data = {
                cheque_book_id: $("#edit_cheque_book_id").val(),
                code: $("#edit_code").val(),
                receive_date: $("#edit_receive_date").val(),
                bank_account_details: $("#edit_bank_account_details").val(),
                quantity: $("#edit_quantity").val(),
                cheque_from: $("#edit_cheque_from").val(),
                cheque_to: $("#edit_cheque_to").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/cheque-book/" + cheque_book_id,
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
            $("#edit_code_error").text("");
            $("#edit_code").removeClass("is-invalid");
            $("#edit_receive_date_error").text("");
            $("#edit_receive_date").removeClass("is-invalid");
            $("#edit_bank_account_details_error").text("");
            $("#edit_bank_account_details").removeClass("is-invalid");
            $("#edit_quantity_error").text("");
            $("#edit_quantity").removeClass("is-invalid");
            $("#edit_cheque_from_error").text("");
            $("#edit_cheque_from").removeClass("is-invalid");
            $("#edit_cheque_to_error").text("");
            $("#edit_cheque_to").removeClass("is-invalid");
        }

        $("#edit_cheque_from").on("input", function() {
            if ($("#edit_quantity").val().length > 0) {
                if ($(this).val() == "" || $(this).val() == 0) {
                    $("#edit_cheque_from").val(0);
                    $("#edit_cheque_to").val(0);
                } else {
                    var chequeFromValue = parseInt($(this).val());
                    var quantityValue = parseInt($("#edit_quantity").val());
                    $("#edit_cheque_to").val(chequeFromValue + quantityValue - 1);
                }
            }
        });

        $("#edit_quantity").on("input", function() {
            if ($("#edit_cheque_from").val().length > 0) {
                if ($(this).val() == "" || $(this).val() == 0) {
                    $("#edit_cheque_from").val(0);
                    $("#edit_cheque_to").val(0);
                } else {
                    var chequeFromValue = parseInt($("#edit_cheque_from").val());
                    var quantityValue = parseInt($("#edit_quantity").val());
                    $("#edit_cheque_to").val(chequeFromValue + quantityValue - 1);
                }
            }
        });
    </script>
@endpush
