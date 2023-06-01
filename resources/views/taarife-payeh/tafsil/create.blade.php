<!-- Modal -->
<div class="modal fade" id="createTafsil" data-backdrop="static" data-keyboard="false" aria-labelledby="createTafsilLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTafsilLabel">معرفی تفصیل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_tafsil_kol_account_name">نام حساب کل</label>
                            <select id="add_tafsil_kol_account_name" name="add_tafsil_kol_account_name"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>نام حساب کل را انتخاب کنید</option>
                                @foreach ($kols as $kol)
                                    <option value={{ $kol->id }}>
                                        {{ $kol->account_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_tafsil_kol_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_tafsil_moein_account_name">نام حساب معین</label>
                            <select id="add_tafsil_moein_account_name" name="add_tafsil_moein_account_name"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>نام حساب معین را انتخاب کنید</option>
                                @foreach ($moeins as $moein)
                                    <option value={{ $moein->id }}>
                                        {{ $moein->account_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_tafsil_moein_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_tafsil_account_code">کد حساب تفصیل</label>
                            <input type="text" id="add_tafsil_account_code" name="add_tafsil_account_code"
                                class="form-control" autocomplete="off" />
                            <div id="add_tafsil_account_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_tafsil_account_name">نام حساب تفصیل</label>
                            <input type="text" id="add_tafsil_account_name" name="add_tafsil_account_name"
                                class="form-control" autocomplete="off" />
                            <div id="add_tafsil_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pb-2 pt-4" style="padding-right:2rem !important">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label class="form-check-label" for="add_tafsil_activeCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_tafsil_activeCheckBox">
                                    فعال
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addTafsil">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addTafsil', function(e) {
                e.preventDefault();

                if (document.getElementById("add_tafsil_activeCheckBox").checked) {
                    var add_tafsil_activeCheckBox = "فعال";
                } else {
                    var add_tafsil_activeCheckBox = "غیرفعال";
                }

                var data = {
                    'kol_account_name': $('#add_tafsil_kol_account_name').val(),
                    'moein_account_name': $('#add_tafsil_moein_account_name').val(),
                    'account_code': $('#add_tafsil_account_code').val(),
                    'account_name': $('#add_tafsil_account_name').val(),
                    'active': add_tafsil_activeCheckBox,
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/tafsil",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createTafsil").modal("hide");
                                $("#createTafsil").find("input").val("");
                                add_tafsilClearErrors();
                                add_defaultSelectedValue();
                                fetchTafsil();
                            });
                    },

                    error: function(errors) {
                        add_tafsilClearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#add_tafsil_" + key + "_error").text(err_values[0]);
                            $("#add_tafsil_" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        //call function on modal shown
        $('#createTafsil').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createTafsil').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_tafsilClearErrors();
            add_defaultSelectedValue();
        })

        function add_tafsilClearErrors() {
            $("#add_tafsil_kol_account_name_error").text("");
            $("#add_tafsil_kol_account_name").removeClass("is-invalid");
            $("#add_tafsil_moein_account_name_error").text("");
            $("#add_tafsil_moein_account_name").removeClass("is-invalid");
            $("#add_tafsil_account_code_error").text("");
            $("#add_tafsil_account_code").removeClass("is-invalid");
            $("#add_tafsil_account_name_error").text("");
            $("#add_tafsil_account_name").removeClass("is-invalid");
            $("#add_tafsil_activeCheckBox_error").text("");
            $("#add_tafsil_activeCheckBox").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $('#add_tafsil_activeCheckBox').prop('checked', false);
            $(add_tafsil_kol_account_name).prop('selectedIndex', 0).change();
            $(add_tafsil_moein_account_name).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
