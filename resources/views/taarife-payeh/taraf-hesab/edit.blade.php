<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editInfoLabel" aria-hidden="true">
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
            <div class="modal-body">
                <!-- Tabs content -->
                <fieldset class="show" id="edit_tab011">
                    <div class="bg-light" style="border-radius: 10px;">
                        <h6 class="text-center mb-4 mt-0 pt-4">نوع تعامل طرف حساب</h6>
                        <div class="row pb-4" style="padding-right:2rem !important">
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
                    <div class="row pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_code">کد طرف حساب</label>
                                <input type="text" id="edit_code" name="edit_code" class="code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label for="edit_fullname">نام و نام خانوادگی</label>
                                    <input type="text" id="edit_fullname" name="edit_fullname"
                                        class="fullname form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_zip_code">کد پستی</label>
                                <input type="text" id="edit_zip_code" name="edit_zip_code"
                                    class="zip_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_city">نام شهر</label>
                                <select id="edit_city" name="edit_city" class="city form-control">
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
                                <label for="edit_broker">واسطه فروش</label>
                                <select id="edit_broker" name="edit_broker" class="broker form-control">
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
                                <label for="edit_commission">پورسانت</label>
                                <input type="text" id="edit_commission" name="edit_commission"
                                    class="commission form-control" placeholder="درصد پورسانت را وارد کنید" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_address">آدرس</label>
                                <input type="text" id="edit_address" name="edit_address"
                                    class="address form-control" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab021">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_person_type">نوع شخص</label>
                                <select id="edit_person_type" name="edit_person_type"
                                    class="person_type form-control">
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
                                <label for="edit_ceo_fullname">نام مدیر عامل</label>
                                <input type="text" id="edit_ceo_fullname" name="edit_ceo_fullname"
                                    class="ceo_fullname form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_national_code">کد ملی</label>
                                <input type="text" id="edit_national_code" name="edit_national_code"
                                    class="national_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_birthdate">تاریخ تولد</label>
                                <input type="text" id="edit_birthdate" name="edit_birthdate"
                                    class="birthdate form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_occupation">شغل</label>
                                <input type="text" id="edit_occupation" name="edit_occupation"
                                    class="occupation form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_phone">موبایل</label>
                                <input type="text" id="edit_phone" name="edit_phone"
                                    class="phone form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_fax">فاکس</label>
                                <input type="text" id="edit_fax" name="edit_fax" class="fax form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_tel">تلفن</label>
                                <input type="text" id="edit_tel" name="edit_tel" class="tel form-control"
                                    placeholder="تلفن را به همراه پیش شماره وارد کنید" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_activity_type">نوع فعالیت</label>
                                <input type="text" id="edit_activity_type" name="edit_activity_type"
                                    class="activity_type form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_economic_code">کد اقتصادی</label>
                                <input type="text" id="edit_economic_code" name="edit_economic_code"
                                    class="economic_code form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_email">ایمیل</label>
                                <input type="text" id="edit_email" name="edit_email"
                                    class="email form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="edit_website">وب سایت</label>
                                <input type="text" id="edit_website" name="edit_website"
                                    class="website form-control" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="edit_tab031">
                    <h3>Taraf Hesab Group</h3>
                </fieldset>
                <fieldset id="edit_tab041">
                    <div class="px-3">
                        <div class="form-group mb-3">
                            <label for="edit_credit_limit">سقف اعتبار</label>
                            <input type="text" id="edit_credit_limit" name="edit_credit_limit"
                                class="credit_limit form-control" />
                        </div>
                        <div class="border border-1 box">
                            <h5>نوع عملکرد</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="edit_opt1">
                                        <input class="form-check-input" type="radio" name="edit_group1"
                                            id="edit_opt1">
                                        فقط هشداری
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="edit_opt2">
                                        <input class="form-check-input" type="radio" name="edit_group1"
                                            id="edit_opt2">
                                        منع فروش
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box">
                            <h5>نحوه محاسبه اعتبار طرف حساب</h5>
                            <div class="form-check row pb-2 px-3" style="padding-right:2rem !important">
                                <div class="col-12">
                                    <label class="form-check-label" for="edit_opt3">
                                        <input class="form-check-input" type="radio" name="edit_group2"
                                            id="edit_opt3">
                                        مانده مشتری + چک های پاس نشده
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label" for="edit_opt4">
                                        <input class="form-check-input" type="radio" name="edit_group2"
                                            id="edit_opt4">
                                        مانده مشتری
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="border border-1 box" style="text-align:justify;">
                            <p style="display:contents;">
                                برای محاسبه مبلغ چک های پاس نشده چک های خرج نشده ای که تاریخ سر رسید آن ها
                            </p>
                            <input type="number" id="edit_txt" name="edit_txt" class="txt form-control"
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
                <button type="button" class="btn btn-primary editTarafHesab">تأیید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editTarafHesab', function(e) {
                e.preventDefault();

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
        })
    </script>
@endpush
