<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش از صندوق به بانک</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="edit_fund_to_bank_id">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_bank">بانک</label>
                        <select id="edit_bank" name="edit_bank" class="form-control select2" style="width: 100%;">
                            <option value="" selected>بانک را انتخاب کنید</option>
                            {{-- @foreach ($publishers as $publisher) --}}
                            <option value="1">
                                بانک 1
                            </option>
                            <option value="2">
                                بانک 2
                            </option>
                            {{-- @endforeach --}}
                        </select>
                        <div id="edit_bank_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_form_number">شماره فرم</label>
                        <input type="text" id="edit_form_number" name="edit_form_number" class="form-control"
                            autocomplete="off" />
                        <div id="edit_form_number_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_cash_amount">مبلغ نقدی</label>
                            <input type="text" id="edit_cash_amount" name="edit_cash_amount" class="form-control"
                                autocomplete="off" />
                            <div id="edit_cash_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                <button type="button" class="btn btn-primary updateFundToBank">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_fund_to_bank', function(e) {
            e.preventDefault();
            var fund_to_bank_id = $(this).val();
            // console.log(fund_to_bank_id);
            $("#editInfo").modal("show");

            $.ajax({
                type: "GET",
                url: "/fund-to-bank/" + fund_to_bank_id + "/edit",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#edit_fund_to_bank_id").val(fund_to_bank_id);
                        $("#edit_bank").val(response.fund_to_bank
                            .bank);
                        $("#edit_form_date").val(response.fund_to_bank.form_date);
                        $("#edit_form_number").val(response.fund_to_bank.form_number);
                        $("#edit_cash_amount").val(response.fund_to_bank.cash_amount);
                        $("#edit_considerations").val(response.fund_to_bank
                            .considerations);
                    }
                },
            });
        });

        $(document).on("click", ".updateFundToBank", function(e) {
            e.preventDefault();
            var fund_to_bank_id = $("#edit_fund_to_bank_id").val();
            var data = {
                bank: $("#edit_bank").val(),
                form_date: $("#edit_form_date").val(),
                form_number: $("#edit_form_number").val(),
                cash_amount: $("#edit_cash_amount").val(),
                considerations: $("#edit_considerations").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/fund-to-bank/" + fund_to_bank_id,
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
                            fetchFundToBank();
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
            $("#edit_bank_error").text("");
            $("#edit_bank").removeClass("is-invalid");
            $("#edit_form_date_error").text("");
            $("#edit_form_date").removeClass("is-invalid");
            $("#edit_form_number_error").text("");
            $("#edit_form_number").removeClass("is-invalid");
            $("#edit_cash_amount_error").text("");
            $("#edit_cash_amount").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
        }
    </script>
@endpush
