<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">پرداخت جدید به طرف حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row m-4">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="add_taraf_hesab_name">نام طرف حساب</label>
                        <select id="add_taraf_hesab_name" name="add_taraf_hesab_name" class="form-control select2"
                            style="width: 100%;">
                            <option value="" selected>طرف حساب را انتخاب کنید
                            </option>
                            @foreach ($taraf_hesabs as $taraf_hesab)
                                <option value={{ $taraf_hesab->id }}>
                                    {{ $taraf_hesab->fullname }}
                                </option>
                            @endforeach
                        </select>
                        <div id="add_taraf_hesab_name_error" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="add_form_date">تاریخ فرم</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id="add_form_date" name="add_form_date"
                                class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                            <div id="add_form_date_error" class="invalid-feedback" style="margin-right:38px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="add_form_number">شماره فرم</label>
                        <input type="text" id="add_form_number" name="add_form_number" class="form-control"
                            autocomplete="off" />
                        <div id="add_form_number_error" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="modal-header row d-flex justify-content-start mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="add_tab01" style="margin-right: 0px;">
                    <h6 class="font-weight-bold">نقد</h6>
                </div>
                <div class="tabs" id="add_tab02">
                    <h6 class="text-muted">چک های پرداختی</h6>
                </div>
                <div class="tabs" id="add_tab03">
                    <h6 class="text-muted">خرج چک</h6>
                </div>
                <div class="tabs" id="add_tab04">
                    <h6 class="text-muted">دریافت الکترونیکی «حواله / کارت خوان / اینترنتی»</h6>
                </div>
                <div class="tabs" id="add_tab05">
                    <h6 class="text-muted">تخفیف پرداختی</h6>
                </div>
                <div class="tabs" id="add_tab06">
                    <h6 class="text-muted">بابت فاکتورهای ...</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body" style="min-height: 330px">
                <!-- Tabs content -->
                <fieldset class="show" id="add_tab011">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_cash_amount">مبلغ نقدی</label>
                                <input type="text" id="add_cash_amount" name="add_cash_amount" class="form-control"
                                    autocomplete="off"
                                    onkeyup="separateNum(this.value,this,'add_cash_amount_price');" />
                                <div id="add_cash_amount_error" class="invalid-feedback"></div>
                                <div id="add_cash_amount_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_considerations1">ملاحظات</label>
                                <input type="text" id="add_considerations1" name="add_considerations1"
                                    class="form-control" autocomplete="off" />
                                <div id="add_considerations1_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_payment_for">بابت</label>
                                <input type="text" id="add_payment_for" name="add_payment_for"
                                    class="form-control" autocomplete="off" />
                                <div id="add_payment_for_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab021">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target="#addChequeBookList">
                                فهرست سریال چک
                            </button>
                            <div class="row pt-4">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_cheque_total">مبلغ چک</label>
                                        <input type="text" id="add_tab2_cheque_total" name="add_tab2_cheque_total"
                                            class="form-control" autocomplete="off"
                                            onkeyup="separateNum(this.value,this,'add_tab2_cheque_total_price');" />
                                        <div id="add_tab2_cheque_total_error" class="invalid-feedback"></div>
                                        <div id="add_tab2_cheque_total_price"
                                            style="text-align: justify; color:green">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_issue_date">تاریخ صدور</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" id="add_tab2_issue_date" name="add_tab2_issue_date"
                                                class="leftToRight rightAlign inputMaskDate form-control"
                                                autocomplete="off" />
                                            <div id="add_tab2_issue_date_error" class="invalid-feedback"
                                                style="margin-right:38px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_due_date">تاریخ سر رسید</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" id="add_tab2_due_date" name="add_tab2_due_date"
                                                class="leftToRight rightAlign inputMaskDate form-control"
                                                autocomplete="off" />
                                            <div id="add_tab2_due_date_error" class="invalid-feedback"
                                                style="margin-right:38px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_cheque_serial_number">سریال چک</label>
                                        <input type="text" id="add_tab2_cheque_serial_number"
                                            name="add_tab2_cheque_serial_number" class="form-control"
                                            autocomplete="off" />
                                        <div id="add_tab2_cheque_serial_number_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_bank_account_details">مشخصات حساب بانکی</label>
                                        <input type="text" id="add_tab2_bank_account_details"
                                            name="add_tab2_bank_account_details" class="form-control"
                                            autocomplete="off" />
                                        <div id="add_tab2_bank_account_details_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="add_tab2_consideration">ملاحظات</label>
                                        <input type="text" id="add_tab2_consideration"
                                            name="add_tab2_consideration" class="form-control" autocomplete="off" />
                                        <div id="add_tab2_consideration_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="show" id="add_tab031">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table id="tblAddPaymentToAccount2"
                                class="table-responsive table table-hover table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 100px">ردیف</th>
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
                <fieldset id="add_tab041">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_date">تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="add_date" name="add_date"
                                        class="leftToRight rightAlign inputMaskDate form-control"
                                        autocomplete="off" />
                                    <div id="add_date_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_bank_account_details">مشخصات حساب بانکی</label>
                                <select id="add_bank_account_details" name="add_bank_account_details"
                                    class="form-control select2" style="width: 100%;">
                                    <option value="" selected>حساب بانکی را
                                        انتخاب کنید</option>
                                    @foreach ($bank_accounts as $bank_account)
                                        <option value={{ $bank_account->id }}>
                                            {{ $bank_account->account_number }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="add_bank_account_details_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_deposit_amount">مبلغ واریزی</label>
                                <input type="text" id="add_deposit_amount" name="add_deposit_amount"
                                    class="form-control" autocomplete="off"
                                    onkeyup="separateNum(this.value,this,'add_deposit_amount_price');" />
                                <div id="add_deposit_amount_error" class="invalid-feedback"></div>
                                <div id="add_deposit_amount_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_wage">کارمزد</label>
                                <input type="text" id="add_wage" name="add_wage" class="form-control"
                                    autocomplete="off" onkeyup="separateNum(this.value,this,'add_wage_price');" />
                                <div id="add_wage_error" class="invalid-feedback"></div>
                                <div id="add_wage_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_issue_tracking">شماره پیگیری</label>
                                <input type="text" id="add_issue_tracking" name="add_issue_tracking"
                                    class="form-control" autocomplete="off" />
                                <div id="add_issue_tracking_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_considerations2">ملاحظات</label>
                                <input type="text" id="add_considerations2" name="add_considerations2"
                                    class="form-control" autocomplete="off" />
                                <div id="add_considerations2_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab051">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_paid_discount">تخفیف پرداختی</label>
                            <input type="text" id="add_paid_discount" name="add_paid_discount"
                                class="form-control" autocomplete="off"
                                onkeyup="separateNum(this.value,this,'add_paid_discount_price');" />
                            <div id="add_paid_discount_error" class="invalid-feedback"></div>
                            <div id="add_paid_discount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab061">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table id="tblAddPaymentToAccount3"
                                class="table-responsive table table-hover table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 100px">ردیف</th>
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
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addPaymentToAccount">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('financial-management.payment-to-account.add-cheque-book-list')
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addPaymentToAccount', function(e) {
                e.preventDefault();

                var data = {
                    'taraf_hesab_name': $('#add_taraf_hesab_name').val(),
                    'form_date': $('#add_form_date').val(),
                    'form_number': $('#add_form_number').val(),
                    'cash_amount': $('#add_cash_amount').val(),
                    'considerations1': $('#add_considerations1').val(),
                    'payment_for': $('#add_payment_for').val(),
                    'tab2_cheque_total': $('#add_tab2_cheque_total').val(),
                    'tab2_issue_date': $('#add_tab2_issue_date').val(),
                    'tab2_due_date': $('#add_tab2_due_date').val(),
                    'tab2_cheque_serial_number': $('#add_tab2_cheque_serial_number').val(),
                    'tab2_bank_account_details': $('#add_tab2_bank_account_details').val(),
                    'tab2_consideration': $('#add_tab2_consideration').val(),
                    'date': $('#add_date').val(),
                    'bank_account_details': $('#add_bank_account_details').val(),
                    'deposit_amount': $('#add_deposit_amount').val(),
                    'wage': $('#add_wage').val(),
                    'issue_tracking': $('#add_issue_tracking').val(),
                    'considerations2': $('#add_considerations2').val(),
                    'paid_discount': $('#add_paid_discount').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/payment-to-account",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        fetchDataAsPaginate
                            (
                                'index_search',
                                '/payment-to-account',
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
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                add_clearPrice();
                                add_defaultSelectedValue();
                            });
                    },

                    error: function(errors) {
                        add_clearErrors();
                        add_clearPrice();
                        add_defaultSelectedValue();
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

        // call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");

            if (!$("#add_tab01").hasClass("active")) {
                $("#add_tab01 h6").removeClass("text-muted");
                $("#add_tab02 h6").addClass("text-muted");
                $("#add_tab03 h6").addClass("text-muted");
                $("#add_tab04 h6").addClass("text-muted");
                $("#add_tab05 h6").addClass("text-muted");
                $("#add_tab06 h6").addClass("text-muted");
                $("#add_tab01").addClass("active");
                $("#add_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#add_tab011").hasClass("show")) {
                $("#add_tab011").addClass("show");
            }
        });

        // call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#add_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            add_clearErrors();
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_taraf_hesab_name_error").text("");
            $("#add_taraf_hesab_name").removeClass("is-invalid");
            $("#add_form_date_error").text("");
            $("#add_form_date").removeClass("is-invalid");
            $("#add_form_number_error").text("");
            $("#add_form_number").removeClass("is-invalid");
            $("#add_cash_amount_error").text("");
            $("#add_cash_amount").removeClass("is-invalid");
            $("#add_considerations1_error").text("");
            $("#add_considerations1").removeClass("is-invalid");
            $("#add_payment_for_error").text("");
            $("#add_payment_for").removeClass("is-invalid");
            $("#add_tab2_cheque_total_error").text("");
            $("#add_tab2_cheque_total").removeClass("is-invalid");
            $("#add_tab2_issue_date_error").text("");
            $("#add_tab2_issue_date").removeClass("is-invalid");
            $("#add_tab2_due_date_error").text("");
            $("#add_tab2_due_date").removeClass("is-invalid");
            $("#add_tab2_cheque_serial_number_error").text("");
            $("#add_tab2_cheque_serial_number").removeClass("is-invalid");
            $("#add_tab2_bank_account_details_error").text("");
            $("#add_tab2_bank_account_details").removeClass("is-invalid");
            $("#add_tab2_consideration_error").text("");
            $("#add_tab2_consideration").removeClass("is-invalid");
            $("#add_date_error").text("");
            $("#add_date").removeClass("is-invalid");
            $("#add_bank_account_details_error").text("");
            $("#add_bank_account_details").removeClass("is-invalid");
            $("#add_deposit_amount_error").text("");
            $("#add_deposit_amount").removeClass("is-invalid");
            $("#add_wage_error").text("");
            $("#add_wage").removeClass("is-invalid");
            $("#add_issue_tracking_error").text("");
            $("#add_issue_tracking").removeClass("is-invalid");
            $("#add_considerations2_error").text("");
            $("#add_considerations2").removeClass("is-invalid");
            $("#add_paid_discount_error").text("");
            $("#add_paid_discount").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_cash_amount_price").text("");
            $("#add_tab2_cheque_total_price").text("");
            $("#add_deposit_amount_price").text("");
            $("#add_wage_price").text("");
            $("#add_paid_discount_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_taraf_hesab_name).prop('selectedIndex', 0).change();
            $(add_bank_account_details).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
