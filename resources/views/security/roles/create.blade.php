<!-- Modal -->
<div class="modal fade" id="createInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="createInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInfoLabel">نقش و سطح دسترسی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-height: 538px">
                <div class="row" style="margin:1rem;">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="add_role_name">نقش</label>
                            <input type="text" id="add_role_name" name="add_role_name" class="form-control"
                                autocomplete="off" />
                            <div id="add_role_name_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0 3rem 0 0; font-weight: 700;">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="form-check-label" for="add_checked_all">
                            <input class="form-check-input add_check_all" type="checkbox" name="add_checked_all"
                                id="add_checked_all">
                            انتخاب همه
                        </label>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_taarife_payeh">
                                <input class="form-check-input add_check_all" type="checkbox" name="add_taarife_payeh"
                                    id="add_taarife_payeh">
                                <h6 style="font-weight: 700; color: green;">تعاریف پایه</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_taraf_hesab">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_taraf_hesab" id="add_taraf_hesab">
                                معرفی طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_taraf_hesab_group">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_taraf_hesab_group" id="add_taraf_hesab_group">
                                گروه بندی طرف های حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_staff">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_staff" id="add_staff">
                                معرفی پرسنل
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_warehouse">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_warehouse" id="add_warehouse">
                                معرفی انبارها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_product_no_unit">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_product_no_unit" id="add_product_no_unit">
                                معرفی واحد شمارش کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_product_farei_asli">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_product_farei_asli" id="add_product_farei_asli">
                                معرفی گروه اصلی و فرعی کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_products">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_products" id="add_products">
                                معرفی کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_services">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_services" id="add_services">
                                معرفی خدمات
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_arzesh_afzoude_groups">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_arzesh_afzoude_groups" id="add_arzesh_afzoude_groups">
                                معرفی گروه های ارزش افزوده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_banks_types">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_banks_types" id="add_banks_types">
                                معرفی انواع بانک های کشور
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_bank_accounts">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_bank_accounts" id="add_bank_accounts">
                                معرفی حساب های بانکی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cities">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_cities" id="add_cities">
                                معرفی شهرهای کشور
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_fund">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_fund" id="add_fund">
                                معرفی درآمد / هزینه / صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_account_group">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_account_group" id="add_account_group">
                                معرفی گروه حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_account_headings">
                                <input class="form-check-input add_check_all add_taarife_payeh_check_all"
                                    type="checkbox" name="add_account_headings" id="add_account_headings">
                                معرفی سرفصل های حساب (کل، معین، تفصیل)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_buy_sell">
                                <input class="form-check-input add_check_all" type="checkbox" name="add_buy_sell"
                                    id="add_buy_sell">
                                <h6 style="font-weight: 700; color: green;">خرید و فروش</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_sell_factor">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_sell_factor" id="add_sell_factor">
                                فاکتور فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_buy_factor">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_buy_factor" id="add_buy_factor">
                                فاکتور خرید
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_return_sell_factor">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_return_sell_factor" id="add_return_sell_factor">
                                فاکتور برگشت از فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_return_buy_factor">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_return_buy_factor" id="add_return_buy_factor">
                                فاکتور برگشت از خرید
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_sell_factor_advanced">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_sell_factor_advanced" id="add_sell_factor_advanced">
                                پیش فاکتور فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_wastage_factor">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_wastage_factor" id="add_wastage_factor">
                                فاکتور ضایعات
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_benefit_loss_bill">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_benefit_loss_bill" id="add_benefit_loss_bill">
                                صورت حساب سود و زیان
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_ttms">
                                <input class="form-check-input add_check_all add_buy_sell_check_all" type="checkbox"
                                    name="add_ttms" id="add_ttms">
                                گزارشات فصلی دارایی (TTMS)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_buy_sell_reports">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_buy_sell_reports" id="add_buy_sell_reports">
                                <h6 style="font-weight: 700; color: green;">گزارشات خرید و فروش</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_factors_types_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_factors_types_report" id="add_factors_types_report">
                                گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_period_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_period_report" id="add_period_report">
                                گزارش دوره ای خرید و فروش
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_sell_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_sell_report" id="add_sell_report">
                                گزارش فروش به تفکیک ماه، فصل، سال
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_sell_statistics_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_sell_statistics_report"
                                    id="add_sell_statistics_report">
                                گزارش آماری فروش بر اساس کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_customer_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_customer_report" id="add_customer_report">
                                گزارش آماری فروش بر اساس مشتری
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_buy_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_buy_report" id="add_buy_report">
                                گزارش خرید به تفکیک ماه، فصل، سال
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_buy_statistics_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_buy_statistics_report" id="add_buy_statistics_report">
                                گزارش آماری خرید بر اساس کالا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_taraf_hesab_buy_report">
                                <input class="form-check-input add_check_all add_buy_sell_reports_check_all"
                                    type="checkbox" name="add_taraf_hesab_buy_report"
                                    id="add_taraf_hesab_buy_report">
                                گزارش آماری خرید بر اساس طرف حساب
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_benefit_report">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_benefit_report" id="add_benefit_report">
                                <h6 style="font-weight: 700; color: green;">گزارش سود ناخالص فروش کالا</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_products_benefit">
                                <input class="form-check-input add_check_all add_benefit_report_check_all"
                                    type="checkbox" name="add_products_benefit" id="add_products_benefit">
                                سود به تفکیک کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_factors_benefit">
                                <input class="form-check-input add_check_all add_benefit_report_check_all"
                                    type="checkbox" name="add_factors_benefit" id="add_factors_benefit">
                                سود به تفکیک فاکتورها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_taraf_hesab_benefit">
                                <input class="form-check-input add_check_all add_benefit_report_check_all"
                                    type="checkbox" name="add_taraf_hesab_benefit" id="add_taraf_hesab_benefit">
                                سود به تفکیک طرف های حساب
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_warehouse_menu">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_warehouse_menu" id="add_warehouse_menu">
                                <h6 style="font-weight: 700; color: green;">انبار</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_warehouse_moves">
                                <input class="form-check-input add_check_all add_warehouse_menu_check_all"
                                    type="checkbox" name="add_warehouse_moves" id="add_warehouse_moves">
                                انتقال بین انبارها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_product_warehouse_reports">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_product_warehouse_reports" id="add_product_warehouse_reports">
                                <h6 style="font-weight: 700; color: green;">گزارشات کالا و انبار</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_riali_report">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_riali_report" id="add_riali_report">
                                گزارش موجودی ریالی به تفکیک انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_products_barcode">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_products_barcode" id="add_products_barcode">
                                چاپ بارکد کالاها
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cardex">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_cardex" id="add_cardex">
                                گردش کالا در انبار (کاردکس)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_inventory_warehouse">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_inventory_warehouse" id="add_inventory_warehouse">
                                موجودی کالاهای انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_inventory_products">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_inventory_products" id="add_inventory_products">
                                موجودی کالاها به تفکیک انبار
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_ordering_products">
                                <input class="form-check-input add_check_all add_product_warehouse_reports_check_all"
                                    type="checkbox" name="add_ordering_products" id="add_ordering_products">
                                نقطه سفارش کالاها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_financial_management">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_financial_management" id="add_financial_management">
                                <h6 style="font-weight: 700; color: green;">مدیریت مالی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_accounting_documents">
                                <input class="form-check-input add_check_all add_financial_management_check_all"
                                    type="checkbox" name="add_accounting_documents" id="add_accounting_documents">
                                اسناد حسابداری
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_receive_payment">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_receive_payment" id="add_receive_payment">
                                <h6 style="font-weight: 700; color: green;">دریافت / پرداخت</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_receive_from_the_account">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_receive_from_the_account"
                                    id="add_receive_from_the_account">
                                دریافت از طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_payment_to_account">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_payment_to_account" id="add_payment_to_account">
                                پرداخت به طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_pay">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_pay" id="add_pay">
                                پرداخت هزینه
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_fund_to_bank">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_fund_to_bank" id="add_fund_to_bank">
                                از صندوق به بانک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_bank_to_fund">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_bank_to_fund" id="add_bank_to_fund">
                                از بانک به صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_bank_to_bank">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_bank_to_bank" id="add_bank_to_bank">
                                بانک به بانک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_receive_miscellaneous_income">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_receive_miscellaneous_income"
                                    id="add_receive_miscellaneous_income">
                                دریافت درآمد متفرقه
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_withdrawal_partner">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_withdrawal_partner" id="add_withdrawal_partner">
                                برداشت شرکا
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_investment">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_investment" id="add_investment">
                                پرداخت شرکا (سرمایه گذاری)
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_transfer_person">
                                <input class="form-check-input add_check_all add_receive_payment_check_all"
                                    type="checkbox" name="add_transfer_person" id="add_transfer_person">
                                انتقال بین اشخاص
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_first_period">
                                <input class="form-check-input add_check_all" type="checkbox" name="add_first_period"
                                    id="add_first_period">
                                <h6 style="font-weight: 700; color: green;">اول دوره</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_fund_period">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_fund_period" id="add_fund_period">
                                اول دوره صندوق
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_bank_accounts_period">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_bank_accounts_period" id="add_bank_accounts_period">
                                اول دوره حساب های بانکی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_taraf_hesab_period">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_taraf_hesab_period" id="add_taraf_hesab_period">
                                اول دوره طرف حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_receive_cheques">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_receive_cheques" id="add_receive_cheques">
                                چک های دریافتی اول دوره
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_pay_cheques">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_pay_cheques" id="add_pay_cheques">
                                چک های پرداختی اول دوره
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_inventory_products_period">
                                <input class="form-check-input add_check_all add_first_period_check_all"
                                    type="checkbox" name="add_inventory_products_period"
                                    id="add_inventory_products_period">
                                موجودی اول دوره کالاها
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_cheque_management">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_cheque_management" id="add_cheque_management">
                                <h6 style="font-weight: 700; color: green;">مدیریت چک</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cheque_book">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_cheque_book" id="add_cheque_book">
                                معرفی دسته چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cheque_book_report">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_cheque_book_report" id="add_cheque_book_report">
                                گزارش دسته چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_receive_cheques_report">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_receive_cheques_report"
                                    id="add_receive_cheques_report">
                                گزارش چک های دریافتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_pay_cheques_report">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_pay_cheques_report" id="add_pay_cheques_report">
                                گزارش چک های پرداختی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_circulation_receive_cheque">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_circulation_receive_cheque"
                                    id="add_circulation_receive_cheque">
                                سابقه گردش چک دریافتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_circulation_pay_cheque_report">
                                <input class="form-check-input add_check_all add_cheque_management_check_all"
                                    type="checkbox" name="add_circulation_pay_cheque_report"
                                    id="add_circulation_pay_cheque_report">
                                سابقه گردش چک پرداختی
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_receive_cheques_operations">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_receive_cheques_operations" id="add_receive_cheques_operations">
                                <h6 style="font-weight: 700; color: green;">عملیات چک های دریافتی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_deposit">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_deposit" id="add_deposit">
                                خواباندن چک به حساب
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_notification">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_notification" id="add_notification">
                                اعلام وصول چک های خوابانده شده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_manual">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_manual" id="add_manual">
                                اعلام وصول دستی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_returning_cheque">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_returning_cheque" id="add_returning_cheque">
                                برگشت چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_announcement">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_announcement" id="add_announcement">
                                اعلام وصول چک های برگشتی
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_spent_cheque">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_spent_cheque" id="add_spent_cheque">
                                پس گرفتن چک خرج شده
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cheque_return">
                                <input class="form-check-input add_check_all add_receive_cheques_operations_check_all"
                                    type="checkbox" name="add_cheque_return" id="add_cheque_return">
                                عودت چک
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_payment_cheques_operations">
                                <input class="form-check-input add_check_all" type="checkbox"
                                    name="add_payment_cheques_operations" id="add_payment_cheques_operations">
                                <h6 style="font-weight: 700; color: green;">عملیات چک های پرداختی</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_receipt_cheque">
                                <input class="form-check-input add_check_all add_payment_cheques_operations_check_all"
                                    type="checkbox" name="add_receipt_cheque" id="add_receipt_cheque">
                                اعلام وصول چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_pay_returning_cheque">
                                <input class="form-check-input add_check_all add_payment_cheques_operations_check_all"
                                    type="checkbox" name="add_pay_returning_cheque" id="add_pay_returning_cheque">
                                برگشت چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cashing_cheque">
                                <input class="form-check-input add_check_all add_payment_cheques_operations_check_all"
                                    type="checkbox" name="add_cashing_cheque" id="add_cashing_cheque">
                                پس گرفتن چک
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_cancel_cheque">
                                <input class="form-check-input add_check_all add_payment_cheques_operations_check_all"
                                    type="checkbox" name="add_cancel_cheque" id="add_cancel_cheque">
                                ابطال چک
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_security">
                                <input class="form-check-input add_check_all" type="checkbox" name="add_security"
                                    id="add_security">
                                <h6 style="font-weight: 700; color: green;">امنیت</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_users">
                                <input class="form-check-input add_check_all add_security_check_all" type="checkbox"
                                    name="add_users" id="add_users">
                                فهرست کاربران
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_profile">
                                <input class="form-check-input add_check_all add_security_check_all" type="checkbox"
                                    name="add_profile" id="add_profile">
                                پروفایل من
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_roles">
                                <input class="form-check-input add_check_all add_security_check_all" type="checkbox"
                                    name="add_roles" id="add_roles">
                                نقش ها و مجوز دسترسی
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4" style="border-radius:10px; padding:1rem; margin:1rem;">
                    <div class="row" style="padding: 0 2rem 0 0; font-weight: 700;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label class="form-check-label" for="add_facilities">
                                <input class="form-check-input add_check_all" type="checkbox" name="add_facilities"
                                    id="add_facilities">
                                <h6 style="font-weight: 700; color: green;">امکانات</h6>
                            </label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12" style="padding: 0 2rem 0 0;">
                        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right">
                            <label class="form-check-label" for="add_phone_book">
                                <input class="form-check-input add_check_all add_facilities_check_all" type="checkbox"
                                    name="add_phone_book" id="add_phone_book">
                                دفترچه تلفن
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary addRole">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $('#add_checked_all').change(function() {
            $('.add_check_all').prop('checked', this.checked);
        });

        $('.add_check_all').change(function() {
            if ($('.add_check_all:checked').length == $('.add_check_all').length) {
                $('#add_checked_all').prop('checked', true);
            } else {
                $('#add_checked_all').prop('checked', false);
            }
        });

        $('#add_taarife_payeh').change(function() {
            $('.add_taarife_payeh_check_all').prop('checked', this.checked);
        });

        $('.add_taarife_payeh_check_all').change(function() {
            if ($('.add_taarife_payeh_check_all:checked').length == $('.add_taarife_payeh_check_all').length) {
                $('#add_taarife_payeh').prop('checked', true);
            } else {
                $('#add_taarife_payeh').prop('checked', false);
            }
        });

        $('#add_buy_sell').change(function() {
            $('.add_buy_sell_check_all').prop('checked', this.checked);
        });

        $('.add_buy_sell_check_all').change(function() {
            if ($('.add_buy_sell_check_all:checked').length == $('.add_buy_sell_check_all').length) {
                $('#add_buy_sell').prop('checked', true);
            } else {
                $('#add_buy_sell').prop('checked', false);
            }
        });

        $('#add_buy_sell_reports').change(function() {
            $('.add_buy_sell_reports_check_all').prop('checked', this.checked);
        });

        $('.add_buy_sell_reports_check_all').change(function() {
            if ($('.add_buy_sell_reports_check_all:checked').length == $('.add_buy_sell_reports_check_all')
                .length) {
                $('#add_buy_sell_reports').prop('checked', true);
            } else {
                $('#add_buy_sell_reports').prop('checked', false);
            }
        });

        $('#add_benefit_report').change(function() {
            $('.add_benefit_report_check_all').prop('checked', this.checked);
        });

        $('.add_benefit_report_check_all').change(function() {
            if ($('.add_benefit_report_check_all:checked').length == $('.add_benefit_report_check_all')
                .length) {
                $('#add_benefit_report').prop('checked', true);
            } else {
                $('#add_benefit_report').prop('checked', false);
            }
        });

        $('#add_warehouse_menu').change(function() {
            $('.add_warehouse_menu_check_all').prop('checked', this.checked);
        });

        $('.add_warehouse_menu_check_all').change(function() {
            if ($('.add_warehouse_menu_check_all:checked').length == $('.add_warehouse_menu_check_all')
                .length) {
                $('#add_warehouse_menu').prop('checked', true);
            } else {
                $('#add_warehouse_menu').prop('checked', false);
            }
        });

        $('#add_product_warehouse_reports').change(function() {
            $('.add_product_warehouse_reports_check_all').prop('checked', this.checked);
        });

        $('.add_product_warehouse_reports_check_all').change(function() {
            if ($('.add_product_warehouse_reports_check_all:checked').length == $(
                    '.add_product_warehouse_reports_check_all')
                .length) {
                $('#add_product_warehouse_reports').prop('checked', true);
            } else {
                $('#add_product_warehouse_reports').prop('checked', false);
            }
        });

        $('#add_financial_management').change(function() {
            $('.add_financial_management_check_all').prop('checked', this.checked);
        });

        $('.add_financial_management_check_all').change(function() {
            if ($('.add_financial_management_check_all:checked').length == $(
                    '.add_financial_management_check_all')
                .length) {
                $('#add_financial_management').prop('checked', true);
            } else {
                $('#add_financial_management').prop('checked', false);
            }
        });

        $('#add_receive_payment').change(function() {
            $('.add_receive_payment_check_all').prop('checked', this.checked);
        });

        $('.add_receive_payment_check_all').change(function() {
            if ($('.add_receive_payment_check_all:checked').length == $(
                    '.add_receive_payment_check_all')
                .length) {
                $('#add_receive_payment').prop('checked', true);
            } else {
                $('#add_receive_payment').prop('checked', false);
            }
        });

        $('#add_first_period').change(function() {
            $('.add_first_period_check_all').prop('checked', this.checked);
        });

        $('.add_first_period_check_all').change(function() {
            if ($('.add_first_period_check_all:checked').length == $(
                    '.add_first_period_check_all')
                .length) {
                $('#add_first_period').prop('checked', true);
            } else {
                $('#add_first_period').prop('checked', false);
            }
        });

        $('#add_cheque_management').change(function() {
            $('.add_cheque_management_check_all').prop('checked', this.checked);
        });

        $('.add_cheque_management_check_all').change(function() {
            if ($('.add_cheque_management_check_all:checked').length == $(
                    '.add_cheque_management_check_all')
                .length) {
                $('#add_cheque_management').prop('checked', true);
            } else {
                $('#add_cheque_management').prop('checked', false);
            }
        });

        $('#add_receive_cheques_operations').change(function() {
            $('.add_receive_cheques_operations_check_all').prop('checked', this.checked);
        });

        $('.add_receive_cheques_operations_check_all').change(function() {
            if ($('.add_receive_cheques_operations_check_all:checked').length == $(
                    '.add_receive_cheques_operations_check_all')
                .length) {
                $('#add_receive_cheques_operations').prop('checked', true);
            } else {
                $('#add_receive_cheques_operations').prop('checked', false);
            }
        });

        $('#add_payment_cheques_operations').change(function() {
            $('.add_payment_cheques_operations_check_all').prop('checked', this.checked);
        });

        $('.add_payment_cheques_operations_check_all').change(function() {
            if ($('.add_payment_cheques_operations_check_all:checked').length == $(
                    '.add_payment_cheques_operations_check_all')
                .length) {
                $('#add_payment_cheques_operations').prop('checked', true);
            } else {
                $('#add_payment_cheques_operations').prop('checked', false);
            }
        });

        $('#add_security').change(function() {
            $('.add_security_check_all').prop('checked', this.checked);
        });

        $('.add_security_check_all').change(function() {
            if ($('.add_security_check_all:checked').length == $(
                    '.add_security_check_all')
                .length) {
                $('#add_security').prop('checked', true);
            } else {
                $('#add_security').prop('checked', false);
            }
        });

        $('#add_facilities').change(function() {
            $('.add_facilities_check_all').prop('checked', this.checked);
        });

        $('.add_facilities_check_all').change(function() {
            if ($('.add_facilities_check_all:checked').length == $(
                    '.add_facilities_check_all')
                .length) {
                $('#add_facilities').prop('checked', true);
            } else {
                $('#add_facilities').prop('checked', false);
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.addRole', function(e) {
                e.preventDefault();

                var data = {
                    'role_name': $('#add_role_name').val(),

                    'checked_all': document.getElementById("add_checked_all").checked,

                    'taarife_payeh': document.getElementById("add_taarife_payeh").checked,
                    'buy_sell': document.getElementById("add_buy_sell").checked,
                    'buy_sell_reports': document.getElementById("add_buy_sell_reports").checked,
                    'benefit_report': document.getElementById("add_benefit_report").checked,
                    'warehouse_menu': document.getElementById("add_warehouse_menu").checked,
                    'product_warehouse_reports': document.getElementById(
                        "add_product_warehouse_reports").checked,
                    'financial_management': document.getElementById("add_financial_management").checked,
                    'receive_payment': document.getElementById("add_receive_payment").checked,
                    'first_period': document.getElementById("add_first_period").checked,
                    'cheque_management': document.getElementById("add_cheque_management").checked,
                    'receive_cheques_operations': document.getElementById(
                        "add_receive_cheques_operations").checked,
                    'payment_cheques_operations': document.getElementById(
                        "add_payment_cheques_operations").checked,
                    'security': document.getElementById("add_security").checked,
                    'facilities': document.getElementById("add_facilities").checked,

                    'taraf_hesab': document.getElementById("add_taraf_hesab").checked,
                    'taraf_hesab_group': document.getElementById("add_taraf_hesab_group").checked,
                    'staff': document.getElementById("add_staff").checked,
                    'warehouse': document.getElementById("add_warehouse").checked,
                    'product_no_unit': document.getElementById("add_product_no_unit").checked,
                    'product_farei_asli': document.getElementById("add_product_farei_asli").checked,
                    'products': document.getElementById("add_products").checked,
                    'services': document.getElementById("add_services").checked,
                    'arzesh_afzoude_groups': document.getElementById("add_arzesh_afzoude_groups")
                        .checked,
                    'banks_types': document.getElementById("add_banks_types").checked,
                    'bank_accounts': document.getElementById("add_bank_accounts").checked,
                    'cities': document.getElementById("add_cities").checked,
                    'fund': document.getElementById("add_fund").checked,
                    'account_group': document.getElementById("add_account_group").checked,
                    'account_headings': document.getElementById("add_account_headings").checked,
                    'sell_factor': document.getElementById("add_sell_factor").checked,
                    'buy_factor': document.getElementById("add_buy_factor").checked,
                    'return_sell_factor': document.getElementById("add_return_sell_factor").checked,
                    'return_buy_factor': document.getElementById("add_return_buy_factor").checked,
                    'sell_factor_advanced': document.getElementById("add_sell_factor_advanced").checked,
                    'wastage_factor': document.getElementById("add_wastage_factor").checked,
                    'benefit_loss_bill': document.getElementById("add_benefit_loss_bill").checked,
                    'ttms': document.getElementById("add_ttms").checked,
                    'factors_types_report': document.getElementById("add_factors_types_report").checked,
                    'period_report': document.getElementById("add_period_report").checked,
                    'sell_report': document.getElementById("add_sell_report").checked,
                    'sell_statistics_report': document.getElementById("add_sell_statistics_report")
                        .checked,
                    'customer_report': document.getElementById("add_customer_report").checked,
                    'buy_report': document.getElementById("add_buy_report").checked,
                    'buy_statistics_report': document.getElementById("add_buy_statistics_report")
                        .checked,
                    'taraf_hesab_buy_report': document.getElementById("add_taraf_hesab_buy_report")
                        .checked,
                    'products_benefit': document.getElementById("add_products_benefit").checked,
                    'factors_benefit': document.getElementById("add_factors_benefit").checked,
                    'taraf_hesab_benefit': document.getElementById("add_taraf_hesab_benefit").checked,
                    'warehouse_moves': document.getElementById("add_warehouse_moves").checked,
                    'riali_report': document.getElementById("add_riali_report").checked,
                    'products_barcode': document.getElementById("add_products_barcode").checked,
                    'cardex': document.getElementById("add_cardex").checked,
                    'inventory_warehouse': document.getElementById("add_inventory_warehouse").checked,
                    'inventory_products': document.getElementById("add_inventory_products").checked,
                    'ordering_products': document.getElementById("add_ordering_products").checked,
                    'accounting_documents': document.getElementById("add_accounting_documents").checked,
                    'receive_from_the_account': document.getElementById("add_receive_from_the_account")
                        .checked,
                    'payment_to_account': document.getElementById("add_payment_to_account").checked,
                    'pay': document.getElementById("add_pay").checked,
                    'fund_to_bank': document.getElementById("add_fund_to_bank").checked,
                    'bank_to_fund': document.getElementById("add_bank_to_fund").checked,
                    'bank_to_bank': document.getElementById("add_bank_to_bank").checked,
                    'receive_miscellaneous_income': document.getElementById(
                        "add_receive_miscellaneous_income").checked,
                    'withdrawal_partner': document.getElementById("add_withdrawal_partner").checked,
                    'investment': document.getElementById("add_investment").checked,
                    'transfer_person': document.getElementById("add_transfer_person").checked,
                    'fund_period': document.getElementById("add_fund_period").checked,
                    'bank_accounts_period': document.getElementById("add_bank_accounts_period").checked,
                    'taraf_hesab_period': document.getElementById("add_taraf_hesab_period").checked,
                    'receive_cheques': document.getElementById("add_receive_cheques").checked,
                    'pay_cheques': document.getElementById("add_pay_cheques").checked,
                    'inventory_products_period': document.getElementById(
                        "add_inventory_products_period").checked,
                    'cheque_book': document.getElementById("add_cheque_book").checked,
                    'cheque_book_report': document.getElementById("add_cheque_book_report").checked,
                    'receive_cheques_report': document.getElementById("add_receive_cheques_report")
                        .checked,
                    'pay_cheques_report': document.getElementById("add_pay_cheques_report").checked,
                    'circulation_receive_cheque': document.getElementById(
                        "add_circulation_receive_cheque").checked,
                    'circulation_pay_cheque_report': document.getElementById(
                        "add_circulation_pay_cheque_report").checked,
                    'deposit': document.getElementById("add_deposit").checked,
                    'notification': document.getElementById("add_notification").checked,
                    'manual': document.getElementById("add_manual").checked,
                    'returning_cheque': document.getElementById("add_returning_cheque").checked,
                    'announcement': document.getElementById("add_announcement").checked,
                    'spent_cheque': document.getElementById("add_spent_cheque").checked,
                    'cheque_return': document.getElementById("add_cheque_return").checked,
                    'receipt_cheque': document.getElementById("add_receipt_cheque").checked,
                    'pay_returning_cheque': document.getElementById("add_pay_returning_cheque").checked,
                    'cashing_cheque': document.getElementById("add_cashing_cheque").checked,
                    'cancel_cheque': document.getElementById("add_cancel_cheque").checked,
                    'users': document.getElementById("add_users").checked,
                    'profile': document.getElementById("add_profile").checked,
                    'roles': document.getElementById("add_roles").checked,
                    'phone_book': document.getElementById("add_phone_book").checked,
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/roles",
                    data: data,
                    dataType: "json",

                    success: function(response) {
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
                                $("#createInfo").modal("hide");
                                $("#createInfo").find("input").val("");
                                add_clearErrors();
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
        });

        // call function on hiding modal
        $('#createInfo').on('hidden.bs.modal', function(e) {
            // alert("bye");
            add_clearErrors();
            add_defaultSelectedValue();
            $("#createInfo").find("input").val(""); // Clear Input Values
        })

        function add_clearErrors() {
            $("#add_role_name_error").text("");
            $("#add_role_name").removeClass("is-invalid");
        }

        function add_defaultSelectedValue() {
            $('#add_checked_all').prop('checked', false);

            $('#add_taarife_payeh').prop('checked', false);
            $('#add_buy_sell').prop('checked', false);
            $('#add_buy_sell_reports').prop('checked', false);
            $('#add_benefit_report').prop('checked', false);
            $('#add_warehouse_menu').prop('checked', false);
            $('#add_product_warehouse_reports').prop('checked', false);
            $('#add_financial_management').prop('checked', false);
            $('#add_receive_payment').prop('checked', false);
            $('#add_first_period').prop('checked', false);
            $('#add_cheque_management').prop('checked', false);
            $('#add_receive_cheques_operations').prop('checked', false);
            $('#add_payment_cheques_operations').prop('checked', false);
            $('#add_security').prop('checked', false);
            $('#add_facilities').prop('checked', false);

            $('#add_taraf_hesab').prop('checked', false);
            $('#add_taraf_hesab_group').prop('checked', false);
            $('#add_staff').prop('checked', false);
            $('#add_warehouse').prop('checked', false);
            $('#add_product_no_unit').prop('checked', false);
            $('#add_product_farei_asli').prop('checked', false);
            $('#add_products').prop('checked', false);
            $('#add_services').prop('checked', false);
            $('#add_arzesh_afzoude_groups').prop('checked', false);
            $('#add_banks_types').prop('checked', false);
            $('#add_bank_accounts').prop('checked', false);
            $('#add_cities').prop('checked', false);
            $('#add_fund').prop('checked', false);
            $('#add_account_group').prop('checked', false);
            $('#add_account_headings').prop('checked', false);
            $('#add_sell_factor').prop('checked', false);
            $('#add_buy_factor').prop('checked', false);
            $('#add_return_sell_factor').prop('checked', false);
            $('#add_return_buy_factor').prop('checked', false);
            $('#add_sell_factor_advanced').prop('checked', false);
            $('#add_wastage_factor').prop('checked', false);
            $('#add_benefit_loss_bill').prop('checked', false);
            $('#add_ttms').prop('checked', false);
            $('#add_factors_types_report').prop('checked', false);
            $('#add_period_report').prop('checked', false);
            $('#add_sell_report').prop('checked', false);
            $('#add_sell_statistics_report').prop('checked', false);
            $('#add_customer_report').prop('checked', false);
            $('#add_buy_report').prop('checked', false);
            $('#add_buy_statistics_report').prop('checked', false);
            $('#add_taraf_hesab_buy_report').prop('checked', false);
            $('#add_products_benefit').prop('checked', false);
            $('#add_factors_benefit').prop('checked', false);
            $('#add_taraf_hesab_benefit').prop('checked', false);
            $('#add_warehouse_moves').prop('checked', false);
            $('#add_riali_report').prop('checked', false);
            $('#add_products_barcode').prop('checked', false);
            $('#add_cardex').prop('checked', false);
            $('#add_inventory_warehouse').prop('checked', false);
            $('#add_inventory_products').prop('checked', false);
            $('#add_ordering_products').prop('checked', false);
            $('#add_accounting_documents').prop('checked', false);
            $('#add_receive_from_the_account').prop('checked', false);
            $('#add_payment_to_account').prop('checked', false);
            $('#add_pay').prop('checked', false);
            $('#add_fund_to_bank').prop('checked', false);
            $('#add_bank_to_fund').prop('checked', false);
            $('#add_bank_to_bank').prop('checked', false);
            $('#add_receive_miscellaneous_income').prop('checked', false);
            $('#add_withdrawal_partner').prop('checked', false);
            $('#add_investment').prop('checked', false);
            $('#add_transfer_person').prop('checked', false);
            $('#add_fund_period').prop('checked', false);
            $('#add_bank_accounts_period').prop('checked', false);
            $('#add_taraf_hesab_period').prop('checked', false);
            $('#add_receive_cheques').prop('checked', false);
            $('#add_pay_cheques').prop('checked', false);
            $('#add_inventory_products_period').prop('checked', false);
            $('#add_cheque_book').prop('checked', false);
            $('#add_cheque_book_report').prop('checked', false);
            $('#add_receive_cheques_report').prop('checked', false);
            $('#add_pay_cheques_report').prop('checked', false);
            $('#add_circulation_receive_cheque').prop('checked', false);
            $('#add_circulation_pay_cheque_report').prop('checked', false);
            $('#add_deposit').prop('checked', false);
            $('#add_notification').prop('checked', false);
            $('#add_manual').prop('checked', false);
            $('#add_returning_cheque').prop('checked', false);
            $('#add_announcement').prop('checked', false);
            $('#add_spent_cheque').prop('checked', false);
            $('#add_cheque_return').prop('checked', false);
            $('#add_receipt_cheque').prop('checked', false);
            $('#add_pay_returning_cheque').prop('checked', false);
            $('#add_cashing_cheque').prop('checked', false);
            $('#add_cancel_cheque').prop('checked', false);
            $('#add_users').prop('checked', false);
            $('#add_profile').prop('checked', false);
            $('#add_roles').prop('checked', false);
            $('#add_phone_book').prop('checked', false);
        }
    </script>
@endpush
