<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">طرف حساب جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                <div class="tabs active" id="add_tab01">
                    <h6 class="font-weight-bold">اطلاعات اصلی</h6>
                </div>
                <div class="tabs" id="add_tab02">
                    <h6 class="text-muted">اطلاعات تکمیلی</h6>
                </div>
                <div class="tabs" id="add_tab03">
                    <h6 class="text-muted">گروه طرف حساب</h6>
                </div>
                <div class="tabs" id="add_tab04">
                    <h6 class="text-muted">سقف اعتبار</h6>
                </div>
            </div>
            <div class="line"></div>
            <div class="modal-body" style="min-height: 538px">
                <!-- Tabs content -->
                <fieldset class="show" id="add_tab011">
                    <div class="bg-light" style="border-radius: 10px;">
                        <h6 class="text-center mb-4 mt-0 pt-4">نوع تعامل طرف حساب</h6>
                        <div class="row pb-4" style="margin-right:2rem !important">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="add_sellerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_sellerCheckBox">
                                    فروشنده
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="add_buyerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_buyerCheckBox">
                                    خریدار
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="add_brokerCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_brokerCheckBox">
                                    واسطه فروش
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="add_investorCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_investorCheckBox">
                                    سرمایه گذار
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-check-label" for="add_blockListCheckBox">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="add_blockListCheckBox">
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
                                    <label class="form-check-label" for="add_activeCheckBox">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="add_activeCheckBox">
                                        فعال
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-check-label" for="add_movePhoneCheckBox">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="add_movePhoneCheckBox">
                                        انتقال به دفترچه تلفن
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_code">کد طرف حساب</label>
                                <input type="text" id="add_code" name="add_code" class="form-control"
                                    autocomplete="off" />
                                <div id="add_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label for="add_fullname">نام و نام خانوادگی</label>
                                    <input type="text" id="add_fullname" name="add_fullname" class="form-control"
                                        autocomplete="off" />
                                    <div id="add_fullname_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_zip_code">کد پستی</label>
                                <input type="text" id="add_zip_code" name="add_zip_code"
                                    class="form-control leftToRight rightAlign inputMaskZipCode" autocomplete="off" />
                                <div id="add_zip_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_phone">موبایل</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="add_phone" name="add_phone"
                                        class="form-control leftToRight rightAlign inputMaskPhone"
                                        autocomplete="off" />
                                    <div id="add_phone_error" style="margin-right:38px;" class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_city">نام شهر</label>
                                <select id="add_city" name="add_city" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>شهر را انتخاب کنید</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="add_city_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_broker">واسطه فروش</label>
                                <select id="add_broker" name="add_broker" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>واسطه فروش را انتخاب کنید</option>
                                    @foreach ($vaseteh_foroosh as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="add_broker_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_commission">پورسانت</label>
                                <input type="text" id="add_commission" name="add_commission" class="form-control"
                                    placeholder="درصد پورسانت را وارد کنید" autocomplete="off" />
                                <div id="add_commission_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_address">آدرس</label>
                                <input type="text" id="add_address" name="add_address" class="form-control"
                                    autocomplete="off" />
                                <div id="add_address_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab021">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_person_type">نوع شخص</label>
                                <select id="add_person_type" name="add_person_type" class="form-control select2"
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
                                <div id="add_person_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_ceo_fullname">نام مدیر عامل</label>
                                <input type="text" id="add_ceo_fullname" name="add_ceo_fullname"
                                    class="form-control" autocomplete="off" />
                                <div id="add_ceo_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_national_code">کد ملی</label>
                                <input type="text" id="add_national_code" name="add_national_code"
                                    class="form-control leftToRight rightAlign inputMaskNationalCode"
                                    autocomplete="off" />
                                <div id="add_national_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_birthdate">تاریخ تولد</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="add_birthdate" name="add_birthdate"
                                        class="leftToRight rightAlign inputMaskDate form-control"
                                        autocomplete="off" />
                                    <div id="add_birthdate_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_occupation">شغل</label>
                                <input type="text" id="add_occupation" name="add_occupation" class="form-control"
                                    autocomplete="off" />
                                <div id="add_occupation_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_fax">فاکس</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="add_fax" name="add_fax"
                                        class="form-control leftToRight rightAlign inputMaskFax" autocomplete="off" />
                                    <div id="add_fax_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_tel">تلفن</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="add_tel" name="add_tel"
                                        class="form-control leftToRight rightAlign inputMaskTel" autocomplete="off" />
                                    <div id="add_tel_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_activity_type">نوع فعالیت</label>
                                <input type="text" id="add_activity_type" name="add_activity_type"
                                    class="form-control" autocomplete="off" />
                                <div id="add_activity_type_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_economic_code">کد اقتصادی</label>
                                <input type="text" id="add_economic_code" name="add_economic_code"
                                    class="form-control" autocomplete="off" />
                                <div id="add_economic_code_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_email">ایمیل</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-at"></i></span>
                                    </div>
                                    <input type="text" id="add_email" name="add_email" class="form-control"
                                        autocomplete="off" />
                                    <div id="add_email_error" class="invalid-feedback" style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_website">وب سایت</label>
                                <input type="text" id="add_website" name="add_website" class="form-control"
                                    autocomplete="off" />
                                <div id="add_website_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab031">
                    <h3>گروه طرف حساب</h3>
                </fieldset>
                <fieldset id="add_tab041">
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="add_credit_limit">سقف اعتبار</label>
                            <input type="text" id="add_credit_limit" name="add_credit_limit" class="form-control"
                                autocomplete="off" onkeyup="separateNum(this.value,this,'add_credit_limit_price');" />
                            <div id="add_credit_limit_error" class="invalid-feedback"></div>
                            <div id="add_credit_limit_price" style="text-align: justify; color:green">
                            </div>
                        </div>
                        <div class="border border-1 box">
                            <h5>نوع عملکرد</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt1">
                                        <input class="form-check-input" type="radio" name="group1"
                                            id="add_opt1">
                                        فقط هشداری
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt2">
                                        <input class="form-check-input" type="radio" name="group1"
                                            id="add_opt2">
                                        منع فروش
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box">
                            <h5>نحوه محاسبه اعتبار طرف حساب</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt3">
                                        <input class="form-check-input" type="radio" name="group2"
                                            id="add_opt3">
                                        مانده مشتری + چک های پاس نشده
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt4">
                                        <input class="form-check-input" type="radio" name="group2"
                                            id="add_opt4">
                                        مانده مشتری
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box" style="text-align:justify;">
                            <p style="display:contents;">
                                برای محاسبه مبلغ چک های پاس نشده چک های خرج نشده ای که تاریخ سر رسید آن ها
                            </p>
                            <input type="number" id="add_not_spent" name="add_not_spent" class="form-control"
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
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addTarafHesab">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addTarafHesab', function(e) {
                e.preventDefault();

                if (document.getElementById("add_sellerCheckBox").checked) {
                    var add_sellerCheckBox = "فعال";
                } else {
                    var add_sellerCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_buyerCheckBox").checked) {
                    var add_buyerCheckBox = "فعال";
                } else {
                    var add_buyerCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_brokerCheckBox").checked) {
                    var add_brokerCheckBox = "فعال";
                } else {
                    var add_brokerCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_investorCheckBox").checked) {
                    var add_investorCheckBox = "فعال";
                } else {
                    var add_investorCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_blockListCheckBox").checked) {
                    var add_blockListCheckBox = "فعال";
                } else {
                    var add_blockListCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_activeCheckBox").checked) {
                    var add_activeCheckBox = "فعال";
                } else {
                    var add_activeCheckBox = "غیرفعال";
                }

                if (document.getElementById("add_movePhoneCheckBox").checked) {
                    var add_movePhoneCheckBox = "فعال";
                } else {
                    var add_movePhoneCheckBox = "غیرفعال";
                }

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

                if ($('#add_opt3').is(':checked')) {
                    var add_opt3 = "فعال";
                } else {
                    var add_opt3 = "غیرفعال";
                }

                if ($('#add_opt4').is(':checked')) {
                    var add_opt4 = "فعال";
                } else {
                    var add_opt4 = "غیرفعال";
                }

                var data = {
                    'chk_seller': add_sellerCheckBox,
                    'chk_buyer': add_buyerCheckBox,
                    'chk_broker': add_brokerCheckBox,
                    'chk_investor': add_investorCheckBox,
                    'chk_block_list': add_blockListCheckBox,
                    'chk_active': add_activeCheckBox,
                    'chk_move_phone': add_movePhoneCheckBox,
                    'code': $('#add_code').val(),
                    'fullname': $('#add_fullname').val(),
                    'zip_code': $('#add_zip_code').val(),
                    'phone': $('#add_phone').val(),
                    'city': $('#add_city').val(),
                    'broker': $('#add_broker').val(),
                    'commission': $('#add_commission').val(),
                    'address': $('#add_address').val(),
                    'person_type': $('#add_person_type').val(),
                    'ceo_fullname': $('#add_ceo_fullname').val(),
                    'national_code': $('#add_national_code').val(),
                    'birthdate': $('#add_birthdate').val(),
                    'occupation': $('#add_occupation').val(),
                    'fax': $('#add_fax').val(),
                    'tel': $('#add_tel').val(),
                    'activity_type': $('#add_activity_type').val(),
                    'economic_code': $('#add_economic_code').val(),
                    'email': $('#add_email').val(),
                    'website': $('#add_website').val(),
                    'credit_limit': $('#add_credit_limit').val(),
                    'opt_warning': add_opt1,
                    'opt_prohibition_sale': add_opt2,
                    'opt_uncleared': add_opt3,
                    'opt_customer_balance': add_opt4,
                    'not_spent': $('#add_not_spent').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/taraf-hesab",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        fetchDataAsPaginate
                            (
                                'index_search',
                                '/taraf-hesab',
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
                            .then(() => {
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

            if (!$("#add_tab01").hasClass("active")) {
                $("#add_tab01 h6").removeClass("text-muted");
                $("#add_tab02 h6").addClass("text-muted");
                $("#add_tab03 h6").addClass("text-muted");
                $("#add_tab04 h6").addClass("text-muted");
                $("#add_tab01").addClass("active");
                $("#add_tab01 h6").addClass("font-weight-bold");
            }

            if (!$("#add_tab011").hasClass("show")) {
                $("#add_tab011").addClass("show");
            }
        });

        // call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#add_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
            add_clearErrors();
            add_clearPrice();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_code_error").text("");
            $("#add_code").removeClass("is-invalid");
            $("#add_fullname_error").text("");
            $("#add_fullname").removeClass("is-invalid");
            $("#add_phone_error").text("");
            $("#add_phone").removeClass("is-invalid");
            $("#add_city_error").text("");
            $("#add_city").removeClass("is-invalid");
            $("#add_fax_error").text("");
            $("#add_fax").removeClass("is-invalid");
            $("#add_tel_error").text("");
            $("#add_tel").removeClass("is-invalid");
            $("#add_email_error").text("");
            $("#add_email").removeClass("is-invalid");
            $("#add_website_error").text("");
            $("#add_website").removeClass("is-invalid");
        }

        function add_clearPrice() {
            $("#add_credit_limit_price").text("");
        }

        function add_defaultSelectedValue() {
            $('#add_sellerCheckBox').prop('checked', false);
            $('#add_buyerCheckBox').prop('checked', false);
            $('#add_brokerCheckBox').prop('checked', false);
            $('#add_investorCheckBox').prop('checked', false);
            $('#add_blockListCheckBox').prop('checked', false);
            $('#add_activeCheckBox').prop('checked', false);
            $('#add_movePhoneCheckBox').prop('checked', false);
            $('#add_opt1').prop('checked', false);
            $('#add_opt2').prop('checked', false);
            $('#add_opt3').prop('checked', false);
            $('#add_opt4').prop('checked', false);
            $(add_city).prop('selectedIndex', 0).change();
            $(add_broker).prop('selectedIndex', 0).change();
            $(add_person_type).prop('selectedIndex', 0).change();
        }
    </script>
@endpush
