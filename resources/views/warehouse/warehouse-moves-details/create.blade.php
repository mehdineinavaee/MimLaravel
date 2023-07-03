<!-- Modal -->
<div class="modal fade" id="createInvoice" data-backdrop="static" data-keyboard="false" aria-labelledby="createInvoiceLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width:50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInvoiceLabel">ورود اقلام حواله</h5>
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
                        <select id="add_invoice_row" onChange="getDataByDrop(this)" class="select form-control">
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
                                <th style="min-width: 200px">مقدار</th>
                            </tr>
                        </thead>
                        <tbody id="add_product_data">

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
                        <div id="add_product_pagination"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: left">
                        مجموع رکوردها:
                        <span id="add_count">0</span>
                    </div>
                    <input type="hidden" id="add_product_id" name="add_product_id" disabled />
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product_code">کد کالا</label>
                            <input type="text" id="add_product_code" name="add_product_code" class="form-control"
                                autocomplete="off" disabled />
                            <div id="add_product_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product_name">نام کالا</label>
                            <input type="text" id="add_product_name" name="add_product_name" class="form-control"
                                autocomplete="off" disabled />
                            <div id="add_product_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_amount">مقدار</label>
                            <input type="text" id="add_amount" name="add_amount" class="form-control"
                                autocomplete="off"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="add_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_pre_transmitter">موجودی انبار فرستنده قبل از انتقال</label>
                            <input type="text" id="add_pre_transmitter" name="add_pre_transmitter"
                                class="form-control" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="add_pre_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_next_transmitter">موجودی انبار فرستنده بعد از انتقال</label>
                            <input type="text" id="add_next_transmitter" name="add_next_transmitter"
                                class="form-control leftToRight rightAlign" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="add_next_transmitter_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_pre_receiver">موجودی انبار گیرنده قبل از انتقال</label>
                            <input type="text" id="add_pre_receiver" name="add_pre_receiver" class="form-control"
                                autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="add_pre_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_next_receiver">موجودی انبار گیرنده بعد از انتقال</label>
                            <input type="text" id="add_next_receiver" name="add_next_receiver"
                                class="form-control leftToRight rightAlign" autocomplete="off" disabled
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <div id="add_next_receiver_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: space-between;">
                <div>
                    <button type="button" class="btn btn-success addInvoiceList" title="افزودن کالا به لیست حواله"
                        data-toggle="tooltip">
                        <i class="fa-lg fa fa-plus"></i>&nbsp;
                        افزودن به لیست
                    </button>
                    <button type="button" class="btn btn-danger addCancelInvoice" title="صرف نظر از لیست حواله"
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
            var transmitter_id = $('#add_transmitter').val();
            var url = "/search-products-according-to-warehouses/" + transmitter_id;
            fetchDataAsPaginate
                (
                    'add_invoice_search', // search_element_id
                    url, // url
                    page, // page
                    row.value, // row
                    'add_count', // count_element_id
                    'add_product_data', // data_element_id
                    'add_product_pagination' // pagination_element_id
                );
        })

        // search data
        $(document).ready(function() {
            $('#add_invoice_search').on('keyup', function() {
                var searchTitle = $(this).val();
                var row = document.getElementById("add_invoice_row").value;
                var transmitter_id = $('#add_transmitter').val();
                serach_data(
                    searchTitle,
                    row,
                    "/search-products-according-to-warehouses/" + transmitter_id,
                    "add_product_data",
                    "add_product_pagination");
            });
        });
        // end search data

        // pagination by dropdownlist 10 - 15 - 25 - 50
        function getDataByDrop(selectObject) {
            $('#add_invoice_search').val("");
            var row = selectObject.value;
            var transmitter_id = $('#add_transmitter').val();
            serach_data(
                '',
                row,
                "/search-products-according-to-warehouses/" + transmitter_id,
                "add_product_data",
                "add_product_pagination");
        }
        // end pagination by dropdownlist 10 - 15 - 25 - 50

        $(document).ready(function() {
            $('#add_amount').on('keyup', function() {
                var amount = $(this).val();
                if (amount.length > 0) {
                    var add_pre_transmitter = $("#add_pre_transmitter").val();
                    var add_pre_receiver = $("#add_pre_receiver").val();
                    var next_transmitter = parseInt(add_pre_transmitter) - parseInt(amount);
                    var next_receiver = parseInt(add_pre_receiver) + parseInt(amount);
                    if (next_transmitter >= 0 && next_receiver >= 0) {
                        $("#add_next_transmitter").val(next_transmitter);
                        $("#add_next_receiver").val(next_receiver);
                    } else {
                        $("#add_next_transmitter").val("");
                        $("#add_next_receiver").val("");
                    }
                } else {
                    $("#add_next_transmitter").val("");
                    $("#add_next_receiver").val("");
                }
            });
        });

        var products = [];
        $(document).ready(function() {
            $(document).on('click', '.addInvoiceList', function(e) {
                e.preventDefault();
                var isValid = detail_validation();
                if (isValid) {
                    const index = products.findIndex(object => object.product_id === $(
                            '#add_product_id')
                        .val());
                    if (index !== -1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'کالای مورد نظر در لیست حواله موجود می باشد',
                        })
                    } else {
                        var obj = {
                            product_id: $('#add_product_id').val(),
                            amount: $('#add_amount').val(),
                            pre_transmitter: $('#add_pre_transmitter').val(),
                            next_transmitter: $('#add_next_transmitter').val(),
                            pre_receiver: $('#add_pre_receiver').val(),
                            next_receiver: $('#add_next_receiver').val(),
                        };
                        products.push(obj);
                        Swal.fire(
                            "کالا به لیست حواله اضافه شد",
                            200,
                            'success'
                        )
                    }
                }
                if (products.length > 0) {
                    document.getElementById("btnAddInvoiceSubmit").disabled = false;
                }
            });
        });

        function detail_validation() {
            add_invoiceClearErrors();
            var status = true;
            if ($('#add_product_code').val() == "") {
                $("#add_product_code_error").text("تکمیل گزینه کد کالا الزامی است");
                $("#add_product_code").addClass("is-invalid");
                status = false;
            }

            if ($('#add_product_name').val() == "") {
                $("#add_product_name_error").text("تکمیل گزینه نام کالا الزامی است");
                $("#add_product_name").addClass("is-invalid");
                status = false;
            }

            if ($('#add_amount').val() == "") {
                $("#add_amount_error").text("تکمیل گزینه مقدار الزامی است");
                $("#add_amount").addClass("is-invalid");
                status = false;
            }

            if ($('#add_pre_transmitter').val() == "") {
                $("#add_pre_transmitter_error").text("تکمیل گزینه موجودی انبار فرستنده قبل از انتقال الزامی است");
                $("#add_pre_transmitter").addClass("is-invalid");
                status = false;
            }

            if ($('#add_next_transmitter').val() == "") {
                $("#add_next_transmitter_error").text("تکمیل گزینه موجودی انبار فرستنده بعد از انتقال الزامی است");
                $("#add_next_transmitter").addClass("is-invalid");
                status = false;
            }

            if ($('#add_pre_receiver').val() == "") {
                $("#add_pre_receiver_error").text("تکمیل گزینه موجودی انبار گیرنده قبل از انتقال الزامی است");
                $("#add_pre_receiver").addClass("is-invalid");
                status = false;
            }

            if ($('#add_next_receiver').val() == "") {
                $("#add_next_receiver_error").text("تکمیل گزینه موجودی انبار گیرنده بعد از انتقال الزامی است");
                $("#add_next_receiver").addClass("is-invalid");
                status = false;
            }

            return status;
        }

        $(document).ready(function() {
            $(document).on('click', '.addCancelInvoice', function(e) {
                e.preventDefault();
                if (products.length > 0) {
                    products = [];
                    document.getElementById("btnAddInvoiceSubmit").disabled = true;
                    Swal.fire(
                        "لیست حواله خالی شد",
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
                var data = {
                    'remittance_no': $('#add_remittance_no').val(),
                    'remittance_date': $('#add_remittance_date').val(),
                    'transmitter': $('#add_transmitter').val(),
                    'receiver': $('#add_receiver').val(),
                    'products': products
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/warehouse-moves",
                    data: data,
                    dataType: "json",

                    success: function(response) {
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
                        products = [];
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInvoice").modal("hide");
                                $("#createInvoice").find("input").val("");
                                add_invoiceClearErrors();
                            });
                    },

                    error: function(errors) {
                        add_invoiceClearErrors();
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
        $('#createInvoice').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
            if (products.length > 0) {
                document.getElementById("btnAddInvoiceSubmit").disabled = false;
            } else {
                document.getElementById("btnAddInvoiceSubmit").disabled = true;
            }
        });

        // call function on hiding modal
        $('#createInvoice').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_invoiceClearErrors();
            $("#createInvoice").find("input").val(""); // Clear Input Values
            // Clear pre-modal
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_invoiceClearErrors() {
            $("#add_product_code_error").text("");
            $("#add_product_code").removeClass("is-invalid");
            $("#add_product_name_error").text("");
            $("#add_product_name").removeClass("is-invalid");
            $("#add_amount_error").text("");
            $("#add_amount").removeClass("is-invalid");
            $("#add_pre_transmitter_error").text("");
            $("#add_pre_transmitter").removeClass("is-invalid");
            $("#add_next_transmitter_error").text("");
            $("#add_next_transmitter").removeClass("is-invalid");
            $("#add_pre_receiver_error").text("");
            $("#add_pre_receiver").removeClass("is-invalid");
            $("#add_next_receiver_error").text("");
            $("#add_next_receiver").removeClass("is-invalid");
        }

        $(document).ready(function() {
            $("#add_invoice_table").on('click', '.addRow', function() {
                var currentRow = $(this).closest("tr");
                var receiver_warehouse_id = $('#add_receiver').val();
                var product_id = currentRow.find("td:eq(0)").html();
                $("#add_product_id").val(product_id);
                $("#add_product_code").val(currentRow.find("td:eq(1)").html());
                $("#add_product_name").val(currentRow.find("td:eq(2)").html());
                $("#add_amount").val(1);
                $("#add_pre_transmitter").val(currentRow.find("td:eq(3)").html());
                $("#add_next_transmitter").val(currentRow.find("td:eq(3)").html() - 1);
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
                            $("#add_pre_receiver").val(response.amount);
                            $("#add_next_receiver").val(parseInt(response.amount) + 1);
                        }
                    },
                });
            });
        });
    </script>
@endpush
