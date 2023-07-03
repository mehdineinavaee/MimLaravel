<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش کالا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_inventory_products_period_id">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_warehouse">نام انبار</label>
                            <select id="edit_warehouse" name="edit_warehouse" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value={{ $warehouse->id }}>
                                        {{ $warehouse->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_warehouse_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_product">نام کالا</label>
                            <select id="edit_product" name="edit_product" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام کالا را انتخاب کنید</option>
                                @foreach ($products as $product)
                                    <option value={{ $product->id }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_product_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_amount">مقدار</label>
                            <input type="text" id="edit_amount" name="edit_amount" class="form-control"
                                autocomplete="off" />
                            <div id="edit_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_buy_price">بهای واحد خرید</label>
                            <input type="text" id="edit_buy_price" name="edit_buy_price" class="form-control"
                                onkeyup="separateNum(this.value,this,'edit_buy_price_price');" autocomplete="off" />
                            <div id="edit_buy_price_error" class="invalid-feedback"></div>
                            <div id="edit_buy_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateInventoryProductsPeriod">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_inventory_products_period', function(e) {
            e.preventDefault();
            var inventory_products_period_id = $(this).val();
            // console.log(inventory_products_period_id);

            $.ajax({
                type: "GET",
                url: "/inventory-products-period/" + inventory_products_period_id + "/edit",
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
                        $("#edit_inventory_products_period_id").val(inventory_products_period_id);

                        $('#edit_warehouse').val(response.inventory_products_period.warehouse_id)
                            .change();
                        $('#edit_product').val(response.inventory_products_period.product_id).change();
                        $("#edit_amount").val(response.inventory_products_period.amount);
                        $('#edit_buy_price').val(new Intl.NumberFormat().format(response
                            .inventory_products_period
                            .buy_price));
                    }
                },
            });
        });

        $(document).on("click", ".updateInventoryProductsPeriod", function(e) {
            e.preventDefault();

            var inventory_products_period_id = $("#edit_inventory_products_period_id").val();

            var data = {
                warehouse: $("#edit_warehouse").val(),
                product: $("#edit_product").val(),
                amount: $("#edit_amount").val(),
                buy_price: $("#edit_buy_price").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/inventory-products-period/" + inventory_products_period_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/inventory-products-period',
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
                            edit_clearPrice();
                            edit_defaultSelectedValue();
                        });
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
            edit_clearPrice();
            // edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_warehouse_error").text("");
            $("#edit_warehouse").removeClass("is-invalid");
            $("#edit_product_error").text("");
            $("#edit_product").removeClass("is-invalid");
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_buy_price_error").text("");
            $("#edit_buy_price").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_buy_price_price").text("");
        }

        function edit_defaultSelectedValue() {
            $(edit_warehouse).prop('selectedIndex', 0).change();
            $(edit_product).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
