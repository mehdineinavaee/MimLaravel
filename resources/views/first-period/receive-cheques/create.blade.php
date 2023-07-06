<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">چک های دریافتی اول دوره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_amount">مبلغ چک</label>
                            <input type="text" id="add_amount" name="add_amount" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_amount_price');" />
                            <div id="add_amount_error" class="invalid-feedback"></div>
                            <div id="add_amount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_issue_date">تاریخ صدور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_issue_date" name="add_issue_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_issue_date_error" class="invalid-feedback" style="margin-right:38px;">
                                </div>
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
                                <div id="add_due_date_error" class="invalid-feedback" style="margin-right:38px;"></div>
                            </div>
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
                            <label for="add_bank_name">نام بانک و شعبه</label>
                            <input type="text" id="add_bank_name" name="add_bank_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_bank_name_error" class="invalid-feedback"></div>
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
                            <label for="add_payer">پرداخت کننده چک</label>
                            <select id="add_payer" name="add_payer" class="form-control select2" style="width: 100%;">
                                <option value="" selected>پرداخت کننده چک را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value="{{ $taraf_hesab->id }}">
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_payer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
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
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addReceiveCheques">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addReceiveCheques', function(e) {
                e.preventDefault();

                var data = {
                    'amount': $('#add_amount').val(),
                    'issue_date': $('#add_issue_date').val(),
                    'due_date': $('#add_due_date').val(),
                    'serial_number': $('#add_serial_number').val(),
                    'bank_name': $('#add_bank_name').val(),
                    'account_number': $('#add_account_number').val(),
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
                    url: "/receive-cheques",
                    data: data,
                    dataType: "json",

                    success: function(response) {
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

        // call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        // call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_amount_error").text("");
            $("#add_amount").removeClass("is-invalid");
            $("#add_issue_date_error").text("");
            $("#add_issue_date").removeClass("is-invalid");
            $("#add_due_date_error").text("");
            $("#add_due_date").removeClass("is-invalid");
            $("#add_serial_number_error").text("");
            $("#add_serial_number").removeClass("is-invalid");
            $("#add_bank_name_error").text("");
            $("#add_bank_name").removeClass("is-invalid");
            $("#add_account_number_error").text("");
            $("#add_account_number").removeClass("is-invalid");
            $("#add_payer_error").text("");
            $("#add_payer").removeClass("is-invalid");
            $("#add_considerations_error").text("");
            $("#add_considerations").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_amount_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_payer).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
