<!-- Modal -->
<div class="modal fade" id="editInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="editInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoLabel">ویرایش نقش و سطح دسترسی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-height: 538px">
                <div class="row" style="margin:1rem;">
                    <input type="hidden" id="edit_role_id">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="edit_role_name">نقش</label>
                            <input type="text" id="edit_role_name" name="edit_role_name" class="form-control"
                                autocomplete="off" />
                            <div id="edit_role_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0 3rem 0 0; font-weight: 700;">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="form-check-label" for="edit_checked_all">
                            <input class="form-check-input edit_check_all" type="checkbox" name="edit_checked_all"
                                id="edit_checked_all">
                            انتخاب همه
                        </label>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_taarife_payeh">
                                <input class="form-check-input edit_check_all" type="checkbox" name="edit_taarife_payeh"
                                    id="edit_taarife_payeh">
                                <h6 style="font-weight: 700; color: green;">تعاریف پایه</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_taraf_hesab">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_taraf_hesab" id="edit_taraf_hesab">
                                معرفی طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_taraf_hesab_group">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_taraf_hesab_group" id="edit_taraf_hesab_group">
                                گروه بندی طرف های حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_staff">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_staff" id="edit_staff">
                                معرفی پرسنل
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_warehouse">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_warehouse" id="edit_warehouse">
                                معرفی انبارها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_product_no_unit">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_product_no_unit" id="edit_product_no_unit">
                                معرفی واحد شمارش کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_product_farei_asli">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_product_farei_asli" id="edit_product_farei_asli">
                                معرفی گروه اصلی و فرعی کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_products">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_products" id="edit_products">
                                معرفی کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_services">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_services" id="edit_services">
                                معرفی خدمات
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_arzesh_afzoude_groups">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_arzesh_afzoude_groups"
                                    id="edit_arzesh_afzoude_groups">
                                معرفی گروه های ارزش افزوده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_banks_types">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_banks_types" id="edit_banks_types">
                                معرفی انواع بانک های کشور
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_bank_accounts">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_bank_accounts" id="edit_bank_accounts">
                                معرفی حساب های بانکی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cities">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_cities" id="edit_cities">
                                معرفی شهرهای کشور
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_fund">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_fund" id="edit_fund">
                                معرفی درآمد / هزینه / صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_account_group">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_account_group" id="edit_account_group">
                                معرفی گروه حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_account_headings">
                                <input class="form-check-input edit_check_all edit_taarife_payeh_check_all"
                                    type="checkbox" name="edit_account_headings" id="edit_account_headings">
                                معرفی سرفصل های حساب (کل، معین، تفصیل)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_buy_sell">
                                <input class="form-check-input edit_check_all" type="checkbox" name="edit_buy_sell"
                                    id="edit_buy_sell">
                                <h6 style="font-weight: 700; color: green;">خرید و فروش</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_sell_factor">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_sell_factor" id="edit_sell_factor">
                                فاکتور فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_buy_factor">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_buy_factor" id="edit_buy_factor">
                                فاکتور خرید
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_return_sell_factor">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_return_sell_factor" id="edit_return_sell_factor">
                                فاکتور برگشت از فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_return_buy_factor">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_return_buy_factor" id="edit_return_buy_factor">
                                فاکتور برگشت از خرید
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_sell_factor_advanced">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_sell_factor_advanced" id="edit_sell_factor_advanced">
                                پیش فاکتور فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_wastage_factor">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_wastage_factor" id="edit_wastage_factor">
                                فاکتور ضایعات
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_benefit_loss_bill">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_benefit_loss_bill" id="edit_benefit_loss_bill">
                                صورت حساب سود و زیان
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_ttms">
                                <input class="form-check-input edit_check_all edit_buy_sell_check_all" type="checkbox"
                                    name="edit_ttms" id="edit_ttms">
                                گزارشات فصلی دارایی (TTMS)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_buy_sell_reports">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_buy_sell_reports" id="edit_buy_sell_reports">
                                <h6 style="font-weight: 700; color: green;">گزارشات خرید و فروش</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_factors_types_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_factors_types_report" id="edit_factors_types_report">
                                گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_period_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_period_report" id="edit_period_report">
                                گزارش دوره ای خرید و فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_sell_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_sell_report" id="edit_sell_report">
                                گزارش فروش به تفکیک ماه، فصل، سال
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_sell_statistics_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_sell_statistics_report"
                                    id="edit_sell_statistics_report">
                                گزارش آماری فروش بر اساس کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_customer_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_customer_report" id="edit_customer_report">
                                گزارش آماری فروش بر اساس مشتری
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_buy_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_buy_report" id="edit_buy_report">
                                گزارش خرید به تفکیک ماه، فصل، سال
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_buy_statistics_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_buy_statistics_report"
                                    id="edit_buy_statistics_report">
                                گزارش آماری خرید بر اساس کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_taraf_hesab_buy_report">
                                <input class="form-check-input edit_check_all edit_buy_sell_reports_check_all"
                                    type="checkbox" name="edit_taraf_hesab_buy_report"
                                    id="edit_taraf_hesab_buy_report">
                                گزارش آماری خرید بر اساس طرف حساب
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_benefit_report">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_benefit_report" id="edit_benefit_report">
                                <h6 style="font-weight: 700; color: green;">گزارش سود ناخالص فروش کالا</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_products_benefit">
                                <input class="form-check-input edit_check_all edit_benefit_report_check_all"
                                    type="checkbox" name="edit_products_benefit" id="edit_products_benefit">
                                سود به تفکیک کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_factors_benefit">
                                <input class="form-check-input edit_check_all edit_benefit_report_check_all"
                                    type="checkbox" name="edit_factors_benefit" id="edit_factors_benefit">
                                سود به تفکیک فاکتورها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_taraf_hesab_benefit">
                                <input class="form-check-input edit_check_all edit_benefit_report_check_all"
                                    type="checkbox" name="edit_taraf_hesab_benefit" id="edit_taraf_hesab_benefit">
                                سود به تفکیک طرف های حساب
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_warehouse_menu">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_warehouse_menu" id="edit_warehouse_menu">
                                <h6 style="font-weight: 700; color: green;">انبار</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_warehouse_moves">
                                <input class="form-check-input edit_check_all edit_warehouse_menu_check_all"
                                    type="checkbox" name="edit_warehouse_moves" id="edit_warehouse_moves">
                                انتقال بین انبارها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_product_warehouse_reports">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_product_warehouse_reports" id="edit_product_warehouse_reports">
                                <h6 style="font-weight: 700; color: green;">گزارشات کالا و انبار</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_riali_report">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_riali_report" id="edit_riali_report">
                                گزارش موجودی ریالی به تفکیک انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_products_barcode">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_products_barcode" id="edit_products_barcode">
                                چاپ بارکد کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cardex">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_cardex" id="edit_cardex">
                                گردش کالا در انبار (کاردکس)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_inventory_warehouse">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_inventory_warehouse" id="edit_inventory_warehouse">
                                موجودی کالاهای انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_inventory_products">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_inventory_products" id="edit_inventory_products">
                                موجودی کالاها به تفکیک انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_ordering_products">
                                <input class="form-check-input edit_check_all edit_product_warehouse_reports_check_all"
                                    type="checkbox" name="edit_ordering_products" id="edit_ordering_products">
                                نقطه سفارش کالاها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_financial_management">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_financial_management" id="edit_financial_management">
                                <h6 style="font-weight: 700; color: green;">مدیریت مالی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_accounting_documents">
                                <input class="form-check-input edit_check_all edit_financial_management_check_all"
                                    type="checkbox" name="edit_accounting_documents" id="edit_accounting_documents">
                                اسناد حسابداری
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_receive_payment">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_receive_payment" id="edit_receive_payment">
                                <h6 style="font-weight: 700; color: green;">دریافت / پرداخت</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_receive_from_the_account">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_receive_from_the_account"
                                    id="edit_receive_from_the_account">
                                دریافت از طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_payment_to_account">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_payment_to_account" id="edit_payment_to_account">
                                پرداخت به طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_pay">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_pay" id="edit_pay">
                                پرداخت هزینه
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_fund_to_bank">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_fund_to_bank" id="edit_fund_to_bank">
                                از صندوق به بانک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_bank_to_fund">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_bank_to_fund" id="edit_bank_to_fund">
                                از بانک به صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_bank_to_bank">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_bank_to_bank" id="edit_bank_to_bank">
                                بانک به بانک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_receive_miscellaneous_income">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_receive_miscellaneous_income"
                                    id="edit_receive_miscellaneous_income">
                                دریافت درآمد متفرقه
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_withdrawal_partner">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_withdrawal_partner" id="edit_withdrawal_partner">
                                برداشت شرکا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_investment">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_investment" id="edit_investment">
                                پرداخت شرکا (سرمایه گذاری)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_transfer_person">
                                <input class="form-check-input edit_check_all edit_receive_payment_check_all"
                                    type="checkbox" name="edit_transfer_person" id="edit_transfer_person">
                                انتقال بین اشخاص
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_first_period">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_first_period" id="edit_first_period">
                                <h6 style="font-weight: 700; color: green;">اول دوره</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_fund_period">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_fund_period" id="edit_fund_period">
                                اول دوره صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_bank_accounts_period">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_bank_accounts_period" id="edit_bank_accounts_period">
                                اول دوره حساب های بانکی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_taraf_hesab_period">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_taraf_hesab_period" id="edit_taraf_hesab_period">
                                اول دوره طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_receive_cheques">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_receive_cheques" id="edit_receive_cheques">
                                چک های دریافتی اول دوره
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_pay_cheques">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_pay_cheques" id="edit_pay_cheques">
                                چک های پرداختی اول دوره
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_inventory_products_period">
                                <input class="form-check-input edit_check_all edit_first_period_check_all"
                                    type="checkbox" name="edit_inventory_products_period"
                                    id="edit_inventory_products_period">
                                موجودی اول دوره کالاها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_cheque_management">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_cheque_management" id="edit_cheque_management">
                                <h6 style="font-weight: 700; color: green;">مدیریت چک</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cheque_book">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_cheque_book" id="edit_cheque_book">
                                معرفی دسته چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cheque_book_report">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_cheque_book_report" id="edit_cheque_book_report">
                                گزارش دسته چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_receive_cheques_report">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_receive_cheques_report"
                                    id="edit_receive_cheques_report">
                                گزارش چک های دریافتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_pay_cheques_report">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_pay_cheques_report" id="edit_pay_cheques_report">
                                گزارش چک های پرداختی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_circulation_receive_cheque">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_circulation_receive_cheque"
                                    id="edit_circulation_receive_cheque">
                                سابقه گردش چک دریافتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_circulation_pay_cheque_report">
                                <input class="form-check-input edit_check_all edit_cheque_management_check_all"
                                    type="checkbox" name="edit_circulation_pay_cheque_report"
                                    id="edit_circulation_pay_cheque_report">
                                سابقه گردش چک پرداختی
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_receive_cheques_operations">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_receive_cheques_operations" id="edit_receive_cheques_operations">
                                <h6 style="font-weight: 700; color: green;">عملیات چک های دریافتی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_deposit">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_deposit" id="edit_deposit">
                                خواباندن چک به حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_notification">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_notification" id="edit_notification">
                                اعلام وصول چک های خوابانده شده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_manual">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_manual" id="edit_manual">
                                اعلام وصول دستی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_returning_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_returning_cheque" id="edit_returning_cheque">
                                برگشت چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_announcement">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_announcement" id="edit_announcement">
                                اعلام وصول چک های برگشتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_spent_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_spent_cheque" id="edit_spent_cheque">
                                پس گرفتن چک خرج شده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cheque_return">
                                <input
                                    class="form-check-input edit_check_all edit_receive_cheques_operations_check_all"
                                    type="checkbox" name="edit_cheque_return" id="edit_cheque_return">
                                عودت چک
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_payment_cheques_operations">
                                <input class="form-check-input edit_check_all" type="checkbox"
                                    name="edit_payment_cheques_operations" id="edit_payment_cheques_operations">
                                <h6 style="font-weight: 700; color: green;">عملیات چک های پرداختی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_receipt_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_payment_cheques_operations_check_all"
                                    type="checkbox" name="edit_receipt_cheque" id="edit_receipt_cheque">
                                اعلام وصول چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_pay_returning_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_payment_cheques_operations_check_all"
                                    type="checkbox" name="edit_pay_returning_cheque" id="edit_pay_returning_cheque">
                                برگشت چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cashing_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_payment_cheques_operations_check_all"
                                    type="checkbox" name="edit_cashing_cheque" id="edit_cashing_cheque">
                                پس گرفتن چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_cancel_cheque">
                                <input
                                    class="form-check-input edit_check_all edit_payment_cheques_operations_check_all"
                                    type="checkbox" name="edit_cancel_cheque" id="edit_cancel_cheque">
                                ابطال چک
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_security">
                                <input class="form-check-input edit_check_all" type="checkbox" name="edit_security"
                                    id="edit_security">
                                <h6 style="font-weight: 700; color: green;">امنیت</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_users">
                                <input class="form-check-input edit_check_all edit_security_check_all" type="checkbox"
                                    name="edit_users" id="edit_users">
                                فهرست کاربران
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_profile">
                                <input class="form-check-input edit_check_all edit_security_check_all" type="checkbox"
                                    name="edit_profile" id="edit_profile">
                                پروفایل من
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_roles">
                                <input class="form-check-input edit_check_all edit_security_check_all" type="checkbox"
                                    name="edit_roles" id="edit_roles">
                                نقش ها و مجوز دسترسی
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="edit_facilities">
                                <input class="form-check-input edit_check_all" type="checkbox" name="edit_facilities"
                                    id="edit_facilities">
                                <h6 style="font-weight: 700; color: green;">امکانات</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="edit_phone_book">
                                <input class="form-check-input edit_check_all edit_facilities_check_all"
                                    type="checkbox" name="edit_phone_book" id="edit_phone_book">
                                دفترچه تلفن
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary updateRole">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $('#edit_checked_all').change(function() {
            $('.edit_check_all').prop('checked', this.checked);
        });

        $('.edit_check_all').change(function() {
            if ($('.edit_check_all:checked').length == $('.edit_check_all').length) {
                $('#edit_checked_all').prop('checked', true);
            } else {
                $('#edit_checked_all').prop('checked', false);
            }
        });

        $('#edit_taarife_payeh').change(function() {
            $('.edit_taarife_payeh_check_all').prop('checked', this.checked);
        });

        $('.edit_taarife_payeh_check_all').change(function() {
            if ($('.edit_taarife_payeh_check_all:checked').length == $('.edit_taarife_payeh_check_all').length) {
                $('#edit_taarife_payeh').prop('checked', true);
            } else {
                $('#edit_taarife_payeh').prop('checked', false);
            }
        });

        $('#edit_buy_sell').change(function() {
            $('.edit_buy_sell_check_all').prop('checked', this.checked);
        });

        $('.edit_buy_sell_check_all').change(function() {
            if ($('.edit_buy_sell_check_all:checked').length == $('.edit_buy_sell_check_all').length) {
                $('#edit_buy_sell').prop('checked', true);
            } else {
                $('#edit_buy_sell').prop('checked', false);
            }
        });

        $('#edit_buy_sell_reports').change(function() {
            $('.edit_buy_sell_reports_check_all').prop('checked', this.checked);
        });

        $('.edit_buy_sell_reports_check_all').change(function() {
            if ($('.edit_buy_sell_reports_check_all:checked').length == $('.edit_buy_sell_reports_check_all')
                .length) {
                $('#edit_buy_sell_reports').prop('checked', true);
            } else {
                $('#edit_buy_sell_reports').prop('checked', false);
            }
        });

        $('#edit_benefit_report').change(function() {
            $('.edit_benefit_report_check_all').prop('checked', this.checked);
        });

        $('.edit_benefit_report_check_all').change(function() {
            if ($('.edit_benefit_report_check_all:checked').length == $('.edit_benefit_report_check_all')
                .length) {
                $('#edit_benefit_report').prop('checked', true);
            } else {
                $('#edit_benefit_report').prop('checked', false);
            }
        });

        $('#edit_warehouse_menu').change(function() {
            $('.edit_warehouse_menu_check_all').prop('checked', this.checked);
        });

        $('.edit_warehouse_menu_check_all').change(function() {
            if ($('.edit_warehouse_menu_check_all:checked').length == $('.edit_warehouse_menu_check_all')
                .length) {
                $('#edit_warehouse_menu').prop('checked', true);
            } else {
                $('#edit_warehouse_menu').prop('checked', false);
            }
        });

        $('#edit_product_warehouse_reports').change(function() {
            $('.edit_product_warehouse_reports_check_all').prop('checked', this.checked);
        });

        $('.edit_product_warehouse_reports_check_all').change(function() {
            if ($('.edit_product_warehouse_reports_check_all:checked').length == $(
                    '.edit_product_warehouse_reports_check_all')
                .length) {
                $('#edit_product_warehouse_reports').prop('checked', true);
            } else {
                $('#edit_product_warehouse_reports').prop('checked', false);
            }
        });

        $('#edit_financial_management').change(function() {
            $('.edit_financial_management_check_all').prop('checked', this.checked);
        });

        $('.edit_financial_management_check_all').change(function() {
            if ($('.edit_financial_management_check_all:checked').length == $(
                    '.edit_financial_management_check_all')
                .length) {
                $('#edit_financial_management').prop('checked', true);
            } else {
                $('#edit_financial_management').prop('checked', false);
            }
        });

        $('#edit_receive_payment').change(function() {
            $('.edit_receive_payment_check_all').prop('checked', this.checked);
        });

        $('.edit_receive_payment_check_all').change(function() {
            if ($('.edit_receive_payment_check_all:checked').length == $(
                    '.edit_receive_payment_check_all')
                .length) {
                $('#edit_receive_payment').prop('checked', true);
            } else {
                $('#edit_receive_payment').prop('checked', false);
            }
        });

        $('#edit_first_period').change(function() {
            $('.edit_first_period_check_all').prop('checked', this.checked);
        });

        $('.edit_first_period_check_all').change(function() {
            if ($('.edit_first_period_check_all:checked').length == $(
                    '.edit_first_period_check_all')
                .length) {
                $('#edit_first_period').prop('checked', true);
            } else {
                $('#edit_first_period').prop('checked', false);
            }
        });

        $('#edit_cheque_management').change(function() {
            $('.edit_cheque_management_check_all').prop('checked', this.checked);
        });

        $('.edit_cheque_management_check_all').change(function() {
            if ($('.edit_cheque_management_check_all:checked').length == $(
                    '.edit_cheque_management_check_all')
                .length) {
                $('#edit_cheque_management').prop('checked', true);
            } else {
                $('#edit_cheque_management').prop('checked', false);
            }
        });

        $('#edit_receive_cheques_operations').change(function() {
            $('.edit_receive_cheques_operations_check_all').prop('checked', this.checked);
        });

        $('.edit_receive_cheques_operations_check_all').change(function() {
            if ($('.edit_receive_cheques_operations_check_all:checked').length == $(
                    '.edit_receive_cheques_operations_check_all')
                .length) {
                $('#edit_receive_cheques_operations').prop('checked', true);
            } else {
                $('#edit_receive_cheques_operations').prop('checked', false);
            }
        });

        $('#edit_payment_cheques_operations').change(function() {
            $('.edit_payment_cheques_operations_check_all').prop('checked', this.checked);
        });

        $('.edit_payment_cheques_operations_check_all').change(function() {
            if ($('.edit_payment_cheques_operations_check_all:checked').length == $(
                    '.edit_payment_cheques_operations_check_all')
                .length) {
                $('#edit_payment_cheques_operations').prop('checked', true);
            } else {
                $('#edit_payment_cheques_operations').prop('checked', false);
            }
        });

        $('#edit_security').change(function() {
            $('.edit_security_check_all').prop('checked', this.checked);
        });

        $('.edit_security_check_all').change(function() {
            if ($('.edit_security_check_all:checked').length == $(
                    '.edit_security_check_all')
                .length) {
                $('#edit_security').prop('checked', true);
            } else {
                $('#edit_security').prop('checked', false);
            }
        });

        $('#edit_facilities').change(function() {
            $('.edit_facilities_check_all').prop('checked', this.checked);
        });

        $('.edit_facilities_check_all').change(function() {
            if ($('.edit_facilities_check_all:checked').length == $(
                    '.edit_facilities_check_all')
                .length) {
                $('#edit_facilities').prop('checked', true);
            } else {
                $('#edit_facilities').prop('checked', false);
            }
        });

        $(document).on('click', '.edit_role', function(e) {
            e.preventDefault();
            var role_id = $(this).val();
            // console.log(role_id);

            $.ajax({
                type: "GET",
                url: "/roles/" + role_id + "/edit",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#editInfo").modal("show");
                        $("#edit_role_id").val(role_id);

                        $("#edit_role_name").val(response.role.role_name);

                        response.role.checked_all === "true" ? $('#edit_checked_all').prop(
                            'checked',
                            true) : $('#edit_checked_all').prop('checked', false);

                        response.role.taarife_payeh === "true" ? $('#edit_taarife_payeh').prop(
                            'checked',
                            true) : $('#edit_taarife_payeh').prop('checked', false);
                        response.role.buy_sell === "true" ? $('#edit_buy_sell').prop('checked',
                            true) : $('#edit_buy_sell').prop('checked', false);
                        response.role.buy_sell_reports === "true" ? $('#edit_buy_sell_reports').prop(
                            'checked',
                            true) : $('#edit_buy_sell_reports').prop('checked', false);
                        response.role.benefit_report === "true" ? $('#edit_benefit_report').prop(
                            'checked',
                            true) : $('#edit_benefit_report').prop('checked', false);
                        response.role.warehouse_menu === "true" ? $('#edit_warehouse_menu').prop(
                            'checked',
                            true) : $('#edit_warehouse_menu').prop('checked', false);
                        response.role.product_warehouse_reports === "true" ? $(
                            '#edit_product_warehouse_reports').prop('checked',
                            true) : $('#edit_product_warehouse_reports').prop('checked', false);
                        response.role.financial_management === "true" ? $('#edit_financial_management')
                            .prop('checked',
                                true) : $('#edit_financial_management').prop('checked', false);
                        response.role.receive_payment === "true" ? $('#edit_receive_payment').prop(
                            'checked',
                            true) : $('#edit_receive_payment').prop('checked', false);
                        response.role.first_period === "true" ? $('#edit_first_period').prop('checked',
                            true) : $('#edit_first_period').prop('checked', false);
                        response.role.cheque_management === "true" ? $('#edit_cheque_management').prop(
                            'checked',
                            true) : $('#edit_cheque_management').prop('checked', false);
                        response.role.receive_cheques_operations === "true" ? $(
                            '#edit_receive_cheques_operations').prop('checked',
                            true) : $('#edit_receive_cheques_operations').prop('checked', false);
                        response.role.payment_cheques_operations === "true" ? $(
                            '#edit_payment_cheques_operations').prop('checked',
                            true) : $('#edit_payment_cheques_operations').prop('checked', false);
                        response.role.security === "true" ? $('#edit_security').prop('checked',
                            true) : $('#edit_security').prop('checked', false);
                        response.role.facilities === "true" ? $('#edit_facilities').prop('checked',
                            true) : $('#edit_facilities').prop('checked', false);

                        response.role.taraf_hesab === "true" ? $('#edit_taraf_hesab').prop('checked',
                            true) : $('#edit_taraf_hesab').prop('checked', false);
                        response.role.taraf_hesab_group === "true" ? $('#edit_taraf_hesab_group').prop(
                            'checked', true) : $('#edit_taraf_hesab_group').prop('checked', false);
                        response.role.staff === "true" ? $('#edit_staff').prop('checked',
                            true) : $('#edit_staff').prop('checked', false);
                        response.role.warehouse === "true" ? $('#edit_warehouse').prop('checked',
                            true) : $('#edit_warehouse').prop('checked', false);
                        response.role.product_no_unit === "true" ? $('#edit_product_no_unit').prop(
                            'checked', true) : $('#edit_product_no_unit').prop('checked', false);
                        response.role.product_farei_asli === "true" ? $('#edit_product_farei_asli')
                            .prop('checked', true) : $('#edit_product_farei_asli').prop('checked',
                                false);
                        response.role.products === "true" ? $('#edit_products').prop('checked',
                            true) : $('#edit_products').prop('checked', false);
                        response.role.services === "true" ? $('#edit_services').prop('checked',
                            true) : $('#edit_services').prop('checked', false);
                        response.role.arzesh_afzoude_groups === "true" ? $(
                            '#edit_arzesh_afzoude_groups').prop('checked', true) : $(
                            '#edit_arzesh_afzoude_groups').prop('checked', false);
                        response.role.banks_types === "true" ? $('#edit_banks_types').prop('checked',
                            true) : $('#edit_banks_types').prop('checked', false);
                        response.role.bank_accounts === "true" ? $('#edit_bank_accounts').prop(
                            'checked', true) : $('#edit_bank_accounts').prop('checked', false);
                        response.role.cities === "true" ? $('#edit_cities').prop('checked',
                            true) : $('#edit_cities').prop('checked', false);
                        response.role.fund === "true" ? $('#edit_fund').prop('checked',
                            true) : $('#edit_fund').prop('checked', false);
                        response.role.account_group === "true" ? $('#edit_account_group').prop(
                            'checked', true) : $('#edit_account_group').prop('checked', false);
                        response.role.account_headings === "true" ? $('#edit_account_headings').prop(
                            'checked', true) : $('#edit_account_headings').prop('checked', false);
                        response.role.sell_factor === "true" ? $('#edit_sell_factor').prop('checked',
                            true) : $('#edit_sell_factor').prop('checked', false);
                        response.role.buy_factor === "true" ? $('#edit_buy_factor').prop('checked',
                            true) : $('#edit_buy_factor').prop('checked', false);
                        response.role.return_sell_factor === "true" ? $('#edit_return_sell_factor')
                            .prop('checked', true) : $('#edit_return_sell_factor').prop('checked',
                                false);
                        response.role.return_buy_factor === "true" ? $('#edit_return_buy_factor').prop(
                            'checked', true) : $('#edit_return_buy_factor').prop('checked', false);
                        response.role.sell_factor_advanced === "true" ? $('#edit_sell_factor_advanced')
                            .prop('checked', true) : $('#edit_sell_factor_advanced').prop('checked',
                                false);
                        response.role.wastage_factor === "true" ? $('#edit_wastage_factor').prop(
                            'checked', true) : $('#edit_wastage_factor').prop('checked', false);
                        response.role.benefit_loss_bill === "true" ? $('#edit_benefit_loss_bill').prop(
                            'checked', true) : $('#edit_benefit_loss_bill').prop('checked', false);
                        response.role.ttms === "true" ? $('#edit_ttms').prop('checked',
                            true) : $('#edit_ttms').prop('checked', false);
                        response.role.factors_types_report === "true" ? $('#edit_factors_types_report')
                            .prop('checked', true) : $('#edit_factors_types_report').prop('checked',
                                false);
                        response.role.period_report === "true" ? $('#edit_period_report').prop(
                            'checked', true) : $('#edit_period_report').prop('checked', false);
                        response.role.sell_report === "true" ? $('#edit_sell_report').prop('checked',
                            true) : $('#edit_sell_report').prop('checked', false);
                        response.role.sell_statistics_report === "true" ? $(
                            '#edit_sell_statistics_report').prop('checked',
                            true) : $('#edit_sell_statistics_report').prop('checked', false);
                        response.role.customer_report === "true" ? $('#edit_customer_report').prop(
                            'checked', true) : $('#edit_customer_report').prop('checked', false);
                        response.role.buy_report === "true" ? $('#edit_buy_report').prop('checked',
                            true) : $('#edit_buy_report').prop('checked', false);
                        response.role.buy_statistics_report === "true" ? $(
                            '#edit_buy_statistics_report').prop('checked',
                            true) : $('#edit_buy_statistics_report').prop('checked', false);
                        response.role.taraf_hesab_buy_report === "true" ? $(
                            '#edit_taraf_hesab_buy_report').prop('checked',
                            true) : $('#edit_taraf_hesab_buy_report').prop('checked', false);
                        response.role.products_benefit === "true" ? $('#edit_products_benefit').prop(
                            'checked', true) : $('#edit_products_benefit').prop('checked', false);
                        response.role.factors_benefit === "true" ? $('#edit_factors_benefit').prop(
                            'checked',
                            true) : $('#edit_factors_benefit').prop('checked', false);
                        response.role.taraf_hesab_benefit === "true" ? $('#edit_taraf_hesab_benefit')
                            .prop('checked', true) : $('#edit_taraf_hesab_benefit').prop('checked',
                                false);
                        response.role.warehouse_moves === "true" ? $('#edit_warehouse_moves').prop(
                            'checked', true) : $('#edit_warehouse_moves').prop('checked', false);
                        response.role.riali_report === "true" ? $('#edit_riali_report').prop('checked',
                            true) : $('#edit_riali_report').prop('checked', false);
                        response.role.products_barcode === "true" ? $('#edit_products_barcode').prop(
                            'checked', true) : $('#edit_products_barcode').prop('checked', false);
                        response.role.cardex === "true" ? $('#edit_cardex').prop('checked',
                            true) : $('#edit_cardex').prop('checked', false);
                        response.role.inventory_warehouse === "true" ? $('#edit_inventory_warehouse')
                            .prop('checked', true) : $('#edit_inventory_warehouse').prop('checked',
                                false);
                        response.role.inventory_products === "true" ? $('#edit_inventory_products')
                            .prop('checked', true) : $('#edit_inventory_products').prop('checked',
                                false);
                        response.role.ordering_products === "true" ? $('#edit_ordering_products').prop(
                            'checked', true) : $('#edit_ordering_products').prop('checked', false);
                        response.role.accounting_documents === "true" ? $('#edit_accounting_documents')
                            .prop('checked', true) : $('#edit_accounting_documents').prop('checked',
                                false);
                        response.role.receive_from_the_account === "true" ? $(
                            '#edit_receive_from_the_account').prop('checked',
                            true) : $('#edit_receive_from_the_account').prop('checked', false);
                        response.role.payment_to_account === "true" ? $('#edit_payment_to_account')
                            .prop('checked', true) : $('#edit_payment_to_account').prop('checked',
                                false);
                        response.role.pay === "true" ? $('#edit_pay').prop('checked',
                            true) : $('#edit_pay').prop('checked', false);
                        response.role.fund_to_bank === "true" ? $('#edit_fund_to_bank').prop('checked',
                            true) : $('#edit_fund_to_bank').prop('checked', false);
                        response.role.bank_to_fund === "true" ? $('#edit_bank_to_fund').prop('checked',
                            true) : $('#edit_bank_to_fund').prop('checked', false);
                        response.role.bank_to_bank === "true" ? $('#edit_bank_to_bank').prop('checked',
                            true) : $('#edit_bank_to_bank').prop('checked', false);
                        response.role.receive_miscellaneous_income === "true" ? $(
                            '#edit_receive_miscellaneous_income').prop('checked',
                            true) : $('#edit_receive_miscellaneous_income').prop('checked', false);
                        response.role.withdrawal_partner === "true" ? $('#edit_withdrawal_partner')
                            .prop('checked', true) : $('#edit_withdrawal_partner').prop('checked',
                                false);
                        response.role.investment === "true" ? $('#edit_investment').prop('checked',
                            true) : $('#edit_investment').prop('checked', false);
                        response.role.transfer_person === "true" ? $('#edit_transfer_person').prop(
                            'checked', true) : $('#edit_transfer_person').prop('checked', false);
                        response.role.fund_period === "true" ? $('#edit_fund_period').prop('checked',
                            true) : $('#edit_fund_period').prop('checked', false);
                        response.role.bank_accounts_period === "true" ? $('#edit_bank_accounts_period')
                            .prop('checked', true) : $('#edit_bank_accounts_period').prop('checked',
                                false);
                        response.role.taraf_hesab_period === "true" ? $('#edit_taraf_hesab_period')
                            .prop('checked', true) : $('#edit_taraf_hesab_period').prop('checked',
                                false);
                        response.role.receive_cheques === "true" ? $('#edit_receive_cheques').prop(
                            'checked', true) : $('#edit_receive_cheques').prop('checked', false);
                        response.role.pay_cheques === "true" ? $('#edit_pay_cheques').prop('checked',
                            true) : $('#edit_pay_cheques').prop('checked', false);
                        response.role.inventory_products_period === "true" ? $(
                            '#edit_inventory_products_period').prop('checked',
                            true) : $('#edit_inventory_products_period').prop('checked', false);
                        response.role.cheque_book === "true" ? $('#edit_cheque_book').prop('checked',
                            true) : $('#edit_cheque_book').prop('checked', false);
                        response.role.cheque_book_report === "true" ? $('#edit_cheque_book_report')
                            .prop(
                                'checked', true) : $('#edit_cheque_book_report').prop('checked', false);
                        response.role.receive_cheques_report === "true" ? $(
                            '#edit_receive_cheques_report').prop('checked',
                            true) : $('#edit_receive_cheques_report').prop('checked', false);
                        response.role.pay_cheques_report === "true" ? $('#edit_pay_cheques_report')
                            .prop('checked', true) : $('#edit_pay_cheques_report').prop('checked',
                                false);
                        response.role.circulation_receive_cheque === "true" ? $(
                            '#edit_circulation_receive_cheque').prop('checked',
                            true) : $('#edit_circulation_receive_cheque').prop('checked', false);
                        response.role.circulation_pay_cheque_report === "true" ? $(
                            '#edit_circulation_pay_cheque_report').prop('checked',
                            true) : $('#edit_circulation_pay_cheque_report').prop('checked', false);
                        response.role.deposit === "true" ? $('#edit_deposit').prop('checked',
                            true) : $('#edit_deposit').prop('checked', false);
                        response.role.notification === "true" ? $('#edit_notification').prop('checked',
                            true) : $('#edit_notification').prop('checked', false);
                        response.role.manual === "true" ? $('#edit_manual').prop('checked',
                            true) : $('#edit_manual').prop('checked', false);
                        response.role.returning_cheque === "true" ? $('#edit_returning_cheque').prop(
                            'checked', true) : $('#edit_returning_cheque').prop('checked', false);
                        response.role.announcement === "true" ? $('#edit_announcement').prop('checked',
                            true) : $('#edit_announcement').prop('checked', false);
                        response.role.spent_cheque === "true" ? $('#edit_spent_cheque').prop('checked',
                            true) : $('#edit_spent_cheque').prop('checked', false);
                        response.role.cheque_return === "true" ? $('#edit_cheque_return').prop(
                            'checked', true) : $('#edit_cheque_return').prop('checked', false);
                        response.role.receipt_cheque === "true" ? $('#edit_receipt_cheque').prop(
                            'checked', true) : $('#edit_receipt_cheque').prop('checked', false);
                        response.role.pay_returning_cheque === "true" ? $('#edit_pay_returning_cheque')
                            .prop('checked',
                                true) : $('#edit_pay_returning_cheque').prop('checked', false);
                        response.role.cashing_cheque === "true" ? $('#edit_cashing_cheque').prop(
                            'checked', true) : $('#edit_cashing_cheque').prop('checked', false);
                        response.role.cancel_cheque === "true" ? $('#edit_cancel_cheque').prop(
                            'checked', true) : $('#edit_cancel_cheque').prop('checked', false);
                        response.role.users === "true" ? $('#edit_users').prop('checked',
                            true) : $('#edit_users').prop('checked', false);
                        response.role.profile === "true" ? $('#edit_profile').prop('checked',
                            true) : $('#edit_profile').prop('checked', false);
                        response.role.roles === "true" ? $('#edit_roles').prop('checked',
                            true) : $('#edit_roles').prop('checked', false);
                        response.role.phone_book === "true" ? $('#edit_phone_book').prop('checked',
                            true) : $('#edit_phone_book').prop('checked', false);
                    }
                },
            });
        });

        $(document).on("click", ".updateRole", function(e) {
            e.preventDefault();
            var role_id = $("#edit_role_id").val();

            var data = {
                'role_name': $('#edit_role_name').val(),

                'checked_all': document.getElementById("edit_checked_all").checked,

                'taarife_payeh': document.getElementById("edit_taarife_payeh").checked,
                'buy_sell': document.getElementById("edit_buy_sell").checked,
                'buy_sell_reports': document.getElementById("edit_buy_sell_reports").checked,
                'benefit_report': document.getElementById("edit_benefit_report").checked,
                'warehouse_menu': document.getElementById("edit_warehouse_menu").checked,
                'product_warehouse_reports': document.getElementById(
                    "edit_product_warehouse_reports").checked,
                'financial_management': document.getElementById("edit_financial_management").checked,
                'receive_payment': document.getElementById("edit_receive_payment").checked,
                'first_period': document.getElementById("edit_first_period").checked,
                'cheque_management': document.getElementById("edit_cheque_management").checked,
                'receive_cheques_operations': document.getElementById(
                    "edit_receive_cheques_operations").checked,
                'payment_cheques_operations': document.getElementById(
                    "edit_payment_cheques_operations").checked,
                'security': document.getElementById("edit_security").checked,
                'facilities': document.getElementById("edit_facilities").checked,

                'taraf_hesab': document.getElementById("edit_taraf_hesab").checked,
                'taraf_hesab_group': document.getElementById("edit_taraf_hesab_group").checked,
                'staff': document.getElementById("edit_staff").checked,
                'warehouse': document.getElementById("edit_warehouse").checked,
                'product_no_unit': document.getElementById("edit_product_no_unit").checked,
                'product_farei_asli': document.getElementById("edit_product_farei_asli").checked,
                'products': document.getElementById("edit_products").checked,
                'services': document.getElementById("edit_services").checked,
                'arzesh_afzoude_groups': document.getElementById("edit_arzesh_afzoude_groups")
                    .checked,
                'banks_types': document.getElementById("edit_banks_types").checked,
                'bank_accounts': document.getElementById("edit_bank_accounts").checked,
                'cities': document.getElementById("edit_cities").checked,
                'fund': document.getElementById("edit_fund").checked,
                'account_group': document.getElementById("edit_account_group").checked,
                'account_headings': document.getElementById("edit_account_headings").checked,
                'sell_factor': document.getElementById("edit_sell_factor").checked,
                'buy_factor': document.getElementById("edit_buy_factor").checked,
                'return_sell_factor': document.getElementById("edit_return_sell_factor").checked,
                'return_buy_factor': document.getElementById("edit_return_buy_factor").checked,
                'sell_factor_advanced': document.getElementById("edit_sell_factor_advanced").checked,
                'wastage_factor': document.getElementById("edit_wastage_factor").checked,
                'benefit_loss_bill': document.getElementById("edit_benefit_loss_bill").checked,
                'ttms': document.getElementById("edit_ttms").checked,
                'factors_types_report': document.getElementById("edit_factors_types_report").checked,
                'period_report': document.getElementById("edit_period_report").checked,
                'sell_report': document.getElementById("edit_sell_report").checked,
                'sell_statistics_report': document.getElementById("edit_sell_statistics_report")
                    .checked,
                'customer_report': document.getElementById("edit_customer_report").checked,
                'buy_report': document.getElementById("edit_buy_report").checked,
                'buy_statistics_report': document.getElementById("edit_buy_statistics_report")
                    .checked,
                'taraf_hesab_buy_report': document.getElementById("edit_taraf_hesab_buy_report")
                    .checked,
                'products_benefit': document.getElementById("edit_products_benefit").checked,
                'factors_benefit': document.getElementById("edit_factors_benefit").checked,
                'taraf_hesab_benefit': document.getElementById("edit_taraf_hesab_benefit").checked,
                'warehouse_moves': document.getElementById("edit_warehouse_moves").checked,
                'riali_report': document.getElementById("edit_riali_report").checked,
                'products_barcode': document.getElementById("edit_products_barcode").checked,
                'cardex': document.getElementById("edit_cardex").checked,
                'inventory_warehouse': document.getElementById("edit_inventory_warehouse").checked,
                'inventory_products': document.getElementById("edit_inventory_products").checked,
                'ordering_products': document.getElementById("edit_ordering_products").checked,
                'accounting_documents': document.getElementById("edit_accounting_documents").checked,
                'receive_from_the_account': document.getElementById("edit_receive_from_the_account")
                    .checked,
                'payment_to_account': document.getElementById("edit_payment_to_account").checked,
                'pay': document.getElementById("edit_pay").checked,
                'fund_to_bank': document.getElementById("edit_fund_to_bank").checked,
                'bank_to_fund': document.getElementById("edit_bank_to_fund").checked,
                'bank_to_bank': document.getElementById("edit_bank_to_bank").checked,
                'receive_miscellaneous_income': document.getElementById(
                    "edit_receive_miscellaneous_income").checked,
                'withdrawal_partner': document.getElementById("edit_withdrawal_partner").checked,
                'investment': document.getElementById("edit_investment").checked,
                'transfer_person': document.getElementById("edit_transfer_person").checked,
                'fund_period': document.getElementById("edit_fund_period").checked,
                'bank_accounts_period': document.getElementById("edit_bank_accounts_period").checked,
                'taraf_hesab_period': document.getElementById("edit_taraf_hesab_period").checked,
                'receive_cheques': document.getElementById("edit_receive_cheques").checked,
                'pay_cheques': document.getElementById("edit_pay_cheques").checked,
                'inventory_products_period': document.getElementById(
                    "edit_inventory_products_period").checked,
                'cheque_book': document.getElementById("edit_cheque_book").checked,
                'cheque_book_report': document.getElementById("edit_cheque_book_report").checked,
                'receive_cheques_report': document.getElementById("edit_receive_cheques_report")
                    .checked,
                'pay_cheques_report': document.getElementById("edit_pay_cheques_report").checked,
                'circulation_receive_cheque': document.getElementById(
                    "edit_circulation_receive_cheque").checked,
                'circulation_pay_cheque_report': document.getElementById(
                    "edit_circulation_pay_cheque_report").checked,
                'deposit': document.getElementById("edit_deposit").checked,
                'notification': document.getElementById("edit_notification").checked,
                'manual': document.getElementById("edit_manual").checked,
                'returning_cheque': document.getElementById("edit_returning_cheque").checked,
                'announcement': document.getElementById("edit_announcement").checked,
                'spent_cheque': document.getElementById("edit_spent_cheque").checked,
                'cheque_return': document.getElementById("edit_cheque_return").checked,
                'receipt_cheque': document.getElementById("edit_receipt_cheque").checked,
                'pay_returning_cheque': document.getElementById("edit_pay_returning_cheque").checked,
                'cashing_cheque': document.getElementById("edit_cashing_cheque").checked,
                'cancel_cheque': document.getElementById("edit_cancel_cheque").checked,
                'users': document.getElementById("edit_users").checked,
                'profile': document.getElementById("edit_profile").checked,
                'roles': document.getElementById("edit_roles").checked,
                'phone_book': document.getElementById("edit_phone_book").checked,
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "PUT",
                url: "/roles/" + role_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    fetchDataAsPaginate
                        (
                            'index_search',
                            '/roles',
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
                            $("#editInfo").modal("hide");
                            $("#editInfo").find("input").val("");
                            edit_clearErrors();
                            // edit_defaultSelectedValue();
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

        // call function on modal shown
        $('#editInfo').on('shown.bs.modal', function(e) {
            // alert("hello");
            $(".sidebar-mini").removeClass("sidebar-open");
            $(".sidebar-mini").addClass("sidebar-collapse");
        });

        // call function on hiding modal
        $('#editInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            edit_clearErrors();
            edit_defaultSelectedValue();
            // $("#editInfo").find("input").val(""); // Clear Input Values
        })

        function edit_clearErrors() {
            $("#edit_role_name_error").text("");
            $("#edit_role_name").removeClass("is-invalid");
        }

        function edit_defaultSelectedValue() {
            $('#edit_checked_all').prop('checked', false);

            $('#edit_taarife_payeh').prop('checked', false);
            $('#edit_buy_sell').prop('checked', false);
            $('#edit_buy_sell_reports').prop('checked', false);
            $('#edit_benefit_report').prop('checked', false);
            $('#edit_warehouse_menu').prop('checked', false);
            $('#edit_product_warehouse_reports').prop('checked', false);
            $('#edit_financial_management').prop('checked', false);
            $('#edit_receive_payment').prop('checked', false);
            $('#edit_first_period').prop('checked', false);
            $('#edit_cheque_management').prop('checked', false);
            $('#edit_receive_cheques_operations').prop('checked', false);
            $('#edit_payment_cheques_operations').prop('checked', false);
            $('#edit_security').prop('checked', false);
            $('#edit_facilities').prop('checked', false);

            $('#edit_taraf_hesab').prop('checked', false);
            $('#edit_taraf_hesab_group').prop('checked', false);
            $('#edit_staff').prop('checked', false);
            $('#edit_warehouse').prop('checked', false);
            $('#edit_product_no_unit').prop('checked', false);
            $('#edit_product_farei_asli').prop('checked', false);
            $('#edit_products').prop('checked', false);
            $('#edit_services').prop('checked', false);
            $('#edit_arzesh_afzoude_groups').prop('checked', false);
            $('#edit_banks_types').prop('checked', false);
            $('#edit_bank_accounts').prop('checked', false);
            $('#edit_cities').prop('checked', false);
            $('#edit_fund').prop('checked', false);
            $('#edit_account_group').prop('checked', false);
            $('#edit_account_headings').prop('checked', false);
            $('#edit_sell_factor').prop('checked', false);
            $('#edit_buy_factor').prop('checked', false);
            $('#edit_return_sell_factor').prop('checked', false);
            $('#edit_return_buy_factor').prop('checked', false);
            $('#edit_sell_factor_advanced').prop('checked', false);
            $('#edit_wastage_factor').prop('checked', false);
            $('#edit_benefit_loss_bill').prop('checked', false);
            $('#edit_ttms').prop('checked', false);
            $('#edit_factors_types_report').prop('checked', false);
            $('#edit_period_report').prop('checked', false);
            $('#edit_sell_report').prop('checked', false);
            $('#edit_sell_statistics_report').prop('checked', false);
            $('#edit_customer_report').prop('checked', false);
            $('#edit_buy_report').prop('checked', false);
            $('#edit_buy_statistics_report').prop('checked', false);
            $('#edit_taraf_hesab_buy_report').prop('checked', false);
            $('#edit_products_benefit').prop('checked', false);
            $('#edit_factors_benefit').prop('checked', false);
            $('#edit_taraf_hesab_benefit').prop('checked', false);
            $('#edit_warehouse_moves').prop('checked', false);
            $('#edit_riali_report').prop('checked', false);
            $('#edit_products_barcode').prop('checked', false);
            $('#edit_cardex').prop('checked', false);
            $('#edit_inventory_warehouse').prop('checked', false);
            $('#edit_inventory_products').prop('checked', false);
            $('#edit_ordering_products').prop('checked', false);
            $('#edit_accounting_documents').prop('checked', false);
            $('#edit_receive_from_the_account').prop('checked', false);
            $('#edit_payment_to_account').prop('checked', false);
            $('#edit_pay').prop('checked', false);
            $('#edit_fund_to_bank').prop('checked', false);
            $('#edit_bank_to_fund').prop('checked', false);
            $('#edit_bank_to_bank').prop('checked', false);
            $('#edit_receive_miscellaneous_income').prop('checked', false);
            $('#edit_withdrawal_partner').prop('checked', false);
            $('#edit_investment').prop('checked', false);
            $('#edit_transfer_person').prop('checked', false);
            $('#edit_fund_period').prop('checked', false);
            $('#edit_bank_accounts_period').prop('checked', false);
            $('#edit_taraf_hesab_period').prop('checked', false);
            $('#edit_receive_cheques').prop('checked', false);
            $('#edit_pay_cheques').prop('checked', false);
            $('#edit_inventory_products_period').prop('checked', false);
            $('#edit_cheque_book').prop('checked', false);
            $('#edit_cheque_book_report').prop('checked', false);
            $('#edit_receive_cheques_report').prop('checked', false);
            $('#edit_pay_cheques_report').prop('checked', false);
            $('#edit_circulation_receive_cheque').prop('checked', false);
            $('#edit_circulation_pay_cheque_report').prop('checked', false);
            $('#edit_deposit').prop('checked', false);
            $('#edit_notification').prop('checked', false);
            $('#edit_manual').prop('checked', false);
            $('#edit_returning_cheque').prop('checked', false);
            $('#edit_announcement').prop('checked', false);
            $('#edit_spent_cheque').prop('checked', false);
            $('#edit_cheque_return').prop('checked', false);
            $('#edit_receipt_cheque').prop('checked', false);
            $('#edit_pay_returning_cheque').prop('checked', false);
            $('#edit_cashing_cheque').prop('checked', false);
            $('#edit_cancel_cheque').prop('checked', false);
            $('#edit_users').prop('checked', false);
            $('#edit_profile').prop('checked', false);
            $('#edit_roles').prop('checked', false);
            $('#edit_phone_book').prop('checked', false);
        }
    </script>
@endpush
