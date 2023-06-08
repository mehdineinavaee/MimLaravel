<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">انتقال بین اشخاص جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row pt-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_from_taraf_hesab">از طرف حساب</label>
                            <select id="add_from_taraf_hesab" name="add_from_taraf_hesab" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>طرف حساب را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value={{ $taraf_hesab->id }}>
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_from_taraf_hesab_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_to_taraf_hesab">به طرف حساب</label>
                            <select id="add_to_taraf_hesab" name="add_to_taraf_hesab" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>طرف حساب را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value={{ $taraf_hesab->id }}>
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_to_taraf_hesab_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_form_number">شماره فرم</label>
                            <input type="text" id="add_form_number" name="add_form_number" class="form-control"
                                autocomplete="off" />
                            <div id="add_form_number_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_cash_amount">مبلغ نقدی</label>
                            <input type="text" id="add_cash_amount" name="add_cash_amount" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_cash_amount_price');" />
                            <div id="add_cash_amount_error" class="invalid-feedback"></div>
                            <div id="add_cash_amount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_document">شرح سند</label>
                            <input type="text" id="add_document" name="add_document" class="form-control"
                                autocomplete="off" />
                            <div id="add_document_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addTransferPerson">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addTransferPerson', function(e) {
                e.preventDefault();

                var data = {
                    'from_taraf_hesab': $('#add_from_taraf_hesab').val(),
                    'to_taraf_hesab': $('#add_to_taraf_hesab').val(),
                    'form_date': $('#add_form_date').val(),
                    'form_number': $('#add_form_number').val(),
                    'cash_amount': $('#add_cash_amount').val(),
                    'document': $('#add_document').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/transfer-person",
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
            $("#add_from_taraf_hesab_error").text("");
            $("#add_from_taraf_hesab").removeClass("is-invalid");
            $("#add_to_taraf_hesab_error").text("");
            $("#add_to_taraf_hesab").removeClass("is-invalid");
            $("#add_form_date_error").text("");
            $("#add_form_date").removeClass("is-invalid");
            $("#add_form_number_error").text("");
            $("#add_form_number").removeClass("is-invalid");
            $("#add_cash_amount_error").text("");
            $("#add_cash_amount").removeClass("is-invalid");
            $("#add_document_error").text("");
            $("#add_document").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_cash_amount_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_from_taraf_hesab).prop('selectedIndex', 0).change();
            $(add_to_taraf_hesab).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
