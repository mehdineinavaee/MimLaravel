<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش پرداخت به طرف حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row m-4">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_taraf_hesab_name">نام طرف حساب</label>
                        <select id="edit_taraf_hesab_name" name="edit_taraf_hesab_name" class="form-control select2"
                            style="width: 100%;">
                            <option value="" selected>طرف حساب را انتخاب کنید</option>
                            {{-- @foreach ($publishers as $publisher) --}}
                            <option value="1">
                                طرف حساب 1
                            </option>
                            <option value="2">
                                طرف حساب 2
                            </option>
                            {{-- @endforeach --}}
                        </select>
                        <div id="edit_taraf_hesab_name_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
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
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_form_number">شماره فرم</label>
                        <input type="text" id="edit_form_number" name="edit_form_number" class="form-control"
                            autocomplete="off" />
                        <div id="edit_form_number_error" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="edit_tab01">
                    <h6 class="font-weight-bold">نقد</h6>
                </div>
                <div class="tabs" id="edit_tab02">
                    <h6 class="text-muted">چک های دریافتی</h6>
                </div>
                <div class="tabs" id="edit_tab03">
                    <h6 class="text-muted">خرج چک</h6>
                </div>
                <div class="tabs" id="edit_tab04">
                    <h6 class="text-muted">دریافت الکترونیکی «حواله / کارت خوان / اینترنتی»</h6>
                </div>
                <div class="tabs" id="edit_tab05">
                    <h6 class="text-muted">تخفیف پرداختی</h6>
                </div>
                <div class="tabs" id="edit_tab06">
                    <h6 class="text-muted">بابت فاکتورهای ...</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body" style="min-height: 330px">
                <input type="hidden" id="edit_payment_to_account_id">
                <!-- Tabs content -->
                <fieldset class="show" id="edit_tab011">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_cash_amount">مبلغ نقدی</label>
                                <input type="text" id="edit_cash_amount" name="edit_cash_amount" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_cash_amount_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
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
                            <table id="example1" class="table-responsive table table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
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
                <fieldset class="show" id="edit_tab031">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table id="example1" class="table-responsive table table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th style="min-width: 200px">پشت نمره</th>
                                        <th style="min-width: 200px">شماره سریال چک</th>
                                        <th style="min-width: 200px">مبلغ چک</th>
                                        <th style="min-width: 200px">تاریخ سر رسید</th>
                                        <th style="min-width: 200px">مشخصات حساب بانکی</th>
                                        <th style="min-width: 200px">نام طرف حساب</th>
                                        <th style="min-width: 200px">ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>پشت نمره</th>
                                        <th>شماره سریال چک</th>
                                        <th>مبلغ چک</th>
                                        <th>تاریخ سر رسید</th>
                                        <th>مشخصات حساب بانکی</th>
                                        <th>نام طرف حساب</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab041">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_date">تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="edit_date" name="edit_date"
                                        class="normal-example form-control" autocomplete="off" />
                                    <div id="edit_date_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_bank_account_details">مشخصات حساب بانکی</label>
                                <select id="edit_bank_account_details" name="edit_bank_account_details"
                                    class="form-control select2" style="width: 100%;">
                                    <option value="" selected>حساب بانکی را انتخاب کنید</option>
                                    {{-- @foreach ($publishers as $publisher) --}}
                                    <option value="1">
                                        حساب 1
                                    </option>
                                    <option value="2">
                                        حساب 2
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="edit_bank_account_details_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_deposit_amount">مبلغ واریزی</label>
                                <input type="text" id="edit_deposit_amount" name="edit_deposit_amount"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_deposit_amount_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_wage">کارمزد</label>
                                <input type="text" id="edit_wage" name="edit_wage" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_wage_error" class="invalid-feedback"></div>
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
                <fieldset id="edit_tab051">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_paid_discount">تخفیف پرداختی</label>
                            <input type="text" id="edit_paid_discount" name="edit_paid_discount"
                                class="form-control" autocomplete="off" />
                            <div id="edit_paid_discount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab061">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table id="example1" class="table-responsive table table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th style="min-width: 200px">نوع فاکتور</th>
                                        <th style="min-width: 200px">شماره فاکتور</th>
                                        <th style="min-width: 200px">مبلغ فاکتور</th>
                                        <th style="min-width: 200px">مانده جهت نسیه</th>
                                        <th style="min-width: 200px">مبلغ تسویه فاکتور جاری</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نوع فاکتور</th>
                                        <th>شماره فاکتور</th>
                                        <th>مبلغ فاکتور</th>
                                        <th>مانده جهت نسیه</th>
                                        <th>مبلغ تسویه فاکتور جاری</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <!-- Tabs content -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updatePaymentToAccount">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_payment_to_account', function(e) {
            e.preventDefault();
            var payment_to_account_id = $(this).val();
            // console.log(payment_to_account_id);
            $("#editInfo").modal("show");

            $.ajax({
                type: "GET",
                url: "/payment-to-account/" + payment_to_account_id + "/edit",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#edit_payment_to_account_id").val(payment_to_account_id);
                        $("#edit_taraf_hesab_name").val(response.payment_to_account
                            .taraf_hesab_name);
                        $("#edit_form_date").val(response.payment_to_account.form_date);
                        $("#edit_form_number").val(response.payment_to_account.form_number);
                        $("#edit_cash_amount").val(response.payment_to_account.cash_amount);
                        $("#edit_considerations1").val(response.payment_to_account
                            .considerations1);
                        $("#edit_date").val(response.payment_to_account.date);
                        $("#edit_bank_account_details").val(response.payment_to_account
                            .bank_account_details);
                        $("#edit_deposit_amount").val(response.payment_to_account.deposit_amount);
                        $("#edit_wage").val(response.payment_to_account.wage);
                        $("#edit_issue_tracking").val(response.payment_to_account.issue_tracking);
                        $("#edit_considerations2").val(response.payment_to_account
                            .considerations2);
                        $("#edit_paid_discount").val(response.payment_to_account.paid_discount);
                    }
                },
            });
        });

        $(document).on("click", ".updatePaymentToAccount", function(e) {
            e.preventDefault();
            var payment_to_account_id = $("#edit_payment_to_account_id").val();
            var data = {
                taraf_hesab_name: $("#edit_taraf_hesab_name").val(),
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
                paid_discount: $("#edit_paid_discount").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/payment-to-account/" + payment_to_account_id,
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
                            fetchPaymentToAccount();
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

            if (!$("#edit_tab01").hasClass("active")) {
                $("#edit_tab01 h6").removeClass("text-muted");
                $("#edit_tab02 h6").addClass("text-muted");
                $("#edit_tab03 h6").addClass("text-muted");
                $("#edit_tab04 h6").addClass("text-muted");
                $("#edit_tab05 h6").addClass("text-muted");
                $("#edit_tab06 h6").addClass("text-muted");
                $("#edit_tab01").addClass("active");
                $("#edit_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#edit_tab011").hasClass("show")) {
                $("#edit_tab011").addClass("show");
            }
        });

        //call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#edit_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            edit_clearErrors();
        })

        function edit_clearErrors() {
            $("#edit_taraf_hesab_name_error").text("");
            $("#edit_taraf_hesab_name").removeClass("is-invalid");
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
            $("#edit_paid_discount_error").text("");
            $("#edit_paid_discount").removeClass("is-invalid");
        }
    </script>
@endpush
