<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">دسته چک جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_code">کد</label>
                            <input type="text" id="add_code" name="add_code" class="form-control"
                                autocomplete="off" />
                            <div id="add_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_receive_date">تاریخ دریافت</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_receive_date" name="add_receive_date"
                                    class="normal-example form-control" autocomplete="off" />
                                <div id="add_receive_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_bank_account_details">مشخصات حساب بانکی</label>
                            <input type="text" id="add_bank_account_details" name="add_bank_account_details"
                                class="form-control" autocomplete="off" />
                            <div id="add_bank_account_details_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_quantity">تعداد برگه</label>
                            <input type="text" id="add_quantity" name="add_quantity" class="form-control"
                                autocomplete="off" />
                            <div id="add_quantity_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_cheque_from">از سریال</label>
                            <input type="text" id="add_cheque_from" name="add_cheque_from" class="form-control"
                                autocomplete="off" />
                            <div id="add_cheque_from_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_cheque_to">تا سریال</label>
                            <input type="text" id="add_cheque_to" name="add_cheque_to" class="form-control"
                                autocomplete="off" />
                            <div id="add_cheque_to_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addChequeBook">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addChequeBook', function(e) {
                e.preventDefault();

                var data = {
                    'code': $('#add_code').val(),
                    'receive_date': $('#add_receive_date').val(),
                    'bank_account_details': $('#add_bank_account_details').val(),
                    'quantity': $('#add_quantity').val(),
                    'cheque_from': $('#add_cheque_from').val(),
                    'cheque_to': $('#add_cheque_to').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cheque-book",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                fetchChequeBook();
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

        //call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
        })

        function add_clearErrors() {
            $("#add_code_error").text("");
            $("#add_code").removeClass("is-invalid");
            $("#add_receive_date_error").text("");
            $("#add_receive_date").removeClass("is-invalid");
            $("#add_bank_account_details_error").text("");
            $("#add_bank_account_details").removeClass("is-invalid");
            $("#add_quantity_error").text("");
            $("#add_quantity").removeClass("is-invalid");
            $("#add_cheque_from_error").text("");
            $("#add_cheque_from").removeClass("is-invalid");
            $("#add_cheque_to_error").text("");
            $("#add_cheque_to").removeClass("is-invalid");
        }

        $("#add_cheque_from").on("input", function() {
            if ($("#add_quantity").val().length > 0) {
                if ($(this).val() == "" || $(this).val() == 0) {
                    $("#add_cheque_from").val(0);
                    $("#add_cheque_to").val(0);
                } else {
                    var chequeFromValue = parseInt($(this).val());
                    var quantityValue = parseInt($("#add_quantity").val());
                    $("#add_cheque_to").val(chequeFromValue + quantityValue - 1);
                }
            }
        });

        $("#add_quantity").on("input", function() {
            if ($("#add_cheque_from").val().length > 0) {
                if ($(this).val() == "" || $(this).val() == 0) {
                    $("#add_cheque_from").val(0);
                    $("#add_cheque_to").val(0);
                } else {
                    var chequeFromValue = parseInt($("#add_cheque_from").val());
                    var quantityValue = parseInt($("#add_quantity").val());
                    $("#add_cheque_to").val(chequeFromValue + quantityValue - 1);
                }
            }
        });
    </script>
@endpush
