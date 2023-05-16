<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش طرف حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="edit_tab01">
                    <h6 class="font-weight-bold">اطلاعات اصلی</h6>
                </div>
                <div class="tabs" id="edit_tab02">
                    <h6 class="text-muted">اطلاعات تکمیلی</h6>
                </div>
                <div class="tabs" id="edit_tab03">
                    <h6 class="text-muted">گروه طرف حساب</h6>
                </div>
                <div class="tabs" id="edit_tab04">
                    <h6 class="text-muted">سقف اعتبار</h6>
                </div>
            </div>
            <div class="line"></div>
            <div class="modal-body" style="min-height: 538px">
                <!-- Tabs content -->
                <fieldset class="show" id="edit_tab011">
                    <input type="hidden" id="edit_taraf_hesab_id">
                    <div class="bg-light" style="border-radius: 10px;">
                        <h6 class="text-center mb-4 mt-0 pt-4">نوع تعامل طرف حساب</h6>
                        <div class="row pb-4" style="margin-right:2rem !important">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="edit_sellerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="edit_sellerCheckBox">
                                    فروشنده
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="edit_buyerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="edit_buyerCheckBox">
                                    خریدار
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="edit_brokerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="edit_brokerCheckBox">
                                    واسطه فروش
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="edit_investorCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="edit_investorCheckBox">
                                    سرمایه گذار
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="edit_blockListCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="edit_blockListCheckBox">
                                    بد حساب (لیست سیاه)
                                </label>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="bg-light" style="border-radius: 10px;">
                        <div class="row pb-2 pt-4" style="padding-right:2rem !important">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-check-label" for="edit_activeCheckBox">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="edit_activeCheckBox">
                                        فعال
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-check-label" for="edit_movePhoneCheckBox">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="edit_movePhoneCheckBox">
                                        انتقال به دفترچه تلفن
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_code">کد طرف حساب</label>
                                <input type="text" id="edit_code" name="edit_code" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label for="edit_fullname">نام و نام خانوادگی</label>
                                    <input type="text" id="edit_fullname" name="edit_fullname"
                                        class="form-control" autocomplete="off" />
                                    <div id="edit_fullname_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_zip_code">کد پستی</label>
                                <input type="text" id="edit_zip_code" name="edit_zip_code" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_zip_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_phone">موبایل</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="edit_phone" name="edit_phone" class="form-control"
                                        autocomplete="off" />
                                    <div id="edit_phone_error" style="margin-right:38px;" class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_city">نام شهر</label>
                                <select id="edit_city" name="edit_city" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>شهر را انتخاب کنید</option>
                                    {{-- @foreach ($publishers as $publisher) --}}
                                    <option value="1">
                                        تهران
                                    </option>
                                    <option value="2">
                                        یزد
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="edit_city_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_broker">واسطه فروش</label>
                                <select id="edit_broker" name="edit_broker" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                    {{-- @foreach ($publishers as $publisher) --}}
                                    <option value="1">
                                        واسطه فروش 1
                                    </option>
                                    <option value="2">
                                        واسطه فروش 2
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="edit_broker_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_commission">پورسانت</label>
                                <input type="text" id="edit_commission" name="edit_commission"
                                    class="form-control" placeholder="درصد پورسانت را وارد کنید"
                                    autocomplete="off" />
                                <div id="edit_commission_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_address">آدرس</label>
                                <input type="text" id="edit_address" name="edit_address" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_address_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab021">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_person_type">نوع شخص</label>
                                <select id="edit_person_type" name="edit_person_type" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>نوع شخص را انتخاب کنید</option>
                                    {{-- @foreach ($publishers as $publisher) --}}
                                    <option value="1">
                                        حقیقی
                                    </option>
                                    <option value="2">
                                        حقوقی غیر دولتی
                                    </option>
                                    <option value="3">
                                        حقوقی دولتی وزارت خانه ها و سازمان ها
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="edit_person_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_ceo_fullname">نام مدیر عامل</label>
                                <input type="text" id="edit_ceo_fullname" name="edit_ceo_fullname"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_ceo_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_national_code">کد ملی</label>
                                <input type="text" id="edit_national_code" name="edit_national_code"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_national_code_error" class="invalid-feedback"></div>
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
                                        class="normal-example form-control" autocomplete="off" />
                                    <div id="edit_birthdate_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_occupation">شغل</label>
                                <input type="text" id="edit_occupation" name="edit_occupation"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_occupation_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_fax">فاکس</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="edit_fax" name="edit_fax" class="form-control"
                                        autocomplete="off" />
                                    <div id="edit_fax_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_tel">تلفن</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="edit_tel" name="edit_tel" class="form-control"
                                        placeholder="تلفن را به همراه پیش شماره وارد کنید" autocomplete="off" />
                                    <div id="edit_tel_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_activity_type">نوع فعالیت</label>
                                <input type="text" id="edit_activity_type" name="edit_activity_type"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_activity_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_economic_code">کد اقتصادی</label>
                                <input type="text" id="edit_economic_code" name="edit_economic_code"
                                    class="form-control" autocomplete="off" />
                                <div id="edit_economic_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_email">ایمیل</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-at"></i></span>
                                    </div>
                                    <input type="text" id="edit_email" name="edit_email" class="form-control"
                                        autocomplete="off" />
                                    <div id="edit_email_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_website">وب سایت</label>
                                <input type="text" id="edit_website" name="edit_website" class="form-control"
                                    autocomplete="off" />
                                <div id="edit_website_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab031">
                    <h3>گروه طرف حساب</h3>
                </fieldset>
                <fieldset id="edit_tab041">
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="edit_credit_limit">سقف اعتبار</label>
                            <input type="text" id="edit_credit_limit" name="edit_credit_limit"
                                class="form-control" autocomplete="off" />
                            <div id="edit_credit_limit_error" class="invalid-feedback"></div>
                        </div>
                        <div class="border border-1 box">
                            <h5>نوع عملکرد</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="opt1">
                                        <input class="form-check-input" type="radio" name="group1"
                                            id="opt1">
                                        فقط هشداری
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="opt2">
                                        <input class="form-check-input" type="radio" name="group1"
                                            id="opt2">
                                        منع فروش
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box">
                            <h5>نحوه محاسبه اعتبار طرف حساب</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="opt3">
                                        <input class="form-check-input" type="radio" name="group2"
                                            id="opt3">
                                        مانده مشتری + چک های پاس نشده
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="opt4">
                                        <input class="form-check-input" type="radio" name="group2"
                                            id="opt4">
                                        مانده مشتری
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box" style="text-align:justify;">
                            <p style="display:contents;">
                                برای محاسبه مبلغ چک های پاس نشده چک های خرج نشده ای که تاریخ سر رسید آن ها
                            </p>
                            <input type="number" id="edit_txt" name="edit_txt" class="form-control"
                                style="width:17%; display:inline;" autocomplete="off" />
                            <p style="display:contents;">
                                روز قبل از تاریخ فاکتور باشند وصول شده تلقی گردد.
                            </p>
                        </div>
                    </div>
                </fieldset>
                <!-- Tabs content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>&nbsp;
                <button type="button" class="btn btn-primary updateTarafHesab">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.edit_taraf_hesab', function(e) {
            e.preventDefault();
            var taraf_hesab_id = $(this).val();
            // console.log(taraf_hesab_id);
            $("#editInfo").modal("show");

            $.ajax({
                type: "GET",
                url: "/taraf-hesab/" + taraf_hesab_id + "/edit",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#edit_taraf_hesab_id").val(taraf_hesab_id);
                        $("#edit_code").val(response.taraf_hesab.code);
                        $("#edit_fullname").val(response.taraf_hesab.fullname);
                        $("#edit_phone").val(response.taraf_hesab.phone);
                    }
                },
            });
        });

        $(document).on("click", ".updateTarafHesab", function(e) {
            e.preventDefault();
            var taraf_hesab_id = $("#edit_taraf_hesab_id").val();
            var data = {
                code: $("#edit_code").val(),
                fullname: $("#edit_fullname").val(),
                phone: $("#edit_phone").val(),
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/taraf-hesab/" + taraf_hesab_id,
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
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            fetchTarafHesab();
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

            if (!$("#edit_tab01").hasClass("active")) {
                $("#edit_tab01 h6").removeClass("text-muted");
                $("#edit_tab02 h6").addClass("text-muted");
                $("#edit_tab03 h6").addClass("text-muted");
                $("#edit_tab04 h6").addClass("text-muted");
                $("#edit_tab01").addClass("active");
                $("#edit_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#edit_tab011").hasClass("show")) {
                $("#edit_tab011").addClass("show");
            }
        });

        //call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#edit_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            edit_clearErrors();
        })

        function edit_clearErrors() {
            $("#edit_code_error").text("");
            $("#edit_code").removeClass("is-invalid");
            $("#edit_fullname_error").text("");
            $("#edit_fullname").removeClass("is-invalid");
            $("#edit_phone_error").text("");
            $("#edit_phone").removeClass("is-invalid");
        }
    </script>
@endpush
