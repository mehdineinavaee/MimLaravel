<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">دریافت درآمد متفرقه جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row m-4">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="add_income_title">عنوان درآمد</label>
                        <select id="add_income_title" name="add_income_title" class="form-control select2"
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
                        <div id="add_income_title_error" class="invalid-feedback"></div>
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
                                class="normal-example form-control" autocomplete="off" />
                            <div id="add_form_date_error" class="invalid-feedback"></div>
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

            <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="add_tab01">
                    <h6 class="font-weight-bold">نقد</h6>
                </div>
                <div class="tabs" id="add_tab02">
                    <h6 class="text-muted">چک های دریافتی</h6>
                </div>
                <div class="tabs" id="add_tab03">
                    <h6 class="text-muted">دریافت الکترونیکی «حواله / کارت خوان / اینترنتی»</h6>
                </div>
            </div>
            <div class="line"></div>

            <div class="modal-body" style="min-height: 330px">
                <!-- Tabs content -->
                <fieldset class="show" id="add_tab011">
                    <div class="row pt-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_cash_amount">مبلغ نقدی</label>
                                <input type="text" id="add_cash_amount" name="add_cash_amount" class="form-control"
                                    autocomplete="off" />
                                <div id="add_cash_amount_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_considerations1">ملاحظات</label>
                                <input type="text" id="add_considerations1" name="add_considerations1"
                                    class="form-control" autocomplete="off" />
                                <div id="add_considerations1_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab021">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table id="example1" class="table-responsive table table-bordered table-striped"
                                style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th style="min-width: 200px">مبلغ چک</th>
                                        <th style="min-width: 200px">تاریخ صدور</th>
                                        <th style="min-width: 200px">تاریخ سر رسید</th>
                                        <th style="min-width: 200px">سریال چک</th>
                                        <th style="min-width: 200px">ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>مبلغ چک</th>
                                        <th>تاریخ صدور</th>
                                        <th>تاریخ سر رسید</th>
                                        <th>سریال چک</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab031">
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_date">تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="add_date" name="add_date"
                                        class="normal-example form-control" autocomplete="off" />
                                    <div id="add_date_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_bank_account_details">مشخصات حساب بانکی</label>
                                <select id="add_bank_account_details" name="add_bank_account_details"
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
                                <div id="add_bank_account_details_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_deposit_amount">مبلغ واریزی</label>
                                <input type="text" id="add_deposit_amount" name="add_deposit_amount"
                                    class="form-control" autocomplete="off" />
                                <div id="add_deposit_amount_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_wage">کارمزد</label>
                                <input type="text" id="add_wage" name="add_wage" class="form-control"
                                    autocomplete="off" />
                                <div id="add_wage_error" class="invalid-feedback"></div>
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
                <!-- Tabs content -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addReceiveMiscellaneousIncome">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addReceiveMiscellaneousIncome', function(e) {
                e.preventDefault();

                var data = {
                    'income_title': $('#add_income_title').val(),
                    'form_date': $('#add_form_date').val(),
                    'form_number': $('#add_form_number').val(),
                    'cash_amount': $('#add_cash_amount').val(),
                    'considerations1': $('#add_considerations1').val(),
                    'date': $('#add_date').val(),
                    'bank_account_details': $('#add_bank_account_details').val(),
                    'deposit_amount': $('#add_deposit_amount').val(),
                    'wage': $('#add_wage').val(),
                    'issue_tracking': $('#add_issue_tracking').val(),
                    'considerations2': $('#add_considerations2').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/receive-miscellaneous-income",
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
                                fetchReceiveMiscellaneousIncome();
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

            if (!$("#add_tab01").hasClass("active")) {
                $("#add_tab01 h6").removeClass("text-muted");
                $("#add_tab02 h6").addClass("text-muted");
                $("#add_tab03 h6").addClass("text-muted");
                $("#add_tab01").addClass("active");
                $("#add_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#add_tab011").hasClass("show")) {
                $("#add_tab011").addClass("show");
            }
        });

        //call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#add_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            add_clearErrors();
        })

        function add_clearErrors() {
            $("#add_income_title_error").text("");
            $("#add_income_title").removeClass("is-invalid");
            $("#add_form_date_error").text("");
            $("#add_form_date").removeClass("is-invalid");
            $("#add_form_number_error").text("");
            $("#add_form_number").removeClass("is-invalid");
            $("#add_cash_amount_error").text("");
            $("#add_cash_amount").removeClass("is-invalid");
            $("#add_considerations1_error").text("");
            $("#add_considerations1").removeClass("is-invalid");
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
        }
    </script>
@endpush
