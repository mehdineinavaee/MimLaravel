@extends('layout.app')
@section('title', 'پروفایل من')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پروفایل من', 'url' => url()->current()]],
    ])

    <div class="container" style="padding: 50px;">
        <div class="row">
            <input type="hidden" id="edit_user_id" value="{{ Auth::user()->id }}">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="edit_cover">تصویر پروفایل</label>
                    <div class="custom-file">
                        <input type="file" id="edit_cover" name="edit_cover" data-max-file-size="3MB" accept="image/*">
                        <label id="custom-file-label" for="edit_cover"></label>
                        <div id="edit_cover_error" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="edit_national_code">شماره شناسنامه</label>
                    <input type="text" id="edit_national_code" name="edit_national_code"
                        value="{{ $user->national_code }}" class="leftToRight rightAlign inputMaskNationalCode form-control"
                        autocomplete="off" />
                    <div id="edit_national_code_error" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="edit_father">نام پدر</label>
                    <input type="text" id="edit_father" name="edit_father" class="form-control" autocomplete="off"
                        value="{{ $user->father }}" />
                    <div id="edit_father_error" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="edit_birthdate">تاریخ تولد</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" id="edit_birthdate" name="edit_birthdate"
                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off"
                            value="{{ $user->birthdate }}" />
                        <div id="edit_birthdate_error" style="margin-right:38px;" class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="edit_occupation">شغل</label>
                    <input type="text" id="edit_occupation" name="edit_occupation" class="form-control"
                        autocomplete="off" value="{{ $user->occupation }}" />
                    <div id="edit_occupation_error" class="invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="justify-content: space-between;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editInfo">
                تغییر رمز عبور
            </button>
            <button type="button" class="btn btn-primary updateProfile">ثبت</button>
        </div>
    </div>

    @include('security.profile.change-password')
@endsection

@push('js')
    <script>
        $('#edit_cover').on('change', function(ev) {
            var filedata = this.files[0];
            var imgtype = filedata.type;
            var match = ['image/*'];
            //preview
            $('#mgs_ta').empty();
            var reader = new FileReader();
            reader.onload = function(ev) {
                $('#img_prv').attr('src', ev.target.result);
            }
            reader.readAsDataURL(this.files[0]);
            //upload
            var postData = new FormData();
            postData.append('file', this.files[0]);
            var url = "{{ url('ajaxUploadImg') }}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                type: "post",
                contentType: false,
                url: url,
                data: postData,
                processData: false,
                success: function() {
                    Swal.fire("پروفایل تغییر کرد",
                        200,
                        'success');
                },
                error: function() {
                    Swal.fire($('#_token').val(), "danger").then(() => {
                        location.reload();
                    });
                },
            })
        });

        $(document).on("click", ".updateProfile", function(e) {
            e.preventDefault();
            var user_id = $("#edit_user_id").val();

            var data = {
                national_code: $('#edit_national_code').val(),
                father: $("#edit_father").val(),
                birthdate: $('#edit_birthdate').val(),
                occupation: $('#edit_occupation').val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/profile/" + user_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    Swal.fire(
                            response.message,
                            response.status,
                            'success'
                        )
                        .then((result) => {
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

        function edit_clearErrors() {
            $("#edit_father_error").text("");
            $("#edit_father").removeClass("is-invalid");
            $("#edit_birthdate_error").text("");
            $("#edit_birthdate").removeClass("is-invalid");
            $("#edit_national_code_error").text("");
            $("#edit_national_code").removeClass("is-invalid");
            $("#edit_occupation_error").text("");
            $("#edit_occupation").removeClass("is-invalid");
        }
    </script>
@endpush
