<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">ورود اطلاعات فاکتور ضایعات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" id="add_hidden_div" style="display: none;">
                        <div class="form-group mb-3">
                            <button type="button" class="add_collapsible">
                                در این بخش می توانید مشخصات مشتری رهگذر را وارد کنید
                            </button>
                            <div class="expansion">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_national_code">کد ملی</label>
                                                <input type="text" id="add_national_code" name="add_national_code"
                                                    class="form-control leftToRight rightAlign inputMaskNationalCode"
                                                    autocomplete="off" />
                                                <div id="add_national_code_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_viator">نام رهگذر</label>
                                                <input type="text" id="add_viator" name="add_viator"
                                                    class="form-control" autocomplete="off" />
                                                <div id="add_viator_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_tel">تلفن</label>
                                                <input type="text" id="add_tel" name="add_tel"
                                                    class="form-control leftToRight rightAlign inputMaskTel"
                                                    autocomplete="off" />
                                                <div id="add_tel_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_address">آدرس</label>
                                                <input type="text" id="add_address" name="add_address"
                                                    class="form-control" autocomplete="off" />
                                                <div id="add_address_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" id="add_hidden_wastage_type" style="display: none;">
                        <div class="form-group mb-3">
                            <button type="button" class="add_collapsible">
                                در این بخش می توانید نوع و نام مشتری را انتخاب کنید
                            </button>
                            <div class="expansion">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_customer_type">نوع مشتری</label>
                                                <select id="add_customer_type" name="add_customer_type"
                                                    class="form-control select2" style="width: 100%;"
                                                    onChange="addCustomerType('add_hidden_div',this.value)">
                                                    <option value="" selected>نوع مشتری را انتخاب کنید</option>
                                                    {{-- @foreach ($publishers as $publisher) --}}
                                                    <option value="1">
                                                        مشتری دائم
                                                    </option>
                                                    <option value="2">
                                                        مشتری رهگذر
                                                    </option>
                                                    {{-- @endforeach --}}
                                                </select>
                                                <div id="add_customer_type_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="add_buyer">خریدار</label>
                                                <select id="add_buyer" name="add_buyer" class="form-control select2"
                                                    style="width: 100%;">
                                                    <option value="" selected>خریدار را انتخاب کنید</option>
                                                    @foreach ($buyers as $item)
                                                        <option value={{ $item->id }}>
                                                            {{ $item->fullname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div id="add_buyer_error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_wastage_type">نوع ضایعات</label>
                            <select id="add_wastage_type" name="add_wastage_type" class="form-control select2"
                                style="width: 100%;"
                                onChange="addWastageType('add_hidden_wastage_type','add_hidden_div',this.value)">
                                <option value="" selected>نوع ضایعات را انتخاب کنید</option>
                                {{-- @foreach ($publishers as $publisher) --}}
                                <option value="1">
                                    غیر قابل استفاده
                                </option>
                                <option value="2">
                                    قابل فروش
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_wastage_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_no">شماره فاکتور</label>
                            <input type="text" id="add_factor_no" name="add_factor_no" class="form-control"
                                autocomplete="off" />
                            <div id="add_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_date">تاریخ فاکتور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_factor_date" name="add_factor_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_factor_date_error" class="invalid-feedback" style="margin-right:38px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_settlement_deadline">مهلت تسویه</label>
                            <input type="text" id="add_settlement_deadline" name="add_settlement_deadline"
                                class="form-control" autocomplete="off" />
                            <div id="add_settlement_deadline_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_settlement_date">تاریخ تسویه</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_settlement_date" name="add_settlement_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_settlement_date_error" class="invalid-feedback"
                                    style="margin-right:38px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInvoice">
                        <span data-toggle="tooltip" title="افزودن کالا به لیست فاکتور">
                            <i class="fa-lg fa fa-plus"></i>&nbsp;
                            افزودن کالا
                        </span>
                    </button>
                </div>

                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addWastageFactor">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@include('buy-sell.wastage-factor-details.create')

@push('js')
    <script>
        var coll = document.getElementsByClassName("add_collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        function addCustomerType(divId, element) {
            if (element == 2) {
                document.getElementById(divId).style.display = 'block';
                $(add_buyer).prop('selectedIndex', 0).change();
                document.getElementById("add_buyer").disabled = true;
                $("#add_buyer_error").text("");
                $("#add_buyer").removeClass("is-invalid");
            } else {
                document.getElementById(divId).style.display = 'none';
                document.getElementById("add_buyer").disabled = false;
                $('#add_national_code').val("");
                $('#add_viator').val("");
                $('#add_tel').val("");
                $('#add_address').val("");
            }
        }

        function addWastageType(divWastage, divCustomer, element) {
            if (element == 2) {
                document.getElementById(divWastage).style.display = 'block';
                $(add_buyer).prop('selectedIndex', 0).change();
                document.getElementById("add_buyer").disabled = true;
                $("#add_buyer_error").text("");
                $("#add_buyer").removeClass("is-invalid");
            } else {
                document.getElementById(divWastage).style.display = 'none';
                document.getElementById(divCustomer).style.display = 'none';
                document.getElementById("add_buyer").disabled = false;
                $('#add_national_code').val("");
                $('#add_viator').val("");
                $('#add_tel').val("");
                $('#add_address').val("");
                $(add_customer_type).prop('selectedIndex', 0).change();
                $(add_buyer).prop('selectedIndex', 0).change();
            }
        }

        $(document).ready(function() {
            $(document).on('click', '.addWastageFactor', function(e) {
                e.preventDefault();

                var data = {
                    'national_code': $('#add_national_code').val(),
                    'viator': $('#add_viator').val(),
                    'tel': $('#add_tel').val(),
                    'address': $('#add_address').val(),
                    'wastage_type': $('#add_wastage_type').val(),
                    'customer_type': $('#add_customer_type').val(),
                    'buyer': $('#add_buyer').val(),
                    'factor_no': $('#add_factor_no').val(),
                    'factor_date': $('#add_factor_date').val(),
                    'commission': $('#add_commission').val(),
                    'settlement_deadline': $('#add_settlement_deadline').val(),
                    'settlement_date': $('#add_settlement_date').val(),
                    'factor_items': factors
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/wastage-factor",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        fetchDataAsPaginate
                            (
                                'index_invoice_search',
                                '/wastage-factor',
                                1,
                                10,
                                'index_count',
                                'myData',
                                'index_pagination'
                            );
                        factors = [];
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
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
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_national_code_error").text("");
            $("#add_national_code").removeClass("is-invalid");
            $("#add_viator_error").text("");
            $("#add_viator").removeClass("is-invalid");
            $("#add_tel_error").text("");
            $("#add_tel").removeClass("is-invalid");
            $("#add_address_error").text("");
            $("#add_address").removeClass("is-invalid");
            $("#add_wastage_type_error").text("");
            $("#add_wastage_type").removeClass("is-invalid");
            $("#add_customer_type_error").text("");
            $("#add_customer_type").removeClass("is-invalid");
            $("#add_buyer_error").text("");
            $("#add_buyer").removeClass("is-invalid");
            $("#add_factor_no_error").text("");
            $("#add_factor_no").removeClass("is-invalid");
            $("#add_factor_date_error").text("");
            $("#add_factor_date").removeClass("is-invalid");
            $("#add_commission_error").text("");
            $("#add_commission").removeClass("is-invalid");
            $("#add_settlement_date_error").text("");
            $("#add_settlement_date").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $(add_wastage_type).prop('selectedIndex', 0).change();
            $(add_customer_type).prop('selectedIndex', 0).change();
            $(add_buyer).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
