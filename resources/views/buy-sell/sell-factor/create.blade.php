<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width:50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">ورود اطلاعات فاکتور فروش</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_customer_type">نوع مشتری</label>
                            <select id="add_customer_type" name="add_customer_type" class="form-control select2"
                                style="width: 100%;">
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
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_buyer">خریدار</label>
                            <select id="add_buyer" name="add_buyer" class="form-control select2" style="width: 100%;">
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
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_no">شماره فاکتور</label>
                            <input type="text" id="add_factor_no" name="add_factor_no" class="form-control"
                                autocomplete="off" />
                            <div id="add_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_factor_date">تاریخ فاکتور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_factor_date" name="add_factor_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_factor_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_broker">واسطه فروش</label>
                            <select id="add_broker" name="add_broker" class="form-control select2" style="width: 100%;">
                                <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                @foreach ($brokers as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_broker_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_commission">پورسانت</label>
                            <input type="text" id="add_commission" name="add_commission" class="form-control"
                                autocomplete="off" />
                            <div id="add_commission_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_settlement_deadline">مهلت تسویه</label>
                            <input type="text" id="add_settlement_deadline" name="add_settlement_deadline"
                                class="form-control" autocomplete="off" />
                            <div id="add_settlement_deadline_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_settlement_date">تاریخ تسویه</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_settlement_date" name="add_settlement_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_settlement_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInvoice">
                        <i class="fa-lg fa fa-plus" title="افزودن اقلام فاکتور" data-toggle="tooltip"></i>&nbsp;
                        اقلام جدید فاکتور
                    </button>
                </div>

                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addSellFactor">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@include('buy-sell.sell-factor-details.create')

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addSellFactor', function(e) {
                e.preventDefault();

                var data = {
                    'customer_type': $('#add_customer_type').val(),
                    'buyer': $('#add_buyer').val(),
                    'factor_no': $('#add_factor_no').val(),
                    'factor_date': $('#add_factor_date').val(),
                    'broker': $('#add_broker').val(),
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
                    url: "/sell-factor",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        $('#myData').html(response.output);
                        $('#pagination').html(response.pagination);
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
            $("#add_customer_type_error").text("");
            $("#add_customer_type").removeClass("is-invalid");
            $("#add_buyer_error").text("");
            $("#add_buyer").removeClass("is-invalid");
            $("#add_factor_no_error").text("");
            $("#add_factor_no").removeClass("is-invalid");
            $("#add_factor_date_error").text("");
            $("#add_factor_date").removeClass("is-invalid");
            $("#add_broker_error").text("");
            $("#add_broker").removeClass("is-invalid");
            $("#add_commission_error").text("");
            $("#add_commission").removeClass("is-invalid");
            $("#add_settlement_date_error").text("");
            $("#add_settlement_date").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $(add_customer_type).prop('selectedIndex', 0).change();
            $(add_buyer).prop('selectedIndex', 0).change();
            $(add_broker).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
