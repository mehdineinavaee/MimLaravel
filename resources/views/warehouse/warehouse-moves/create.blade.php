<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">ورود اطلاعات حواله انتقالی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="add_remittance_no">شماره سند</label>
                            <input type="text" id="add_remittance_no" name="add_remittance_no" class="form-control"
                                autocomplete="off" />
                            <div id="add_remittance_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="add_remittance_date">تاریخ سند</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="add_remittance_date" name="add_remittance_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="add_remittance_date_error" class="invalid-feedback" style="margin-right: 38px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="add_transmitter">نام انبار فرستنده</label>
                            <select id="add_transmitter" name="add_transmitter" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>انبار فرستنده را انتخاب کنید</option>
                                @foreach ($warehouses as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="add_receiver">نام انبار گیرنده</label>
                            <select id="add_receiver" name="add_receiver" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>انبار گیرنده را انتخاب کنید</option>
                                @foreach ($warehouses as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addWarehouseMove">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@include('warehouse.warehouse-moves-details.create')

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addWarehouseMove', function(e) {
                e.preventDefault();
                var isValid = add_validation();
                if (isValid) {
                    var transmitter_id = $('#add_transmitter').val();
                    var url = "/fetch-products-according-to-warehouses/" + transmitter_id;
                    fetchDataAsPaginate
                        (
                            'add_invoice_search', // search_element_id
                            url, // url
                            1, // page
                            10, // row
                            'add_count', // count_element_id
                            'add_product_data', // data_element_id
                            'add_product_pagination' // pagination_element_id
                        );
                    $('#createInfo').modal('hide');
                    $('#createInvoice').modal('show');
                }
            });
        });

        function add_validation() {
            add_clearErrors();
            var status = true;
            if ($('#add_remittance_no').val() == "") {
                $("#add_remittance_no_error").text("تکمیل گزینه شماره سند الزامی است");
                $("#add_remittance_no").addClass("is-invalid");
                status = false;
            }

            if ($('#add_remittance_date').val() == "") {
                $("#add_remittance_date_error").text("تکمیل گزینه تاریخ سند الزامی است");
                $("#add_remittance_date").addClass("is-invalid");
                status = false;
            }

            if ($('#add_transmitter').val() == "") {
                $("#add_transmitter_error").text("تکمیل گزینه نام انبار فرستنده الزامی است");
                $("#add_transmitter").addClass("is-invalid");
                status = false;
            }

            if ($('#add_receiver').val() == "") {
                $("#add_receiver_error").text("تکمیل گزینه نام انبار گیرنده الزامی است");
                $("#add_receiver").addClass("is-invalid");
                status = false;
            }

            if ($('#add_transmitter').val() == $('#add_receiver').val()) {
                Swal.fire(
                    "در انتخاب نام انبارها دقت کنید",
                    200,
                    'warning'
                )
                status = false;
            }

            return status;
        }

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
        })

        function add_clearErrors() {
            $("#add_remittance_no_error").text("");
            $("#add_remittance_no").removeClass("is-invalid");
            $("#add_remittance_date_error").text("");
            $("#add_remittance_date").removeClass("is-invalid");
            $("#add_transmitter_error").text("");
            $("#add_transmitter").removeClass("is-invalid");
            $("#add_receiver_error").text("");
            $("#add_receiver").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $(add_transmitter).prop('selectedIndex', 0).change();
            $(add_receiver).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
