<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">درآمد، هزینه، صندوق جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12"
                        style="margin-right:2rem !important; margin-bottom:1rem !important">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="add_systemCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="add_systemCheckBox">
                                سیستمی
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-check-label" for="add_activeCheckBox">
                                <input class="form-check-input" type="checkbox" value="" id="add_activeCheckBox">
                                فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_form_type">نوع فرم</label>
                            <select id="add_form_type" name="add_form_type" class="form-control select2"
                                style="width: 100%;">
                                <option value="" selected>نوع فرم را انتخاب کنید</option>
                                <option value="1">
                                    درآمد
                                </option>
                                <option value="2">
                                    هزینه
                                </option>
                                <option value="3">
                                    صندوق
                                </option>
                            </select>
                            <div id="add_form_type_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_daramad_code">کد درآمد</label>
                            <input type="text" id="add_daramad_code" name="add_daramad_code" class="form-control"
                                autocomplete="off" />
                            <div id="add_daramad_code_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_daramad_name">نام درآمد</label>
                            <input type="text" id="add_daramad_name" name="add_daramad_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_daramad_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary addFund">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addFund', function(e) {
                e.preventDefault();

                var data = {
                    'form_type': $('#add_form_type').val(),
                    'daramad_code': $('#add_daramad_code').val(),
                    'daramad_name': $('#add_daramad_name').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/fund",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        Swal.fire(
                                response.message,
                                response.status,
                                'success'
                            )
                            .then((result) => {
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
                                fetchFund();
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
        })

        function add_clearErrors() {
            $("#add_form_type_error").text("");
            $("#add_form_type").removeClass("is-invalid");
            $("#add_daramad_code_error").text("");
            $("#add_daramad_code").removeClass("is-invalid");
            $("#add_daramad_name_error").text("");
            $("#add_daramad_name").removeClass("is-invalid");
        }
    </script>
@endpush
