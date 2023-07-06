<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش از بانک به بانک</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row m-4">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_from_bank">از بانک</label>
                        <select id="edit_from_bank" name="edit_from_bank" class="form-control select2"
                            style="width: 100%;">
                            <option value="" selected>بانک را انتخاب کنید</option>
                            @foreach ($banks_types as $banks_type)
                                <option value={{ $banks_type->id }}>
                                    {{ $banks_type->bank_name }}
                                </option>
                            @endforeach
                        </select>
                        <div id="edit_from_bank_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_to_bank">به بانک</label>
                        <select id="edit_to_bank" name="edit_to_bank" class="form-control select2" style="width: 100%;">
                            <option value="" selected>بانک را انتخاب کنید</option>
                            @foreach ($banks_types as $banks_type)
                                <option value={{ $banks_type->id }}>
                                    {{ $banks_type->bank_name }}
                                </option>
                            @endforeach
                        </select>
                        <div id="edit_to_bank_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_form_date">تاریخ فرم</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id="edit_form_date" name="edit_form_date"
                                class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                            <div id="edit_form_date_error" class="invalid-feedback" style="margin-right:38px;"></div>
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
            </div>

            <div class="modal-header row d-flex justify-content-start mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="edit_tab01">
                    <h6 class="font-weight-bold">نقد</h6>
                </div>
                <div class="tabs" id="edit_tab02">
                    <h6 class="text-muted">چک های پرداختی</h6>
                </div>
                <div class="tabs" id="edit_tab03">
                    <h6 class="text-muted">دریافت الکترونیکی «حواله / کارت خوان / اینترنتی»</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body" style="min-height: 330px">
                <input type="hidden" id="edit_bank_to_bank_id">
                <!-- Tabs content -->
                <fieldset class="show" id="edit_tab011">
                    <div class="row pt-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_cash_amount">مبلغ نقدی</label>
                                <input type="text" id="edit_cash_amount" name="edit_cash_amount" class="form-control"
                                    autocomplete="off"
                                    onkeyup="separateNum(this.value,this,'edit_cash_amount_price');" />
                                <div id="edit_cash_amount_error" class="invalid-feedback"></div>
                                <div id="edit_cash_amount_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_considerations1">ملاحظات</label>
                                <input type="text" id="edit_considerations1" name="edit_considerations1"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_considerations1_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab021">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table class="table-responsive table table-hover table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 100px">ردیف</th>
                                        <th style="min-width: 200px">مبلغ چک</th>
                                        <th style="min-width: 200px">پشت نمره</th>
                                        <th style="min-width: 200px">تاریخ صدور</th>
                                        <th style="min-width: 200px">تاریخ سر رسید</th>
                                        <th style="min-width: 200px">شماره سریال چک</th>
                                        <th style="min-width: 200px">نام بانک و شعبه</th>
                                        <th style="min-width: 200px">شماره حساب</th>
                                        <th style="min-width: 200px">ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>مبلغ چک</th>
                                        <th>پشت نمره</th>
                                        <th>تاریخ صدور</th>
                                        <th>تاریخ سر رسید</th>
                                        <th>شماره سریال چک</th>
                                        <th>نام بانک و شعبه</th>
                                        <th>شماره حساب</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab031">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_date">تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="edit_date" name="edit_date"
                                        class="leftToRight rightAlign inputMaskDate form-control"
                                        autocomplete="off" />
                                    <div id="edit_date_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_bank_account_details">مشخصات حساب بانکی</label>
                                <select id="edit_bank_account_details" name="edit_bank_account_details"
                                    class="form-control select2" style="width: 100%;">
                                    <option value="" selected>حساب بانکی را انتخاب کنید</option>
                                    @foreach ($bank_accounts as $bank_account)
                                        <option value={{ $bank_account->id }}>
                                            {{ $bank_account->account_number }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="edit_bank_account_details_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_deposit_amount">مبلغ واریزی</label>
                                <input type="text" id="edit_deposit_amount" name="edit_deposit_amount"
                                    class="form-control" autocomplete="off"
                                    onkeyup="separateNum(this.value,this,'edit_deposit_amount_price');" />
                                <div id="edit_deposit_amount_error" class="invalid-feedback"></div>
                                <div id="edit_deposit_amount_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_wage">کارمزد</label>
                                <input type="text" id="edit_wage" name="edit_wage" class="form-control"
                                    autocomplete="off" onkeyup="separateNum(this.value,this,'edit_wage_price');" />
                                <div id="edit_wage_error" class="invalid-feedback"></div>
                                <div id="edit_wage_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_issue_tracking">شماره پیگیری</label>
                                <input type="text" id="edit_issue_tracking" name="edit_issue_tracking"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_issue_tracking_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_considerations2">ملاحظات</label>
                                <input type="text" id="edit_considerations2" name="edit_considerations2"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_considerations2_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Tabs content -->
            </div>

            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateBankToBank">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_bank_to_bank', function(e) {
            e.preventDefault();
            var bank_to_bank_id = $(this).val();
            // console.log(bank_to_bank_id);

            $.ajax({
                type: "GET",
                url: "/bank-to-bank/" + bank_to_bank_id + "/edit",
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
                        $("#edit_bank_to_bank_id").val(bank_to_bank_id);

                        $('#edit_from_bank').val(response.bank_to_bank.from_bank_id).change();
                        $('#edit_to_bank').val(response.bank_to_bank.to_bank_id).change();
                        $("#edit_form_date").val(response.bank_to_bank.form_date);
                        $("#edit_form_number").val(response.bank_to_bank.form_number);
                        $('#edit_cash_amount').val(new Intl.NumberFormat().format(response.bank_to_bank
                            .cash_amount));
                        $("#edit_considerations1").val(response.bank_to_bank
                            .considerations1);
                        $("#edit_date").val(response.bank_to_bank.date);
                        $('#edit_bank_account_details').val(response.bank_to_bank.bank_account_id)
                            .change();
                        $('#edit_deposit_amount').val(new Intl.NumberFormat().format(response
                            .bank_to_bank
                            .deposit_amount));
                        $('#edit_wage').val(new Intl.NumberFormat().format(response
                            .bank_to_bank
                            .wage));
                        $("#edit_issue_tracking").val(response.bank_to_bank.issue_tracking);
                        $("#edit_considerations2").val(response.bank_to_bank
                            .considerations2);
                    }
                },
            });
        });

        $(document).on("click", ".updateBankToBank", function(e) {
            e.preventDefault();
            var bank_to_bank_id = $("#edit_bank_to_bank_id").val();

            var data = {
                from_bank: $("#edit_from_bank").val(),
                to_bank: $("#edit_to_bank").val(),
                form_date: $("#edit_form_date").val(),
                form_number: $("#edit_form_number").val(),
                cash_amount: $("#edit_cash_amount").val(),
                considerations1: $("#edit_considerations1").val(),
                date: $("#edit_date").val(),
                bank_account_details: $("#edit_bank_account_details").val(),
                deposit_amount: $("#edit_deposit_amount").val(),
                wage: $("#edit_wage").val(),
                issue_tracking: $("#edit_issue_tracking").val(),
                considerations2: $("#edit_considerations2").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/bank-to-bank/" + bank_to_bank_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/bank-to-bank',
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
                            edit_clearPrice();
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

            if (!$("#edit_tab01").hasClass("active")) {
                $("#edit_tab01 h6").removeClass("text-muted");
                $("#edit_tab02 h6").addClass("text-muted");
                $("#edit_tab03 h6").addClass("text-muted");
                $("#edit_tab01").addClass("active");
                $("#edit_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#edit_tab011").hasClass("show")) {
                $("#edit_tab011").addClass("show");
            }
        });

        // call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#edit_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            edit_clearErrors();
            edit_clearPrice();
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_from_bank_error").text("");
            $("#edit_from_bank").removeClass("is-invalid");
            $("#edit_to_bank_error").text("");
            $("#edit_to_bank").removeClass("is-invalid");
            $("#edit_form_date_error").text("");
            $("#edit_form_date").removeClass("is-invalid");
            $("#edit_form_number_error").text("");
            $("#edit_form_number").removeClass("is-invalid");
            $("#edit_cash_amount_error").text("");
            $("#edit_cash_amount").removeClass("is-invalid");
            $("#edit_considerations1_error").text("");
            $("#edit_considerations1").removeClass("is-invalid");
            $("#edit_date_error").text("");
            $("#edit_date").removeClass("is-invalid");
            $("#edit_bank_account_details_error").text("");
            $("#edit_bank_account_details").removeClass("is-invalid");
            $("#edit_deposit_amount_error").text("");
            $("#edit_deposit_amount").removeClass("is-invalid");
            $("#edit_wage_error").text("");
            $("#edit_wage").removeClass("is-invalid");
            $("#edit_issue_tracking_error").text("");
            $("#edit_issue_tracking").removeClass("is-invalid");
            $("#edit_considerations2_error").text("");
            $("#edit_considerations2").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_cash_amount_price").text("");
            $("#edit_deposit_amount_price").text("");
            $("#edit_wage_price").text("");
        }

        function edit_defaultSelectedValue() {
            $(edit_from_bank).prop('selectedIndex', 0).change();
            $(edit_to_bank).prop('selectedIndex', 0).change();
            $(edit_bank_account_details).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
