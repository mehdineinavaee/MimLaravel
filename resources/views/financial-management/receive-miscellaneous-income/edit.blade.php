<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش دریافت درآمد متفرقه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row m-4">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="edit_income_title">عنوان درآمد</label>
                        <select id="edit_income_title" name="edit_income_title" class="form-control select2"
                            style="width: 100%;">
                            <option value="" selected>عنوان درآمد را انتخاب کنید</option>
                            {{-- @foreach ($publishers as $publisher) --}}
                            <option value="1">
                                درآمد 1
                            </option>
                            <option value="2">
                                درآمد 2
                            </option>
                            {{-- @endforeach --}}
                        </select>
                        <div id="edit_income_title_error" class="invalid-feedback"></div>
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
                                class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
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
                    <h6 class="text-muted">چک های پرداختی</h6>
                </div>
                <div class="tabs" id="edit_tab03">
                    <h6 class="text-muted">دریافت الکترونیکی «حواله / کارت خوان / اینترنتی»</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body" style="min-height: 330px">
                <input type="hidden" id="edit_receive_miscellaneous_income_id">
                <!-- Tabs content -->
                <fieldset class="show" id="edit_tab011">
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
                                        class="leftToRight leftAlign inputMaskDate form-control" autocomplete="off" />
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
                <!-- Tabs content -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateReceiveMiscellaneousIncome">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_receive_miscellaneous_income', function(e) {
            e.preventDefault();
            var receive_miscellaneous_income_id = $(this).val();
            // console.log(receive_miscellaneous_income_id);

            $.ajax({
                type: "GET",
                url: "/receive-miscellaneous-income/" + receive_miscellaneous_income_id + "/edit",
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

                        $("#edit_receive_miscellaneous_income_id").val(receive_miscellaneous_income_id);
                        $("#edit_income_title").val(response.receive_miscellaneous_income
                            .income_title);
                        $("#edit_form_date").val(response.receive_miscellaneous_income.form_date);
                        $("#edit_form_number").val(response.receive_miscellaneous_income.form_number);
                        $("#edit_cash_amount").val(response.receive_miscellaneous_income.cash_amount);
                        $("#edit_considerations1").val(response.receive_miscellaneous_income
                            .considerations1);
                        $("#edit_date").val(response.receive_miscellaneous_income.date);
                        $("#edit_bank_account_details").val(response.receive_miscellaneous_income
                            .bank_account_details);
                        $("#edit_deposit_amount").val(response.receive_miscellaneous_income
                            .deposit_amount);
                        $("#edit_wage").val(response.receive_miscellaneous_income.wage);
                        $("#edit_issue_tracking").val(response.receive_miscellaneous_income
                            .issue_tracking);
                        $("#edit_considerations2").val(response.receive_miscellaneous_income
                            .considerations2);
                    }
                },
            });
        });

        $(document).on("click", ".updateReceiveMiscellaneousIncome", function(e) {
            e.preventDefault();
            var receive_miscellaneous_income_id = $("#edit_receive_miscellaneous_income_id").val();
            var data = {
                income_title: $("#edit_income_title").val(),
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
                url: "/receive-miscellaneous-income/" + receive_miscellaneous_income_id,
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
            $("#edit_income_title_error").text("");
            $("#edit_income_title").removeClass("is-invalid");
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
    </script>
@endpush
