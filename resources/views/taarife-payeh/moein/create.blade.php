<!-- Modal -->
<div class="modal fade" id="createMoein" data-backdrop="static" data-keyboard="false" aria-labelledby="createMoeinLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMoeinLabel">معرفی معین</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_moein_kol_account_name">نام حساب کل</label>
                            <select id="add_moein_kol_account_name" name="add_moein_kol_account_name"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>نام حساب کل را انتخاب کنید</option>
                                @foreach ($kols as $kol)
                                    <option value={{ $kol->id }}>
                                        {{ $kol->account_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_moein_kol_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_moein_account_code">کد حساب معین</label>
                            <input type="text" id="add_moein_account_code" name="add_moein_account_code"
                                class="form-control" autocomplete="off" />
                            <div id="add_moein_account_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_moein_account_name">نام حساب معین</label>
                            <input type="text" id="add_moein_account_name" name="add_moein_account_name"
                                class="form-control" autocomplete="off" />
                            <div id="add_moein_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_moein_shenavar_tafsil">تفصیل های شناور</label>
                            <select id="add_moein_shenavar_tafsil" name="add_moein_shenavar_tafsil"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>تفصیل های شناور را انتخاب کنید</option>
                                {{-- @foreach ($cities as $city) --}}
                                <option value="1">
                                    طرف حساب
                                </option>
                                <option value="2">
                                    سهام داران
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_moein_shenavar_tafsil_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pb-2 pt-4" style="padding-right:2rem !important">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label class="form-check-label" for="add_moein_activeCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_moein_activeCheckBox">
                                    فعال
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addMoein">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addMoein', function(e) {
                e.preventDefault();

                if (document.getElementById("add_moein_activeCheckBox").checked) {
                    var add_moein_activeCheckBox = "فعال";
                } else {
                    var add_moein_activeCheckBox = "غیرفعال";
                }

                var data = {
                    'kol_account_name': $('#add_moein_kol_account_name').val(),
                    'account_code': $('#add_moein_account_code').val(),
                    'account_name': $('#add_moein_account_name').val(),
                    'shenavar_tafsil': $('#add_moein_shenavar_tafsil').val(),
                    'active': add_moein_activeCheckBox,
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/moein",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createMoein").modal("hide");
                                $("#createMoein").find("input").val("");
                                add_moeinClearErrors();
                                add_defaultSelectedValue();
                            });
                    },

                    error: function(errors) {
                        add_moeinClearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#add_moein_" + key + "_error").text(err_values[0]);
                            $("#add_moein_" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        //call function on modal shown
        $('#createMoein').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createMoein').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_moeinClearErrors();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_moeinClearErrors() {
            $("#add_moein_kol_account_name_error").text("");
            $("#add_moein_kol_account_name").removeClass("is-invalid");
            $("#add_moein_account_code_error").text("");
            $("#add_moein_account_code").removeClass("is-invalid");
            $("#add_moein_account_name_error").text("");
            $("#add_moein_account_name").removeClass("is-invalid");
            $("#add_moein_shenavar_tafsil_error").text("");
            $("#add_moein_shenavar_tafsil").removeClass("is-invalid");
            $("#add_moein_activeCheckBox_error").text("");
            $("#add_moein_activeCheckBox").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $('#add_moein_activeCheckBox').prop('checked', false);
            $(add_moein_kol_account_name).prop('selectedIndex', 0).change();
            $(add_moein_shenavar_tafsil).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
