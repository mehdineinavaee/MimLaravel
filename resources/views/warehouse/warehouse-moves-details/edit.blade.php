<!-- Modal -->
<div class="modal fade" id="editInvoice" data-backdrop="static" data-keyboard="false" aria-labelledby="editInvoiceLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width:50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvoiceLabel">حذف / ویرایش اقلام حواله</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <table id="edit_invoice_table"
                        class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center; max-height: 180px;">
                        <thead>
                            <tr>
                                <th style="min-width: 100px">کد کالا</th>
                                <th style="min-width: 420px">نام کالا</th>
                                <th style="min-width: 200px">مقدار</th>
                            </tr>
                        </thead>
                        <tbody id="edit_product_data">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th>مقدار</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div id="edit_product_pagination"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="edit_count">0</span>
                    </div>
                    <input type="hidden" id="edit_product_id" name="edit_product_id" disabled />
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product_code">کد کالا</label>
                            <input type="text" id="edit_product_code" name="edit_product_code" class="form-control"
                                autocomplete="off" disabled />
                            <div id="edit_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product_name">نام کالا</label>
                            <input type="text" id="edit_product_name" name="edit_product_name" class="form-control"
                                autocomplete="off" disabled />
                            <div id="edit_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_amount">مقدار</label>
                            <input type="text" id="edit_amount" name="edit_amount" class="form-control"
                                autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="edit_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_pre_transmitter">موجودی انبار فرستنده قبل از انتقال</label>
                            <input type="text" id="edit_pre_transmitter" name="edit_pre_transmitter"
                                class="form-control" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="edit_pre_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_next_transmitter">موجودی انبار فرستنده بعد از انتقال</label>
                            <input type="text" id="edit_next_transmitter" name="edit_next_transmitter"
                                class="form-control leftToRight rightAlign" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="edit_next_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_pre_receiver">موجودی انبار گیرنده قبل از انتقال</label>
                            <input type="text" id="edit_pre_receiver" name="edit_pre_receiver" class="form-control"
                                autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="edit_pre_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_next_receiver">موجودی انبار گیرنده بعد از انتقال</label>
                            <input type="text" id="edit_next_receiver" name="edit_next_receiver"
                                class="form-control leftToRight rightAlign" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="edit_next_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-success editInvoiceList" title="ویرایش کالا در لیست حواله"
                        data-toggle="tooltip">
                        <i class="fa-lg fa fa-edit"></i>&nbsp;
                        ویرایش
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

@push('js')
    <script>
        function editFetchProducts() {
            var warehouse_move_id = $("#edit_warehouse_move_id").val();

            $.ajax({
                type: "GET",
                url: "/warehouse-moves-detail/" + warehouse_move_id + "/edit",
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        // console.log(response);
                        $('#edit_count').html(response.count);
                        $('#edit_product_data').html(response.warehouse_move_by_id);
                    }
                },
            });
        }

        $(document).ready(function() {
            $('#edit_amount').on('keyup', function() {
                var amount = $(this).val();
                if (amount.length > 0) {
                    var edit_pre_transmitter = $("#edit_pre_transmitter").val();
                    var edit_pre_receiver = $("#edit_pre_receiver").val();
                    var next_transmitter = parseInt(edit_pre_transmitter) - parseInt(amount);
                    var next_receiver = parseInt(edit_pre_receiver) + parseInt(amount);
                    if (next_transmitter >= 0 && next_receiver >= 0) {
                        $("#edit_next_transmitter").val(next_transmitter);
                        $("#edit_next_receiver").val(next_receiver);
                    } else {
                        $("#edit_next_transmitter").val("");
                        $("#edit_next_receiver").val("");
                    }
                } else {
                    $("#edit_next_transmitter").val("");
                    $("#edit_next_receiver").val("");
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.editInvoiceList', function(e) {
                console.log("TEST");
            });
        });

        // call function on modal shown
        $('#editInvoice').on('shown.bs.modal', function(e) {
            // alert("hello");
            editFetchProducts();
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        // call function on hiding modal
        $('#editInvoice').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_invoiceClearErrors();
            $("#editInvoice").find("input").val(""); // Clear Input Values
        })

        function edit_invoiceClearErrors() {
            $("#edit_product_code_error").text("");
            $("#edit_product_code").removeClass("is-invalid");
            $("#edit_product_name_error").text("");
            $("#edit_product_name").removeClass("is-invalid");
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_pre_transmitter_error").text("");
            $("#edit_pre_transmitter").removeClass("is-invalid");
            $("#edit_next_transmitter_error").text("");
            $("#edit_next_transmitter").removeClass("is-invalid");
            $("#edit_pre_receiver_error").text("");
            $("#edit_pre_receiver").removeClass("is-invalid");
            $("#edit_next_receiver_error").text("");
            $("#edit_next_receiver").removeClass("is-invalid");
        }

        $(document).ready(function() {
            $("#edit_invoice_table").on('click', '.editRow', function() {
                var currentRow = $(this).closest("tr");
                var receiver_warehouse_id = $('#edit_receiver').val();
                var product_id = currentRow.find("td:eq(0)").html();
                $("#edit_product_id").val(product_id);
                $("#edit_product_code").val(currentRow.find("td:eq(1)").html());
                $("#edit_product_name").val(currentRow.find("td:eq(2)").html());
                $("#edit_amount").val(1);
                $("#edit_pre_transmitter").val(currentRow.find("td:eq(3)").html());
                $("#edit_next_transmitter").val(currentRow.find("td:eq(3)").html() - 1);
                $.ajax({
                    type: "GET",
                    url: "/receiver-warehouse-item/" + receiver_warehouse_id + "/" + product_id,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطا',
                                text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                            })
                        } else {
                            // console.log(response);
                            $("#edit_pre_receiver").val(response.amount);
                            $("#edit_next_receiver").val(parseInt(response.amount) + 1);
                        }
                    },
                });
            });
        });
    </script>
@endpush
