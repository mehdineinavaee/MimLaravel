<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش گروه حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_account_group_id">
                <div class="row pt-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_code">کد گروه حساب</label>
                            <input type="text" id="edit_code" name="edit_code" class="form-control"
                                autocomplete="off" />
                            <div id="edit_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="edit_name">نام گروه حساب</label>
                                <input type="text" id="edit_name" name="edit_name" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_name_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateAccountGroup">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_account_group', function(e) {
            e.preventDefault();
            var account_group_id = $(this).val();
            // console.log(account_group_id);

            $.ajax({
                type: "GET",
                url: "/account-group/" + account_group_id + "/edit",
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
                        $("#edit_account_group_id").val(account_group_id);
                        $('#edit_code').val(response.account_group.code);
                        $('#edit_name').val(response.account_group.name);
                    }
                },
            });
        });

        $(document).on("click", ".updateAccountGroup", function(e) {
            e.preventDefault();
            var account_group_id = $("#edit_account_group_id").val();

            var data = {
                code: $('#edit_code').val(),
                name: $('#edit_name').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/account-group/" + account_group_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/account-group',
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
                        .then(() => {
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
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
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_code_error").text("");
            $("#edit_code").removeClass("is-invalid");
            $("#edit_name_error").text("");
            $("#edit_name").removeClass("is-invalid");
        }
    </script>
@endpush
