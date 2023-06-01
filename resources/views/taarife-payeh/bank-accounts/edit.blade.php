<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش حساب بانکی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_bank_accounts_id">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="edit_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="edit_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_account_type">نوع حساب</label>
                            <input type="text" id="edit_account_type" name="edit_account_type" class="form-control"
                                autocomplete="off" />
                            <div id="edit_account_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_account_number">شماره حساب</label>
                                <input type="text" id="edit_account_number" name="edit_account_number"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_account_number_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_shaba_number">شماره شبا</label>
                                <input type="text" id="edit_shaba_number" name="edit_shaba_number"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_shaba_number_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_cart_number">شماره کارت</label>
                                <input type="text" id="edit_cart_number" name="edit_cart_number" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_cart_number_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_bank_name">نام بانک</label>
                                <select id="edit_bank_name" name="edit_bank_name" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>نام بانک را انتخاب کنید</option>
                                    {{-- @foreach ($publishers as $publisher) --}}
                                    <option value="1">
                                        تهران
                                    </option>
                                    <option value="2">
                                        یزد
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="edit_bank_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_branch_name">نام شعبه</label>
                                <input type="text" id="edit_branch_name" name="edit_branch_name" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_branch_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_branch_address">آدرس شعبه</label>
                                <input type="text" id="edit_branch_address" name="edit_branch_address"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_branch_address_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_cheque_print_type">نوع چاپ چک</label>
                                <input type="text" id="edit_cheque_print_type" name="edit_cheque_print_type"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_cheque_print_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateBankAccounts">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_bank_accounts', function(e) {
            e.preventDefault();
            var bank_accounts_id = $(this).val();
            // console.log(bank_accounts_id);

            $.ajax({
                type: "GET",
                url: "/bank-accounts/" + bank_accounts_id + "/edit",
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
                        $("#edit_bank_accounts_id").val(bank_accounts_id);
                        $("#edit_account_type").val(response.bank_accounts.account_type);
                        $("#edit_account_number").val(response.bank_accounts.account_number);
                        $("#edit_shaba_number").val(response.bank_accounts.shaba_number);
                        $("#edit_cart_number").val(response.bank_accounts.cart_number);
                        $("#edit_bank_name").val(response.bank_accounts.bank_name);
                        $("#edit_branch_name").val(response.bank_accounts.branch_name);
                        $("#edit_branch_address").val(response.bank_accounts.branch_address);
                        $("#edit_cheque_print_type").val(response.bank_accounts.cheque_print_type);
                    }
                },
            });
        });

        $(document).on("click", ".updateBankAccounts", function(e) {
            e.preventDefault();
            var bank_accounts_id = $("#edit_bank_accounts_id").val();
            var data = {
                bank_accounts_id: $("#edit_bank_accounts_id").val(),
                account_type: $("#edit_account_type").val(),
                account_number: $("#edit_account_number").val(),
                shaba_number: $("#edit_shaba_number").val(),
                cart_number: $("#edit_cart_number").val(),
                bank_name: $("#edit_bank_name").val(),
                branch_name: $("#edit_branch_name").val(),
                branch_address: $("#edit_branch_address").val(),
                cheque_print_type: $("#edit_cheque_print_type").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/bank-accounts/" + bank_accounts_id,
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
                            fetchBankAccounts();
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
            $("#edit_account_type_error").text("");
            $("#edit_account_type").removeClass("is-invalid");
            $("#edit_account_number_error").text("");
            $("#edit_account_number").removeClass("is-invalid");
            $("#edit_shaba_number_error").text("");
            $("#edit_shaba_number").removeClass("is-invalid");
            $("#edit_cart_number_error").text("");
            $("#edit_cart_number").removeClass("is-invalid");
            $("#edit_bank_name_error").text("");
            $("#edit_bank_name").removeClass("is-invalid");
            $("#edit_branch_name_error").text("");
            $("#edit_branch_name").removeClass("is-invalid");
            $("#edit_branch_address_error").text("");
            $("#edit_branch_address").removeClass("is-invalid");
            $("#edit_cheque_print_type_error").text("");
            $("#edit_cheque_print_type").removeClass("is-invalid");
        }
    </script>
@endpush
