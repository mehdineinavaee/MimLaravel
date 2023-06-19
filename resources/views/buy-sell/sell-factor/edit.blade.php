<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش فاکتور فروش</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_sell_factor_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_customer_type">نوع مشتری</label>
                            <select id="edit_customer_type" name="edit_customer_type" class="form-control select2"
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
                            <div id="edit_customer_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_buyer">خریدار</label>
                            <select id="edit_buyer" name="edit_buyer" class="form-control select2" style="width: 100%;">
                                <option value="" selected>خریدار را انتخاب کنید</option>
                                @foreach ($buyers as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_buyer_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_factor_no">شماره فاکتور</label>
                            <input type="text" id="edit_factor_no" name="edit_factor_no" class="form-control"
                                autocomplete="off" />
                            <div id="edit_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_factor_date">تاریخ فاکتور</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_factor_date" name="edit_factor_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_factor_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_broker">واسطه فروش</label>
                            <select id="edit_broker" name="edit_broker" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                @foreach ($brokers as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_broker_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_commission">پورسانت</label>
                            <input type="text" id="edit_commission" name="edit_commission" class="form-control"
                                autocomplete="off" />
                            <div id="edit_commission_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_settlement_deadline">مهلت تسویه</label>
                            <input type="text" id="edit_settlement_deadline" name="edit_settlement_deadline"
                                class="form-control" autocomplete="off" />
                            <div id="edit_settlement_deadline_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_settlement_date">تاریخ تسویه</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_settlement_date" name="edit_settlement_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_settlement_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editInvoice">
                        <i class="fa-lg fa fa-search" title="مشاهده جزئیات فاکتور" data-toggle="tooltip"></i>&nbsp;
                        حذف / ویرایش اقلام فاکتور
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateSellFactor">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@include('buy-sell.sell-factor-details.edit')

@push('js')
    <script>
        $(document).on('click', '.edit_sell_factor', function(e) {
            e.preventDefault();
            var sell_factor_id = $(this).val();
            // console.log(sell_factor_id);

            $.ajax({
                type: "GET",
                url: "/sell-factor/" + sell_factor_id + "/edit",
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

                        $("#edit_sell_factor_id").val(sell_factor_id);
                        $('#edit_customer_type').val(response.sell_factor.customer_type).change();
                        $('#edit_buyer').val(response.sell_factor.buyer_id).change();
                        $("#edit_factor_no").val(response.sell_factor.factor_no);
                        $("#edit_factor_date").val(response.sell_factor.factor_date);
                        $('#edit_broker').val(response.sell_factor.broker_id).change();
                        $("#edit_commission").val(response.sell_factor
                            .commission);
                        $("#edit_settlement_deadline").val(response.sell_factor.settlement_deadline);
                        $("#edit_settlement_date").val(response.sell_factor
                            .settlement_date);
                    }
                },
            });
        });

        $(document).on("click", ".updateSellFactor", function(e) {
            e.preventDefault();
            var sell_factor_id = $("#edit_sell_factor_id").val();

            var data = {
                customer_type: $('#edit_customer_type').val(),
                buyer: $('#edit_buyer').val(),
                factor_no: $('#edit_factor_no').val(),
                factor_date: $('#edit_factor_date').val(),
                broker: $('#edit_broker').val(),
                commission: $('#edit_commission').val(),
                settlement_deadline: $('#edit_settlement_deadline').val(),
                settlement_date: $('#edit_settlement_date').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/sell-factor/" + sell_factor_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: response.message,
                        })
                    } else {
                        $('#myData').html(response.output);
                        $('#pagination').html(response.pagination);
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#editInfo").modal("hide");
                                $("#editInfo").find("input").val("");
                                edit_clearErrors();
                                edit_defaultSelectedValue();
                            });
                    }
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
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_customer_type_error").text("");
            $("#edit_customer_type").removeClass("is-invalid");
            $("#edit_buyer_error").text("");
            $("#edit_buyer").removeClass("is-invalid");
            $("#edit_factor_no_error").text("");
            $("#edit_factor_no").removeClass("is-invalid");
            $("#edit_factor_date_error").text("");
            $("#edit_factor_date").removeClass("is-invalid");
            $("#edit_broker_error").text("");
            $("#edit_broker").removeClass("is-invalid");
            $("#edit_commission_error").text("");
            $("#edit_commission").removeClass("is-invalid");
            $("#edit_settlement_date_error").text("");
            $("#edit_settlement_date").removeClass("is-invalid");
        }

        function edit_defaultSelectedValue() {
            $(edit_customer_type).prop('selectedIndex', 0).change();
            $(edit_buyer).prop('selectedIndex', 0).change();
            $(edit_broker).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
