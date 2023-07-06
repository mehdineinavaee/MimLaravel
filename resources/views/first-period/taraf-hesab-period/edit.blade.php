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
                    <input type="hidden" id="edit_taraf_hesab_period_id">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_taraf_hesab">طرف حساب</label>
                            <select id="edit_taraf_hesab" name="edit_taraf_hesab" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>طرف حساب را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value="{{ $taraf_hesab->id }}">
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="edit_taraf_hesab_error" class="invalid-feedback"></div>
                        </div>
                    </div>
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
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 1rem;">
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                            <label class="form-check-label" for="edit_opt1">
                                <input class="form-check-input" type="radio" name="group1" id="edit_opt1">
                                بدهکار
                            </label>
                            <div id="edit_opt1_error" class="invalid-feedback"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                            <label class="form-check-label" for="edit_opt2">
                                <input class="form-check-input" type="radio" name="group1" id="edit_opt2">
                                بستانکار
                            </label>
                            <div id="edit_opt2_error" class="invalid-feedback"></div>
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
                    <button type="button" class="btn btn-primary updateTarafHesabPeriod">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_taraf_hesab_period', function(e) {
            e.preventDefault();
            var taraf_hesab_period_id = $(this).val();
            // console.log(taraf_hesab_period_id);

            $.ajax({
                type: "GET",
                url: "/taraf-hesab-period/" + taraf_hesab_period_id + "/edit",
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
                        $("#edit_taraf_hesab_period_id").val(taraf_hesab_period_id);

                        if (response.taraf_hesab_period.opt_debtor == "فعال") {
                            $('#edit_opt1').prop('checked', true);
                        }

                        if (response.taraf_hesab_period.opt_creditor == "فعال") {
                            $('#edit_opt2').prop('checked', true);
                        }

                        $('#edit_taraf_hesab').val(response.taraf_hesab_period.taraf_hesab_id).change();
                        $('#edit_amount').val(new Intl.NumberFormat().format(response.taraf_hesab_period
                            .amount));
                        $("#edit_considerations").val(response.taraf_hesab_period.considerations);
                    }
                },
            });
        });

        $(document).on("click", ".updateTarafHesabPeriod", function(e) {
            e.preventDefault();
            var taraf_hesab_period_id = $("#edit_taraf_hesab_period_id").val();

            if ($('#edit_opt1').is(':checked')) {
                var edit_opt1 = "فعال";
            } else {
                var edit_opt1 = "غیرفعال";
            }

            if ($('#edit_opt2').is(':checked')) {
                var edit_opt2 = "فعال";
            } else {
                var edit_opt2 = "غیرفعال";
            }

            var data = {
                'taraf_hesab': $('#edit_taraf_hesab').val(),
                'amount': $('#edit_amount').val(),
                'opt_debtor': edit_opt1,
                'opt_creditor': edit_opt2,
                'considerations': $('#edit_considerations').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/taraf-hesab-period/" + taraf_hesab_period_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/taraf-hesab-period',
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
            $("#edit_taraf_hesab_error").text("");
            $("#edit_taraf_hesab").removeClass("is-invalid");
            $("#edit_amount_error").text("");
            $("#edit_amount").removeClass("is-invalid");
            $("#edit_opt1_error").text("");
            $("#edit_opt1").removeClass("is-invalid");
            $("#edit_opt2_error").text("");
            $("#edit_opt2").removeClass("is-invalid");
            $("#edit_considerations_error").text("");
            $("#edit_considerations").removeClass("is-invalid");
        }

        function edit_clearPrice() {
            $("#edit_amount_price").text("");
        }

        function edit_defaultSelectedValue() {
            $(edit_taraf_hesab).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
