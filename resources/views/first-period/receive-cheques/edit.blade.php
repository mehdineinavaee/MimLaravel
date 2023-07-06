<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش چک های دریافتی اول دوره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_receive_cheques_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_amount">مبلغ چک</label>
                            <input type="text" id="edit_amount" name="edit_amount" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_amount_price');" />
                            <div id="edit_amount_error" class="invalid-feedback"></div>
                            <div id="edit_amount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_issue_date">تاریخ صدور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_issue_date" name="edit_issue_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_issue_date_error" class="invalid-feedback" style="margin-right:38px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_due_date">تاریخ سر رسید</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_due_date" name="edit_due_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_due_date_error" class="invalid-feedback" style="margin-right:38px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_serial_number">شماره سریال چک</label>
                            <input type="text" id="edit_serial_number" name="edit_serial_number" class="form-control"
                                autocomplete="off" />
                            <div id="edit_serial_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_bank_name">نام بانک و شعبه</label>
                            <input type="text" id="edit_bank_name" name="edit_bank_name" class="form-control"
                                autocomplete="off" />
                            <div id="edit_bank_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_account_number">شماره حساب</label>
                            <input type="text" id="edit_account_number" name="edit_account_number"
                                class="form-control" autocomplete="off" />
                            <div id="edit_account_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_payer">پرداخت کننده چک</label>
                            <select id="edit_payer" name="edit_payer" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>پرداخت کننده چک را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value="{{ $taraf_hesab->id }}">
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_payer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
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
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateReceiveCheques">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_receive_cheques', function(e) {
            e.preventDefault();
            var receive_cheques_id = $(this).val();
            // console.log(receive_cheques_id);

            $.ajax({
                type: "GET",
                url: "/receive-cheques/" + receive_cheques_id + "/edit",
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
                        $("#edit_receive_cheques_id").val(receive_cheques_id);

                        $('#edit_amount').val(new Intl.NumberFormat().format(response.receive_cheque
                            .amount));
                        $("#edit_issue_date").val(response.receive_cheque.issue_date);
                        $("#edit_due_date").val(response.receive_cheque.due_date);
                        $("#edit_serial_number").val(response.receive_cheque.serial_number);
                        $("#edit_bank_name").val(response.receive_cheque.bank_name);
                        $("#edit_account_number").val(response.receive_cheque.account_number);
                        $('#edit_payer').val(response.receive_cheque.payer_id).change();
                        $("#edit_considerations").val(response.receive_cheque.considerations);
                    }
                },
            });
        });

        $(document).on("click", ".updateReceiveCheques", function(e) {
            e.preventDefault();
            var receive_cheques_id = $("#edit_receive_cheques_id").val();

            var data = {
                'amount': $('#edit_amount').val(),
                'issue_date': $('#edit_issue_date').val(),
                'due_date': $('#edit_due_date').val(),
                'serial_number': $('#edit_serial_number').val(),
                'bank_name': $('#edit_bank_name').val(),
                'account_number': $('#edit_account_number').val(),
                'payer': $('#edit_payer').val(),
                'considerations': $('#edit_considerations').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/receive-cheques/" + receive_cheques_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/receive-cheques',
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
        });

        // call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_clearErrors();
            edit_clearPrice();
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_issue_date_error").text("");
            $("#edit_issue_date").removeClass("is-invalid");
            $("#edit_due_date_error").text("");
            $("#edit_due_date").removeClass("is-invalid");
            $("#edit_serial_number_error").text("");
            $("#edit_serial_number").removeClass("is-invalid");
            $("#edit_bank_name_error").text("");
            $("#edit_bank_name").removeClass("is-invalid");
            $("#edit_account_number_error").text("");
            $("#edit_account_number").removeClass("is-invalid");
            $("#edit_payer_error").text("");
            $("#edit_payer").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_amount_price").text("");
        }

        function edit_defaultSelectedValue() {
            $(edit_payer).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
