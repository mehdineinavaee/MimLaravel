<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش گروه های ارزش افزوده</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_arzesh_afzoude_groups_id">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_group_name">نام گروه</label>
                            <input type="text" id="edit_group_name" name="edit_group_name" class="form-control"
                                autocomplete="off" />
                            <div id="edit_group_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_financial_year">سال مالی</label>
                                <input type="text" id="edit_financial_year" name="edit_financial_year"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_financial_year_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_avarez">عوارض</label>
                            <input type="text" id="edit_avarez" name="edit_avarez" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_avarez_price');" />
                            <div id="edit_avarez_error" class="invalid-feedback"></div>
                            <div id="edit_avarez_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_maliyat">مالیات</label>
                            <input type="text" id="edit_maliyat" name="edit_maliyat" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_maliyat_price');" />
                            <div id="edit_maliyat_error" class="invalid-feedback"></div>
                            <div id="edit_maliyat_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_saghfe_moamelat">سقف معاملات</label>
                            <input type="text" id="edit_saghfe_moamelat" name="edit_saghfe_moamelat"
                                class="form-control" autocomplete="off"
                                onkeyup="separateNum(this.value,this,'edit_saghfe_moamelat_price');" />
                            <div id="edit_saghfe_moamelat_error" class="invalid-feedback"></div>
                            <div id="edit_saghfe_moamelat_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateArzeshAfzoudeGroups">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_arzesh_afzoude_groups', function(e) {
            e.preventDefault();
            var arzesh_afzoude_groups_id = $(this).val();
            // console.log(arzesh_afzoude_groups_id);

            $.ajax({
                type: "GET",
                url: "/arzesh-afzoude-groups/" + arzesh_afzoude_groups_id + "/edit",
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
                        $("#edit_arzesh_afzoude_groups_id").val(arzesh_afzoude_groups_id);

                        $("#edit_group_name").val(response.arzesh_afzoude_group.group_name);
                        $("#edit_financial_year").val(response.arzesh_afzoude_group.financial_year);
                        $('#edit_avarez').val(new Intl.NumberFormat().format(response
                            .arzesh_afzoude_group.avarez));
                        $('#edit_maliyat').val(new Intl.NumberFormat().format(response
                            .arzesh_afzoude_group.maliyat));
                        $('#edit_saghfe_moamelat').val(new Intl.NumberFormat().format(response
                            .arzesh_afzoude_group.saghfe_moamelat));
                    }
                },
            });
        });

        $(document).on("click", ".updateArzeshAfzoudeGroups", function(e) {
            e.preventDefault();
            var arzesh_afzoude_groups_id = $("#edit_arzesh_afzoude_groups_id").val();

            var data = {
                group_name: $("#edit_group_name").val(),
                financial_year: $("#edit_financial_year").val(),
                avarez: $("#edit_avarez").val(),
                maliyat: $("#edit_maliyat").val(),
                saghfe_moamelat: $("#edit_saghfe_moamelat").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/arzesh-afzoude-groups/" + arzesh_afzoude_groups_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/arzesh-afzoude-groups',
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
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_group_name").text("");
            $("#edit_group_name").removeClass("is-invalid");
            $("#edit_financial_year_error").text("");
            $("#edit_financial_year").removeClass("is-invalid");
            $("#edit_avarez_error").text("");
            $("#edit_avarez").removeClass("is-invalid");
            $("#edit_maliyat_error").text("");
            $("#edit_maliyat").removeClass("is-invalid");
            $("#edit_saghfe_moamelat_error").text("");
            $("#edit_saghfe_moamelat").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_avarez_price").text("");
            $("#edit_maliyat_price").text("");
            $("#edit_saghfe_moamelat_price").text("");
        }
    </script>
@endpush
