<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش سند مالی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="edit_fund_period_id">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_amount">مبلغ</label>
                            <input type="text" id="edit_amount" name="edit_amount" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'edit_amount_price');" />
                            <div id="edit_amount_error" class="invalid-feedback"></div>
                            <div id="edit_amount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_fund">صندوق</label>
                            <select id="edit_fund" name="edit_fund" class="form-control select2" style="width: 100%;">
                                <option value="" selected>صندوق را انتخاب کنید</option>
                                @foreach ($funds as $fund)
                                    <option value="{{ $fund->id }}">
                                        {{ $fund->daramad_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_fund_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_considerations">ملاحظات</label>
                            <input type="text" id="edit_considerations" name="edit_considerations"
                                class="form-control" autocomplete="off" />
                            <div id="edit_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateFundPeriod">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_fund_period', function(e) {
            e.preventDefault();
            var fund_period_id = $(this).val();
            // console.log(fund_period_id);

            $.ajax({
                type: "GET",
                url: "/fund-period/" + fund_period_id + "/edit",
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
                        $("#edit_fund_period_id").val(fund_period_id);

                        $('#edit_amount').val(new Intl.NumberFormat().format(response.fund_period
                            .amount));
                        $('#edit_fund').val(response.fund_period.fund_id).change();
                        $("#edit_considerations").val(response.fund_period.considerations);
                    }
                },
            });
        });

        $(document).on("click", ".updateFundPeriod", function(e) {
            e.preventDefault();
            var fund_period_id = $("#edit_fund_period_id").val();

            var data = {
                amount: $("#edit_amount").val(),
                fund: $("#edit_fund").val(),
                considerations: $("#edit_considerations").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/fund-period/" + fund_period_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/fund-period',
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
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_fund_error").text("");
            $("#edit_fund").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_amount_price").text("");
        }

        function edit_defaultSelectedValue() {
            $(edit_fund).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
