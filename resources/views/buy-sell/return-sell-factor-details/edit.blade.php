<!-- Modal -->
<div class="modal fade" id="editInvoice" data-backdrop="static" data-keyboard="false" aria-labelledby="editInvoiceLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvoiceLabel">حذف / ویرایش اقلام فاکتور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <table id="edit_invoice_table"
                        class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center; max-height: 400px;">
                        <thead>
                            <tr>
                                <th style="min-width: 100px">کد کالا</th>
                                <th style="min-width: 420px">نام کالا</th>
                                <th style="min-width: 200px">بهای واحد</th>
                                <th style="min-width: 200px">مبلغ کل</th>
                                <th style="min-width: 100px">مقدار</th>
                                <th style="min-width: 150px">درصد تخفیف</th>
                                <th style="min-width: 200px">ملاحظات</th>
                                <th style="min-width: 50px">اقدامات</th>
                            </tr>
                        </thead>
                        <tbody id="edit_product_data">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th>بهای واحد</th>
                                <th>مبلغ کل</th>
                                <th>مقدار</th>
                                <th>درصد تخفیف</th>
                                <th>ملاحظات</th>
                                <th>اقدامات</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="edit_count">0</span>
                    </div>
                    <input type="hidden" id="edit_invoice_product_id" name="edit_invoice_product_id" disabled />
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_product_code">کد کالا</label>
                            <input type="text" id="edit_invoice_product_code" name="edit_invoice_product_code"
                                class="form-control" autocomplete="off" disabled />
                            <div id="edit_invoice_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_product_name">نام کالا</label>
                            <input type="text" id="edit_invoice_product_name" name="edit_invoice_product_name"
                                class="form-control" autocomplete="off" disabled />
                            <div id="edit_invoice_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_sell_price">بهای واحد</label>
                            <input type="text" id="edit_invoice_sell_price" name="edit_invoice_sell_price"
                                class="form-control" autocomplete="off" disabled />
                            <div id="edit_invoice_sell_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_total">مبلغ کل</label>
                            <input type="text" id="edit_invoice_total" name="edit_invoice_total" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_invoice_total_price');"
                                disabled />
                            <div id="edit_invoice_total_error" class="invalid-feedback"></div>
                            <div id="edit_invoice_total_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_warehouse_name">نام انبار</label>
                            <select id="edit_invoice_warehouse_name" name="edit_invoice_warehouse_name"
                                class="form-control select2" style="width: 100%;" disabled>
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value={{ $warehouse->id }}>
                                        {{ $warehouse->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_invoice_warehouse_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_amount">مقدار</label>
                            <input type="text" id="edit_invoice_amount" name="edit_invoice_amount"
                                class="form-control" autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="edit_invoice_func()" />
                            <div id="edit_invoice_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_discount">درصد تخفیف</label>
                            <input type="text" id="edit_invoice_discount" name="edit_invoice_discount"
                                class="form-control" autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="edit_invoice_func()" />
                            <div id="edit_invoice_discount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_invoice_considerations">ملاحظات</label>
                            <input type="text" id="edit_invoice_considerations" name="edit_invoice_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="edit_invoice_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-success editInvoiceList" title="ویرایش کالا در لیست فاکتور"
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
            var return_sell_factor_id = $("#edit_return_sell_factor_id").val();

            $.ajax({
                type: "GET",
                url: "/return-sell-factor-detail/" + return_sell_factor_id + "/edit",
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
                        $('#edit_product_data').html(response.return_sell_factor_by_id);
                    }
                },
            });
        }

        $(document).ready(function() {
            $(document).on('click', '.editInvoiceList', function(e) {
                e.preventDefault();
                var isValid = edit_validation();
                if (isValid) {
                    var return_sell_factor_id = $("#edit_return_sell_factor_id").val();
                    var product_id = $('#edit_invoice_product_id').val();
                    // console.log(return_sell_factor_id);
                    // console.log(product_id);

                    var invoice_total = String($('#edit_invoice_total').val()).replaceAll(" ریال", "");
                    invoice_total = String(invoice_total).replaceAll(",", "");
                    invoice_total = invoice_total.replace(/[٠-٩]/g, d => "٠١٢٣٤٥٦٧٨٩".indexOf(d))
                        .replace(
                            /[۰-۹]/g,
                            d =>
                            "۰۱۲۳۴۵۶۷۸۹".indexOf(d));

                    var data = {
                        invoice_total: invoice_total,
                        invoice_amount: $('#edit_invoice_amount').val(),
                        invoice_discount: $('#edit_invoice_discount').val(),
                        invoice_considerations: $('#edit_invoice_considerations').val(),
                    };

                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });

                    $.ajax({
                        type: "PUT",
                        url: "/update-return-sell-factor/" + return_sell_factor_id + "/" +
                            product_id,
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
                                $('#edit_count').html(response.count);
                                $('#edit_product_data').html(response.return_sell_factor_by_id);
                                Swal.fire(
                                    response.message,
                                    response.status,
                                    'success'
                                )
                                fetchDataAsPaginate
                                    (
                                        'index_invoice_search',
                                        '/return-sell-factor',
                                        1,
                                        10,
                                        'index_count',
                                        'myData',
                                        'index_pagination'
                                    );
                            }
                        }
                    });
                }
            });
        });

        function edit_validation() {
            edit_invoiceClearErrors();
            var status = true;
            if ($('#edit_invoice_product_code').val() == "") {
                $("#edit_invoice_product_code_error").text("تکمیل گزینه کد کالا الزامی است");
                $("#edit_invoice_product_code").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_product_name').val() == "") {
                $("#edit_invoice_product_name_error").text("تکمیل گزینه نام کالا الزامی است");
                $("#edit_invoice_product_name").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_sell_price').val() == "") {
                $("#edit_invoice_sell_price_error").text("تکمیل گزینه بهای واحد الزامی است");
                $("#edit_invoice_sell_price").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_total').val() == "") {
                $("#edit_invoice_total_error").text("تکمیل گزینه مبلغ کل الزامی است");
                $("#edit_invoice_total").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_warehouse_name').val() == "") {
                $("#edit_invoice_warehouse_name_error").text("تکمیل گزینه نام انبار الزامی است");
                $("#edit_invoice_warehouse_name").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_amount').val() == "") {
                $("#edit_invoice_amount_error").text("تکمیل گزینه مقدار الزامی است");
                $("#edit_invoice_amount").addClass("is-invalid");
                status = false;
            }

            if ($('#edit_invoice_discount').val() == "") {
                $("#edit_invoice_discount_error").text("تکمیل گزینه درصد تخفیف الزامی است");
                $("#edit_invoice_discount").addClass("is-invalid");
                status = false;
            }

            return status;
        }

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
            edit_invoiceClearPrice();
            edit_invoiceDefaultSelectedValue();
            $("#editInvoice").find("input").val(""); // Clear Input Values
        })

        function edit_invoiceClearErrors() {
            $("#edit_invoice_product_code_error").text("");
            $("#edit_invoice_product_code").removeClass("is-invalid");
            $("#edit_invoice_product_name_error").text("");
            $("#edit_invoice_product_name").removeClass("is-invalid");
            $("#edit_invoice_sell_price_error").text("");
            $("#edit_invoice_sell_price").removeClass("is-invalid");
            $("#edit_invoice_amount_error").text("");
            $("#edit_invoice_amount").removeClass("is-invalid");
            $("#edit_invoice_discount_error").text("");
            $("#edit_invoice_discount").removeClass("is-invalid");
            $("#edit_invoice_total_error").text("");
            $("#edit_invoice_total").removeClass("is-invalid");
            $("#edit_invoice_warehouse_name_error").text("");
            $("#edit_invoice_warehouse_name").removeClass("is-invalid");
            $("#edit_invoice_considerations_error").text("");
            $("#edit_invoice_considerations").removeClass("is-invalid");
        }

        function edit_invoiceClearPrice() {
            $("#edit_invoice_total").text("");
        }

        function edit_invoiceDefaultSelectedValue() {
            $(edit_invoice_warehouse_name).prop('selectedIndex', 0).change();
        }

        $(document).ready(function() {
            $("#edit_invoice_table").on('click', '.editRow', function() {
                var currentRow = $(this).closest("tr");
                $("#edit_invoice_product_id").val(currentRow.find("td:eq(0)").html());
                $("#edit_invoice_product_code").val(currentRow.find("td:eq(1)").html());
                $("#edit_invoice_product_name").val(currentRow.find("td:eq(2)").html());
                $("#edit_invoice_sell_price").val(currentRow.find("td:eq(3)").html());
                $("#edit_invoice_total").val(currentRow.find("td:eq(4)").html());
                $('#edit_invoice_warehouse_name').val(currentRow.find("td:eq(5)").html()).change();
                $("#edit_invoice_amount").val(currentRow.find("td:eq(6)").html());
                $("#edit_invoice_discount").val(currentRow.find("td:eq(7)").html());
                $("#edit_invoice_considerations").val(currentRow.find("td:eq(8)").html());
            });
        });

        function edit_invoice_func() {
            var invoice_sell_price = document.getElementById("edit_invoice_sell_price").value;
            if (invoice_sell_price.length != 0) {
                var invoice_amount = document.getElementById("edit_invoice_amount").value;
                var invoice_discount = document.getElementById("edit_invoice_discount").value;
                if (invoice_amount.length != 0 && invoice_discount.length != 0) {
                    invoice_sell_price = String(invoice_sell_price).replaceAll(" ریال", "");
                    invoice_sell_price = String(invoice_sell_price).replaceAll(",", "");
                    invoice_sell_price = invoice_sell_price.replace(/[٠-٩]/g, d => "٠١٢٣٤٥٦٧٨٩".indexOf(d)).replace(
                        /[۰-۹]/g,
                        d =>
                        "۰۱۲۳۴۵۶۷۸۹".indexOf(d));
                    var invoice_price = parseInt(invoice_amount) * parseInt(invoice_sell_price);
                    if (parseInt(invoice_discount) != 0) {
                        $("#edit_invoice_total").val(new Intl.NumberFormat().format(invoice_price - (invoice_price *
                                invoice_discount) / 100) +
                            " ریال");
                    } else {
                        $("#edit_invoice_total").val(new Intl.NumberFormat().format(invoice_price) + " ریال");
                    }
                } else if (invoice_amount.length == 0) {
                    $("#edit_invoice_total").val(invoice_sell_price);
                }
            }
        }

        // Delete Details - e.g. (Factors)
        $(document).on("click", ".delete_details", function(e) {
            e.preventDefault();
            var url = $(this).val();
            $("#url").val(url);
            $("#DeleteDetailsModal").modal("show");
        });

        $(document).on("click", ".delete_details_btn", function(e) {
            e.preventDefault();

            $(this).text("در حال حذف ...");

            var url = $("#url").val();
            // console.log(url);

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "DELETE",
                url: url,
                success: function(response) {
                    $('#edit_count').html(response.count);
                    $('#edit_product_data').html(response.return_sell_factor_by_id);
                    Swal.fire(
                        response.message,
                        response.status,
                        'success'
                    )
                    fetchDataAsPaginate
                        (
                            'index_invoice_search',
                            '/return-sell-factor',
                            1,
                            10,
                            'index_count',
                            'myData',
                            'index_pagination'
                        );
                    $("#DeleteDetailsModal").modal("hide");
                    $(".delete_details_btn").text("موافقم");
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید",
                        denyButtonText: "OK",
                        // text: textStatus,
                    });
                    $("#DeleteDetailsModal").modal("hide");
                    $(".delete_details_btn").text("موافقم");
                },
            });
        });
    </script>
@endpush
