<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">معرفی اول دوره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_warehouse">نام انبار</label>
                            <select id="add_warehouse" name="add_warehouse" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام انبار را انتخاب کنید</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value={{ $warehouse->id }}>
                                        {{ $warehouse->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_warehouse_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_product">نام کالا</label>
                            <select id="add_product" name="add_product" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نام کالا را انتخاب کنید</option>
                                @foreach ($products as $product)
                                    <option value={{ $product->id }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_product_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_amount">مقدار</label>
                            <input type="text" id="add_amount" name="add_amount" class="form-control"
                                autocomplete="off" />
                            <div id="add_amount_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_buy_price">بهای واحد خرید</label>
                            <input type="text" id="add_buy_price" name="add_buy_price" class="form-control"
                                onkeyup="separateNum(this.value,this,'add_buy_price_price');" autocomplete="off" />
                            <div id="add_buy_price_error" class="invalid-feedback"></div>
                            <div id="add_buy_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addInventoryProduct">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addInventoryProduct', function(e) {
                e.preventDefault();

                var data = {
                    'warehouse': $('#add_warehouse').val(),
                    'product': $('#add_product').val(),
                    'amount': $('#add_amount').val(),
                    'buy_price': $('#add_buy_price').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/inventory-products-period",
                    data: data,
                    dataType: "json",

                    success: function(response) {
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
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                add_clearPrice();
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
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_warehouse_error").text("");
            $("#add_warehouse").removeClass("is-invalid");
            $("#add_product_error").text("");
            $("#add_product").removeClass("is-invalid");
            $("#add_amount_error").text("");
            $("#add_amount").removeClass("is-invalid");
            $("#add_buy_price_error").text("");
            $("#add_buy_price").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_buy_price_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_warehouse).prop('selectedIndex', 0).change();
            $(add_product).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
