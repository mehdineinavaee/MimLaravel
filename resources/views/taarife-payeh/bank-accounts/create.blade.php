<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">حساب بانکی جدید</h5>
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_account_type">نوع حساب</label>
                            <input type="text" id="add_account_type" name="add_account_type" class="form-control"
                                autocomplete="off" />
                            <div id="add_account_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_account_number">شماره حساب</label>
                            <input type="text" id="add_account_number" name="add_account_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_account_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_shaba_number">شماره شبا</label>
                            <input type="text" id="add_shaba_number" name="add_shaba_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_shaba_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_cart_number">شماره کارت</label>
                            <input type="text" id="add_cart_number" name="add_cart_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_cart_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_bank_name">نام بانک</label>
                            <select id="add_bank_name" name="add_bank_name" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام بانک را انتخاب کنید</option>
                                @foreach ($banks_types as $banks_type)
                                    <option value="{{ $banks_type->id }}">
                                        {{ $banks_type->bank_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_bank_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_branch_name">نام شعبه</label>
                            <input type="text" id="add_branch_name" name="add_branch_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_branch_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_branch_address">آدرس شعبه</label>
                            <input type="text" id="add_branch_address" name="add_branch_address" class="form-control"
                                autocomplete="off" />
                            <div id="add_branch_address_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_cheque_print_type">نوع چاپ چک</label>
                            <input type="text" id="add_cheque_print_type" name="add_cheque_print_type"
                                class="form-control" autocomplete="off" />
                            <div id="add_cheque_print_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addBankAccounts">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addBankAccounts', function(e) {
                e.preventDefault();

                var data = {
                    'account_type': $('#add_account_type').val(),
                    'account_number': $('#add_account_number').val(),
                    'shaba_number': $('#add_shaba_number').val(),
                    'cart_number': $('#add_cart_number').val(),
                    'bank_name': $('#add_bank_name').val(),
                    'branch_name': $('#add_branch_name').val(),
                    'branch_address': $('#add_branch_address').val(),
                    'cheque_print_type': $('#add_cheque_print_type').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/bank-accounts",
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
                                fetchData();
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
            $("#add_account_type_error").text("");
            $("#add_account_type").removeClass("is-invalid");
            $("#add_account_number_error").text("");
            $("#add_account_number").removeClass("is-invalid");
            $("#add_shaba_number_error").text("");
            $("#add_shaba_number").removeClass("is-invalid");
            $("#add_cart_number_error").text("");
            $("#add_cart_number").removeClass("is-invalid");
            $("#add_bank_name_error").text("");
            $("#add_bank_name").removeClass("is-invalid");
            $("#add_branch_name_error").text("");
            $("#add_branch_name").removeClass("is-invalid");
            $("#add_branch_address_error").text("");
            $("#add_branch_address").removeClass("is-invalid");
            $("#add_cheque_print_type_error").text("");
            $("#add_cheque_print_type").removeClass("is-invalid");
        }
    </script>
@endpush
