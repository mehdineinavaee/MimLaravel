<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">ورود اطلاعات اول دوره طرف حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_taraf_hesab">طرف حساب</label>
                            <select id="add_taraf_hesab" name="add_taraf_hesab" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>طرف حساب را انتخاب کنید</option>
                                @foreach ($taraf_hesabs as $taraf_hesab)
                                    <option value="{{ $taraf_hesab->id }}">
                                        {{ $taraf_hesab->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_taraf_hesab_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_amount">مبلغ</label>
                            <input type="text" id="add_amount" name="add_amount" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_amount_price');" />
                            <div id="add_amount_error" class="invalid-feedback"></div>
                            <div id="add_amount_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 1rem;">
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                            <label class="form-check-label" for="add_opt1">
                                <input class="form-check-input" type="radio" name="group1" id="add_opt1">
                                بدهکار
                            </label>
                            <div id="add_opt1_error" class="invalid-feedback"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                            <label class="form-check-label" for="add_opt2">
                                <input class="form-check-input" type="radio" name="group1" id="add_opt2">
                                بستانکار
                            </label>
                            <div id="add_opt2_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_considerations">ملاحظات</label>
                            <input type="text" id="add_considerations" name="add_considerations" class="form-control"
                                autocomplete="off" />
                            <div id="add_considerations_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addTarafHesabPeriod">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addTarafHesabPeriod', function(e) {
                e.preventDefault();

                if ($('#add_opt1').is(':checked')) {
                    var add_opt1 = "فعال";
                } else {
                    var add_opt1 = "غیرفعال";
                }

                if ($('#add_opt2').is(':checked')) {
                    var add_opt2 = "فعال";
                } else {
                    var add_opt2 = "غیرفعال";
                }

                var data = {
                    'taraf_hesab': $('#add_taraf_hesab').val(),
                    'amount': $('#add_amount').val(),
                    'opt_debtor': add_opt1,
                    'opt_creditor': add_opt2,
                    'considerations': $('#add_considerations').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/taraf-hesab-period",
                    data: data,
                    dataType: "json",

                    success: function(response) {
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
            $("#add_taraf_hesab_error").text("");
            $("#add_taraf_hesab").removeClass("is-invalid");
            $("#add_amount_error").text("");
            $("#add_amount").removeClass("is-invalid");
            $("#add_opt1_error").text("");
            $("#add_opt1").removeClass("is-invalid");
            $("#add_opt2_error").text("");
            $("#add_opt2").removeClass("is-invalid");
            $("#add_considerations_error").text("");
            $("#add_considerations").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_amount_price").text("");
        }

        function add_defaultSelectedValue() {
            $(add_taraf_hesab).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
