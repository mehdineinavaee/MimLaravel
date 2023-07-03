<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش حواله انتقالی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_warehouse_move_id">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="edit_remittance_no">شماره سند</label>
                            <input type="text" id="edit_remittance_no" name="edit_remittance_no" class="form-control"
                                autocomplete="off" />
                            <div id="edit_remittance_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="edit_remittance_date">تاریخ سند</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="edit_remittance_date" name="edit_remittance_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="edit_remittance_date_error" class="invalid-feedback"
                                    style="margin-right:38px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="edit_transmitter">نام انبار فرستنده</label>
                            <select id="edit_transmitter" name="edit_transmitter" class="form-control select2"
                                style="width: 100%;" disabled>
                                <option value="" selected>انبار فرستنده را انتخاب کنید</option>
                                @foreach ($warehouses as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="edit_receiver">نام انبار گیرنده</label>
                            <select id="edit_receiver" name="edit_receiver" class="form-control select2"
                                style="width: 100%;" disabled>
                                <option value="" selected>انبار گیرنده را انتخاب کنید</option>
                                @foreach ($warehouses as $item)
                                    <option value={{ $item->id }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editInvoice">
                        <span data-toggle="tooltip" title="حذف / ویرایش">
                            <i class="fa-lg fa fa-list"></i>&nbsp;
                            مشاهده لیست حواله
                        </span>
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateWarehouseMove">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@include('warehouse.warehouse-moves-details.edit')

@push('js')
    <script>
        $(document).on('click', '.edit_warehouse_move', function(e) {
            e.preventDefault();
            var warehouse_move_id = $(this).val();
            // console.log(warehouse_move_id);

            $.ajax({
                type: "GET",
                url: "/warehouse-moves/" + warehouse_move_id + "/edit",
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

                        $("#edit_warehouse_move_id").val(warehouse_move_id);
                        $("#edit_remittance_no").val(response.warehouse_move.remittance_no);
                        $("#edit_remittance_date").val(response.warehouse_move.remittance_date);
                        $('#edit_transmitter').val(response.warehouse_move.transmitter_id).change();
                        $('#edit_receiver').val(response.warehouse_move.receiver_id).change();
                    }
                },
            });
        });

        $(document).on("click", ".updateWarehouseMove", function(e) {
            e.preventDefault();
            var warehouse_move_id = $("#edit_warehouse_move_id").val();

            var data = {
                remittance_no: $('#edit_remittance_no').val(),
                remittance_date: $('#edit_remittance_date').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/warehouse-moves/" + warehouse_move_id,
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
                        fetchDataAsPaginate
                            (
                                'index_invoice_search',
                                '/warehouse-moves',
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
            $("#edit_remittance_no_error").text("");
            $("#edit_remittance_no").removeClass("is-invalid");
            $("#edit_remittance_date_error").text("");
            $("#edit_remittance_date").removeClass("is-invalid");
            $("#edit_transmitter_error").text("");
            $("#edit_transmitter").removeClass("is-invalid");
            $("#edit_receiver_error").text("");
            $("#edit_receiver").removeClass("is-invalid");
        }

        function edit_defaultSelectedValue() {
            $(edit_transmitter).prop('selectedIndex', 0).change();
            $(edit_receiver).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
