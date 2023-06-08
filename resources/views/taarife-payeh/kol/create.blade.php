<!-- Modal -->
<div class="modal fade" id="createKol" data-backdrop="static" data-keyboard="false" aria-labelledby="createKolLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createKolLabel">معرفی کل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_kol_account_group">گروه حساب</label>
                            <select id="add_kol_account_group" name="add_kol_account_group" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>گروه حساب را انتخاب کنید</option>
                                @foreach ($account_groups as $account_group)
                                    <option value={{ $account_group->id }}>
                                        {{ $account_group->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="add_kol_account_group_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_kol_account_code">کد حساب کل</label>
                            <input type="text" id="add_kol_account_code" name="add_kol_account_code"
                                class="form-control" autocomplete="off" />
                            <div id="add_kol_account_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_kol_account_name">نام حساب کل</label>
                            <input type="text" id="add_kol_account_name" name="add_kol_account_name"
                                class="form-control" autocomplete="off" />
                            <div id="add_kol_account_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_kol_account_nature">ماهیت حساب</label>
                            <select id="add_kol_account_nature" name="add_kol_account_nature"
                                class="form-control select2" style="width: 100%;">
                                <option value="" selected>ماهیت حساب را انتخاب کنید</option>
                                {{-- @foreach ($cities as $city) --}}
                                <option value="1">
                                    بدهکار
                                </option>
                                <option value="2">
                                    بستانکار
                                </option>
                                <option value="3">
                                    بدهکار - بستانکار
                                </option>
                                {{-- @endforeach --}}
                            </select>
                            <div id="add_kol_account_nature_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row pb-2 pt-4" style="padding-right:2rem !important">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label class="form-check-label" for="add_kol_activeCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_kol_activeCheckBox">
                                    فعال
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addKol">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addKol', function(e) {
                e.preventDefault();

                if (document.getElementById("add_kol_activeCheckBox").checked) {
                    var add_kol_activeCheckBox = "فعال";
                } else {
                    var add_kol_activeCheckBox = "غیرفعال";
                }

                var data = {
                    'account_group': $('#add_kol_account_group').val(),
                    'account_code': $('#add_kol_account_code').val(),
                    'account_name': $('#add_kol_account_name').val(),
                    'account_nature': $('#add_kol_account_nature').val(),
                    'active': add_kol_activeCheckBox,
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/kol",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createKol").modal("hide");
                                $("#createKol").find("input").val("");
                                add_kolClearErrors();
                                add_defaultSelectedValue();
                            });
                    },

                    error: function(errors) {
                        add_kolClearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#add_kol_" + key + "_error").text(err_values[0]);
                            $("#add_kol_" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        //call function on modal shown
        $('#createKol').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        //call function on hiding modal
        $('#createKol').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_kolClearErrors();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_kolClearErrors() {
            $("#add_kol_account_group_error").text("");
            $("#add_kol_account_group").removeClass("is-invalid");
            $("#add_kol_account_code_error").text("");
            $("#add_kol_account_code").removeClass("is-invalid");
            $("#add_kol_account_name_error").text("");
            $("#add_kol_account_name").removeClass("is-invalid");
            $("#add_kol_account_nature_error").text("");
            $("#add_kol_account_nature").removeClass("is-invalid");
            $("#add_kol_activeCheckBox_error").text("");
            $("#add_kol_activeCheckBox").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $('#add_kol_activeCheckBox').prop('checked', false);
            $(add_kol_account_group).prop('selectedIndex', 0).change();
            $(add_kol_account_nature).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
