<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 700px;">
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
            <div class="modal-body">
                <!-- Tabs content -->
                <fieldset class="show" id="add_tab011">
                    <div class="bg-light" style="border-radius: 10px;">
                        <h6 class="text-center mb-4 mt-0 pt-4">نوع تعامل طرف حساب</h6>
                        <div class="row pb-4" style="padding-right:2rem !important">
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
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_code">کد طرف حساب</label>
                                <input type="text" id="add_code" name="add_code" class="code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label for="add_fullname">نام و نام خانوادگی</label>
                                    <input type="text" id="add_fullname" name="add_fullname"
                                        class="fullname form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_zip_code">کد پستی</label>
                                <input type="text" id="add_zip_code" name="add_zip_code"
                                    class="zip_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_city">نام شهر</label>
                                <select id="add_city" name="add_city" class="city form-control">
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
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_broker">واسطه فروش</label>
                                <select id="add_broker" name="add_broker" class="broker form-control">
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
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_commission">پورسانت</label>
                                <input type="text" id="add_commission" name="add_commission"
                                    class="commission form-control" placeholder="درصد پورسانت را وارد کنید" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_address">آدرس</label>
                                <input type="text" id="add_address" name="add_address"
                                    class="address form-control" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab021">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_person_type">نوع شخص</label>
                                <select id="add_person_type" name="add_person_type" class="person_type form-control">
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
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_ceo_fullname">نام مدیر عامل</label>
                                <input type="text" id="add_ceo_fullname" name="add_ceo_fullname"
                                    class="ceo_fullname form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_national_code">کد ملی</label>
                                <input type="text" id="add_national_code" name="add_national_code"
                                    class="national_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_birthdate">تاریخ تولد</label>
                                <input type="text" id="add_birthdate" name="add_birthdate"
                                    class="birthdate form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_occupation">شغل</label>
                                <input type="text" id="add_occupation" name="add_occupation"
                                    class="occupation form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_phone">موبایل</label>
                                <input type="text" id="add_phone" name="add_phone" class="phone form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_fax">فاکس</label>
                                <input type="text" id="add_fax" name="add_fax" class="fax form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_tel">تلفن</label>
                                <input type="text" id="add_tel" name="add_tel" class="tel form-control"
                                    placeholder="تلفن را به همراه پیش شماره وارد کنید" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_activity_type">نوع فعالیت</label>
                                <input type="text" id="add_activity_type" name="add_activity_type"
                                    class="activity_type form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_economic_code">کد اقتصادی</label>
                                <input type="text" id="add_economic_code" name="add_economic_code"
                                    class="economic_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_email">ایمیل</label>
                                <input type="text" id="add_email" name="add_email" class="email form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="add_website">وب سایت</label>
                                <input type="text" id="add_website" name="add_website"
                                    class="website form-control" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="add_tab031">
                    <h3>Taraf Hesab Group</h3>
                </fieldset>
                <fieldset id="add_tab041">
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="add_credit_limit">سقف اعتبار</label>
                            <input type="text" id="add_credit_limit" name="add_credit_limit"
                                class="credit_limit form-control" />
                        </div>
                        <div class="border border-1 box">
                            <h5>نوع عملکرد</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt1">
                                        <input class="form-check-input" type="radio" name="add_group1"
                                            id="add_opt1">
                                        فقط هشداری
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt2">
                                        <input class="form-check-input" type="radio" name="add_group1"
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
                                        <input class="form-check-input" type="radio" name="add_group2"
                                            id="add_opt3">
                                        مانده مشتری + چک های پاس نشده
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="add_opt4">
                                        <input class="form-check-input" type="radio" name="add_group2"
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
                            <input type="number" id="add_txt" name="add_txt" class="txt form-control"
                                style="width:17%; display:inline;" />
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
                <button type="button" class="btn btn-primary addTarafHesab">تأیید</button>
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

                var data = {
                    'fullname': $('.fullname').val()
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
                        // console.log(response);
                        if (response.status == 400) {

                        } else {
                            $("#showMessage").addClass(
                                "alert alert-success alert-dismissible fade show"
                            );
                            $("#showMessage").append(
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'
                            );
                            $("#message").text(response.message);
                            $("#createInfo").modal("hide");
                            $("#createInfo").find("input").val("");
                        }
                    }
                });
            });
        });

        //call function on modal shown
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

        //call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $("#add_tab01 h6").removeClass("text-muted");
            $("fieldset").removeClass("show");
        })
    </script>
@endpush
