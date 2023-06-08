<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">اعلام وصول چک های خوابانده شده جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_form_date">تاریخ فرم</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_form_date" name="add_form_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_form_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_form_number">شماره فرم</label>
                            <input type="text" id="add_form_number" name="add_form_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_form_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_mark_back">پشت نمره</label>
                            <input type="text" id="add_mark_back" name="add_mark_back" class="form-control"
                                autocomplete="off" />
                            <div id="add_mark_back_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_serial_number">شماره سریال چک</label>
                            <input type="text" id="add_serial_number" name="add_serial_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_serial_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_total">مبلغ چک</label>
                            <input type="text" id="add_total" name="add_total" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_total_price');" />
                            <div id="add_total_error" class="invalid-feedback"></div>
                            <div id="add_total_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_due_date">تاریخ سر رسید</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_due_date" name="add_due_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_due_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_bank_account_details">مشخصات حساب بانکی</label>
                            <select id="add_bank_account_details" name="add_bank_account_details"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>حساب بانکی را انتخاب کنید</option>
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
                            <label for="add_payer">پرداخت کننده</label>
                            <input type="text" id="add_payer" name="add_payer" class="form-control"
                                autocomplete="off" />
                            <div id="add_payer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_considerations">ملاحظات</label>
                            <input type="text" id="add_considerations" name="add_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="add_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addNotification">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addNotification', function(e) {
                e.preventDefault();

                var data = {
                    'form_date': $('#add_form_date').val(),
                    'form_number': $('#add_form_number').val(),
                    'mark_back': $('#add_mark_back').val(),
                    'serial_number': $('#add_serial_number').val(),
                    'total': $('#add_total').val(),
                    'due_date': $('#add_due_date').val(),
                    'bank_account_details': $('#add_bank_account_details').val(),
                    'payer': $('#add_payer').val(),
                    'considerations': $('#add_considerations').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/notification",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        $('#myData').html(response.output);
                        $('#pagination').html(response.pagination);
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
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_form_date_error").text("");
            $("#add_form_date").removeClass("is-invalid");
            $("#add_form_number_error").text("");
            $("#add_form_number").removeClass("is-invalid");
            $("#add_mark_back_error").text("");
            $("#add_mark_back").removeClass("is-invalid");
            $("#add_serial_number_error").text("");
            $("#add_serial_number").removeClass("is-invalid");
            $("#add_total_error").text("");
            $("#add_total").removeClass("is-invalid");
            $("#add_due_date_error").text("");
            $("#add_due_date").removeClass("is-invalid");
            $("#add_bank_account_details_error").text("");
            $("#add_bank_account_details").removeClass("is-invalid");
            $("#add_payer_error").text("");
            $("#add_payer").removeClass("is-invalid");
            $("#add_considerations_error").text("");
            $("#add_considerations").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_total_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_bank_account_details).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
