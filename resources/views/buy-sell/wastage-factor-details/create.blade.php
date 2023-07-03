<!-- Modal -->
<div class="modal fade" id="createInvoice" data-backdrop="static" data-keyboard="false" aria-labelledby="createInvoiceLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width:50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInvoiceLabel">ورود اقلام فاکتور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="form-group mb-3">
                            <input type="search" id="add_invoice_search" name="add_invoice_search" class="form-control"
                                autocomplete="off" placeholder="جستجو" />
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <select id="add_invoice_row"
                            onChange="fetchDataAsPaginate('add_invoice_search','/fetch-sell-factor-advanced',1,this.value,'add_count','add_product_data','add_product_pagination')"
                            class="select form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <table id="add_invoice_table"
                        class="table-responsive table table-hover table-bordered table-striped"
                        style="text-align: center; max-height: 180px;">
                        <thead>
                            <tr>
                                <th style="min-width: 100px">کد کالا</th>
                                <th style="min-width: 420px">نام کالا</th>
                                <th style="min-width: 200px">بهای واحد</th>
                            </tr>
                        </thead>
                        <tbody id="add_product_data">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th>بهای واحد</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div id="add_product_pagination"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="add_count">0</span>
                    </div>
                    <input type="hidden" id="add_invoice_product_id" name="add_invoice_product_id" disabled />
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_product_code">کد کالا</label>
                            <input type="text" id="add_invoice_product_code" name="add_invoice_product_code"
                                class="form-control" autocomplete="off" disabled />
                            <div id="add_invoice_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_product_name">نام کالا</label>
                            <input type="text" id="add_invoice_product_name" name="add_invoice_product_name"
                                class="form-control" autocomplete="off" disabled />
                            <div id="add_invoice_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_sell_price">بهای واحد</label>
                            <input type="text" id="add_invoice_sell_price" name="add_invoice_sell_price"
                                class="form-control" autocomplete="off" disabled />
                            <div id="add_invoice_sell_price_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_total">مبلغ کل</label>
                            <input type="text" id="add_invoice_total" name="add_invoice_total" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_invoice_total_price');"
                                disabled />
                            <div id="add_invoice_total_error" class="invalid-feedback"></div>
                            <div id="add_invoice_total_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_warehouse_name">نام انبار</label>
                            <select id="add_invoice_warehouse_name" name="add_invoice_warehouse_name"
                                class="form-control select2" style="width: 100%;" disabled>
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value={{ $warehouse->id }}>
                                        {{ $warehouse->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_invoice_warehouse_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_amount">مقدار</label>
                            <input type="text" id="add_invoice_amount" name="add_invoice_amount"
                                class="form-control" autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="add_invoice_func()" />
                            <div id="add_invoice_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_discount">درصد تخفیف</label>
                            <input type="text" id="add_invoice_discount" name="add_invoice_discount"
                                class="form-control" autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onkeyup="add_invoice_func()" />
                            <div id="add_invoice_discount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_invoice_considerations">ملاحظات</label>
                            <input type="text" id="add_invoice_considerations" name="add_invoice_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="add_invoice_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success addInvoiceList" title="افزودن کالا به لیست فاکتور"
                        data-toggle="tooltip">
                        <i class="fa-lg fa fa-plus"></i>&nbsp;
                        افزودن به لیست
                    </button>
                    <button type="button" class="btn btn-danger addCancelInvoice" title="صرف نظر از لیست فاکتور"
                        data-toggle="tooltip">
                        <i class="fa-lg fa fa-trash"></i>&nbsp;
                        حذف لیست
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" id="btnAddInvoiceSubmit"
                        class="btn btn-primary addInvoiceSubmit">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

@push('js')
    <script>
        // pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            var row = document.getElementById("add_invoice_row");
            fetchDataAsPaginate('add_invoice_search', '/fetch-wastage-factor', page, row.value, 'add_count',
                'add_product_data', 'add_product_pagination')
        })

        fetchDataAsPaginate('add_invoice_search', '/fetch-wastage-factor', 1, 10, 'add_count', 'add_product_data',
            'add_product_pagination');
        // end pagination

        // search data
        $(document).ready(function() {
            $('#add_invoice_search').on('keyup', function() {
                var value = $(this).val();
                var row = document.getElementById("add_invoice_row").value;
                serach_data(value, row, "/search-wastage-factor", "add_product_data",
                    "add_product_pagination");
            });
        });
        // end search data

        var factors = [];
        $(document).ready(function() {
            $(document).on('click', '.addInvoiceList', function(e) {
                e.preventDefault();
                var isValid = add_validation();
                if (isValid) {
                    const index = factors.findIndex(object => object.product_id === $(
                            '#add_invoice_product_id')
                        .val());
                    if (index !== -1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'کالای مورد نظر در لیست فاکتور موجود می باشد',
                        })
                    } else {
                        var invoice_sell_price = String($('#add_invoice_sell_price').val()).replaceAll(
                            " ریال",
                            "");
                        invoice_sell_price = String(invoice_sell_price).replaceAll(",", "");
                        invoice_sell_price = invoice_sell_price.replace(/[٠-٩]/g, d => "٠١٢٣٤٥٦٧٨٩".indexOf(
                            d)).replace(
                            /[۰-۹]/g,
                            d =>
                            "۰۱۲۳۴۵۶۷۸۹".indexOf(d));

                        var invoice_total = String($('#add_invoice_total').val()).replaceAll(" ریال", "");
                        invoice_total = String(invoice_total).replaceAll(",", "");
                        invoice_total = invoice_total.replace(/[٠-٩]/g, d => "٠١٢٣٤٥٦٧٨٩".indexOf(d))
                            .replace(
                                /[۰-۹]/g,
                                d =>
                                "۰۱۲۳۴۵۶۷۸۹".indexOf(d));
                        var obj = {
                            product_id: $('#add_invoice_product_id').val(),
                            product_code: $('#add_invoice_product_code').val(),
                            product_name: $('#add_invoice_product_name').val(),
                            sell_price: invoice_sell_price,
                            total: invoice_total,
                            warehouse_name: $('#add_invoice_warehouse_name').val(),
                            amount: $('#add_invoice_amount').val(),
                            discount: $('#add_invoice_discount').val(),
                            considerations: $('#add_invoice_considerations').val(),
                        };
                        factors.push(obj);
                        Swal.fire(
                            "کالا به لیست فاکتور اضافه شد",
                            200,
                            'success'
                        )
                    }
                }
                if (factors.length > 0) {
                    document.getElementById("btnAddInvoiceSubmit").disabled = false;
                }
            });
        });

        function add_validation() {
            add_invoiceClearErrors();
            var status = true;
            if ($('#add_invoice_product_code').val() == "") {
                $("#add_invoice_product_code_error").text("تکمیل گزینه کد کالا الزامی است");
                $("#add_invoice_product_code").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_product_name').val() == "") {
                $("#add_invoice_product_name_error").text("تکمیل گزینه نام کالا الزامی است");
                $("#add_invoice_product_name").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_sell_price').val() == "") {
                $("#add_invoice_sell_price_error").text("تکمیل گزینه بهای واحد الزامی است");
                $("#add_invoice_sell_price").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_total').val() == "") {
                $("#add_invoice_total_error").text("تکمیل گزینه مبلغ کل الزامی است");
                $("#add_invoice_total").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_warehouse_name').val() == "") {
                $("#add_invoice_warehouse_name_error").text("تکمیل گزینه نام انبار الزامی است");
                $("#add_invoice_warehouse_name").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_amount').val() == "") {
                $("#add_invoice_amount_error").text("تکمیل گزینه مقدار الزامی است");
                $("#add_invoice_amount").addClass("is-invalid");
                status = false;
            }

            if ($('#add_invoice_discount').val() == "") {
                $("#add_invoice_discount_error").text("تکمیل گزینه درصد تخفیف الزامی است");
                $("#add_invoice_discount").addClass("is-invalid");
                status = false;
            }

            return status;
        }

        $(document).ready(function() {
            $(document).on('click', '.addCancelInvoice', function(e) {
                e.preventDefault();
                if (factors.length > 0) {
                    factors = [];
                    document.getElementById("btnAddInvoiceSubmit").disabled = true;
                    Swal.fire(
                        "لیست فاکتور خالی شد",
                        200,
                        'success'
                    )
                } else {
                    Swal.fire(
                        "لیست خالی است",
                        200,
                        'warning'
                    )
                }

            });
        });

        $(document).ready(function() {
            $(document).on('click', '.addInvoiceSubmit', function(e) {
                e.preventDefault();
                $('#createInvoice').modal('hide');
                $('#createInfo').modal('show');
            });
        });

        // call function on modal shown
        $('#createInvoice').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
            if (factors.length > 0) {
                document.getElementById("btnAddInvoiceSubmit").disabled = false;
            } else {
                document.getElementById("btnAddInvoiceSubmit").disabled = true;
            }
        });

        // call function on hiding modal
        $('#createInvoice').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_invoiceClearErrors();
            add_invoiceClearPrice();
            add_invoiceDefaultSelectedValue();
            $("#createInvoice").find("input").val(""); // Clear Input Values
        })

        function add_invoiceClearErrors() {
            $("#add_invoice_product_code_error").text("");
            $("#add_invoice_product_code").removeClass("is-invalid");
            $("#add_invoice_product_name_error").text("");
            $("#add_invoice_product_name").removeClass("is-invalid");
            $("#add_invoice_sell_price_error").text("");
            $("#add_invoice_sell_price").removeClass("is-invalid");
            $("#add_invoice_amount_error").text("");
            $("#add_invoice_amount").removeClass("is-invalid");
            $("#add_invoice_discount_error").text("");
            $("#add_invoice_discount").removeClass("is-invalid");
            $("#add_invoice_total_error").text("");
            $("#add_invoice_total").removeClass("is-invalid");
            $("#add_invoice_warehouse_name_error").text("");
            $("#add_invoice_warehouse_name").removeClass("is-invalid");
            $("#add_invoice_considerations_error").text("");
            $("#add_invoice_considerations").removeClass("is-invalid");
        }

        function add_invoiceClearPrice() {
            $("#add_invoice_total").text("");
        }

        function add_invoiceDefaultSelectedValue() {
            $(add_invoice_warehouse_name).prop('selectedIndex', 0).change();
        }

        $(document).ready(function() {
            $("#add_invoice_table").on('click', '.addRow', function() {
                var currentRow = $(this).closest("tr");
                $("#add_invoice_product_id").val(currentRow.find("td:eq(0)").html());
                $("#add_invoice_product_code").val(currentRow.find("td:eq(1)").html());
                $("#add_invoice_product_name").val(currentRow.find("td:eq(2)").html());
                $("#add_invoice_sell_price").val(currentRow.find("td:eq(3)").html());
                $("#add_invoice_total").val(currentRow.find("td:eq(3)").html());
                $('#add_invoice_warehouse_name').val(currentRow.find("td:eq(4)").html()).change();
                $("#add_invoice_amount").val(1);
                $("#add_invoice_discount").val(0);
            });
        });

        function add_invoice_func() {
            var invoice_sell_price = document.getElementById("add_invoice_sell_price").value;
            if (invoice_sell_price.length != 0) {
                var invoice_amount = document.getElementById("add_invoice_amount").value;
                var invoice_discount = document.getElementById("add_invoice_discount").value;
                if (invoice_amount.length != 0 && invoice_discount.length != 0) {
                    invoice_sell_price = String(invoice_sell_price).replaceAll(" ریال", "");
                    invoice_sell_price = String(invoice_sell_price).replaceAll(",", "");
                    invoice_sell_price = invoice_sell_price.replace(/[٠-٩]/g, d => "٠١٢٣٤٥٦٧٨٩".indexOf(d)).replace(
                        /[۰-۹]/g,
                        d =>
                        "۰۱۲۳۴۵۶۷۸۹".indexOf(d));
                    var invoice_price = parseInt(invoice_amount) * parseInt(invoice_sell_price);
                    if (parseInt(invoice_discount) != 0) {
                        $("#add_invoice_total").val(new Intl.NumberFormat().format(invoice_price - (invoice_price *
                                invoice_discount) / 100) +
                            " ریال");
                    } else {
                        $("#add_invoice_total").val(new Intl.NumberFormat().format(invoice_price) + " ریال");
                    }
                } else if (invoice_amount.length == 0) {
                    $("#add_invoice_total").val(invoice_sell_price);
                }
            }
        }
    </script>
@endpush
