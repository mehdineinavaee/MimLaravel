<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">گروه ارزش افزوده جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_group_name">نام گروه</label>
                            <input type="text" id="add_group_name" name="add_group_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_group_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="add_financial_year">سال مالی</label>
                                <input type="text" id="add_financial_year" name="add_financial_year"
                                    class="form-control" autocomplete="off" />
                                <div id="add_financial_year_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_avarez">عوارض</label>
                            <input type="text" id="add_avarez" name="add_avarez" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_avarez_price');" />
                            <div id="add_avarez_error" class="invalid-feedback"></div>
                            <div id="add_avarez_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_maliyat">مالیات</label>
                            <input type="text" id="add_maliyat" name="add_maliyat" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_maliyat_price');" />
                            <div id="add_maliyat_error" class="invalid-feedback"></div>
                            <div id="add_maliyat_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_saghfe_moamelat">سقف معاملات</label>
                            <input type="text" id="add_saghfe_moamelat" name="add_saghfe_moamelat"
                                class="form-control" autocomplete="off"
                                onkeyup="separateNum(this.value,this,'add_saghfe_moamelat_price');" />
                            <div id="add_saghfe_moamelat_error" class="invalid-feedback"></div>
                            <div id="add_saghfe_moamelat_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addArzeshAfzoudeGroups">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addArzeshAfzoudeGroups', function(e) {
                e.preventDefault();

                var data = {
                    'group_name': $('#add_group_name').val(),
                    'financial_year': $('#add_financial_year').val(),
                    'avarez': $('#add_avarez').val(),
                    'maliyat': $('#add_maliyat').val(),
                    'saghfe_moamelat': $('#add_saghfe_moamelat').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/arzesh-afzoude-groups",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        $('#myData').html(response.output);
                        $('#pagination').html(response.pagination);
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

        //call function on modal shown
        $('#createInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
            add_clearPrice();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_group_name").text("");
            $("#add_group_name").removeClass("is-invalid");
            $("#add_financial_year_error").text("");
            $("#add_financial_year").removeClass("is-invalid");
            $("#add_avarez_error").text("");
            $("#add_avarez").removeClass("is-invalid");
            $("#add_maliyat_error").text("");
            $("#add_maliyat").removeClass("is-invalid");
            $("#add_saghfe_moamelat_error").text("");
            $("#add_saghfe_moamelat").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_avarez_price").text("");
            $("#add_maliyat_price").text("");
            $("#add_saghfe_moamelat_price").text("");
        }
    </script>
@endpush
