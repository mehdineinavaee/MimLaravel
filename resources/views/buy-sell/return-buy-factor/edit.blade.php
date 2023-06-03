<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش فاکتور برگشت از خرید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="edit_return_buy_factor_id">
                <div class="row pt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_return_buy_factor_no">شماره</label>
                            <input type="text" id="edit_return_buy_factor_no" name="edit_return_buy_factor_no"
                                class="form-control" autocomplete="off" />
                            <div id="edit_return_buy_factor_no_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateReturnBuyFactor">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_return_buy_factor', function(e) {
            e.preventDefault();
            var return_buy_factor_id = $(this).val();
            // console.log(return_buy_factor_id);

            $.ajax({
                type: "GET",
                url: "/return-buy-factor/" + return_buy_factor_id + "/edit",
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

                        $("#edit_return_buy_factor_id").val(return_buy_factor_id);
                        $("#edit_return_buy_factor_no").val(response.return_buy_factor
                            .return_buy_factor_no);
                    }
                },
            });
        });

        $(document).on("click", ".updateReturnBuyFactor", function(e) {
            e.preventDefault();
            var return_buy_factor_id = $("#edit_return_buy_factor_id").val();
            var data = {
                return_buy_factor_no: $('#edit_return_buy_factor_no').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/return-buy-factor/" + return_buy_factor_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#myData').html(response.output);
                    $('#pagination').html(response.pagination);
                    // console.log(response);
                    Swal.fire(
                            response.message,
                            response.status,
                            'success'
                        )
                        .then((result) => {
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            fetchData();
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

        //call function on modal shown
        $('#editInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_clearErrors();
        })

        function edit_clearErrors() {
            $("#edit_return_buy_factor_no_error").text("");
            $("#edit_return_buy_factor_no").removeClass("is-invalid");
        }
    </script>
@endpush
