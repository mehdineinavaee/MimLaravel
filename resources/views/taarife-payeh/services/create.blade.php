<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">خدمات جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="add_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="add_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_service_code">کد خدمات</label>
                            <input type="text" id="add_service_code" name="add_service_code" class="form-control"
                                autocomplete="off" />
                            <div id="add_service_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_service_name">نام خدمات</label>
                            <input type="text" id="add_service_name" name="add_service_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_service_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_price">قیمت ارائه خدمات</label>
                            <input type="text" id="add_price" name="add_price" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_price_price');" />
                            <div id="add_price_error" class="invalid-feedback"></div>
                            <div id="add_price_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_group">گروه ارزش افزوده</label>
                            <input type="text" id="add_group" name="add_group" class="form-control"
                                autocomplete="off" />
                            <div id="add_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addService">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addService', function(e) {
                e.preventDefault();

                if (document.getElementById("add_activeCheckBox").checked) {
                    var add_activeCheckBox = "فعال";
                } else {
                    var add_activeCheckBox = "غیرفعال";
                }

                var data = {
                    'chk_active': add_activeCheckBox,
                    'service_code': $('#add_service_code').val(),
                    'service_name': $('#add_service_name').val(),
                    'price': $('#add_price').val(),
                    'group': $('#add_group').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/services",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        fetchDataAsPaginate
                            (
                                'index_search',
                                '/services',
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
            $("#add_service_code_error").text("");
            $("#add_service_code").removeClass("is-invalid");
            $("#add_service_name_error").text("");
            $("#add_service_name").removeClass("is-invalid");
            $("#add_price_error").text("");
            $("#add_price").removeClass("is-invalid");
            $("#add_group_error").text("");
            $("#add_group").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_price_price").text("");
        }

        function add_defaultSelectedValue() {
            $('#add_activeCheckBox').prop('checked', false);
        }
    </script>
@endpush
