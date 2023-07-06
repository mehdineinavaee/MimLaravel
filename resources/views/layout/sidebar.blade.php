<div class="sidebar" style="direction: rtl">
    <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        @include('layout.sidebar-user-panel')

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('taarife_payeh')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                تعاریف پایه
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('taraf_hesab')
                                <li class="nav-item">
                                    <a href={{ route('taraf-hesab.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی طرف حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('taraf_hesab_group')
                                <li class="nav-item">
                                    <a href={{ route('taraf-hesab-group.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گروه بندی طرف های حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('staff')
                                <li class="nav-item">
                                    <a href={{ route('staff.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی پرسنل</p>
                                    </a>
                                </li>
                            @endcan
                            @can('warehouse')
                                <li class="nav-item">
                                    <a href={{ route('warehouse.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی انبارها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_no_unit')
                                <li class="nav-item">
                                    <a href={{ route('product-no-unit.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی واحد شمارش کالا</p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_farei_asli')
                                <li class="nav-item">
                                    <a href={{ route('product-farei-asli.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی گروه اصلی و فرعی کالا</p>
                                    </a>

                                </li>
                            @endcan
                            @can('products')
                                <li class="nav-item">
                                    <a href={{ route('products.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی کالاها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('services')
                                <li class="nav-item">
                                    <a href={{ route('services.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی خدمات</p>
                                    </a>
                                </li>
                            @endcan
                            @can('arzesh_afzoude_groups')
                                <li class="nav-item">
                                    <a href={{ route('arzesh-afzoude-groups.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی گروه های ارزش افزوده</p>
                                    </a>
                                </li>
                            @endcan
                            @can('banks_types')
                                <li class="nav-item">
                                    <a href={{ route('banks-types.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی انواع بانک های کشور</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_accounts')
                                <li class="nav-item">
                                    <a href={{ route('bank-accounts.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی حساب های بانکی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cities')
                                <li class="nav-item">
                                    <a href={{ route('cities.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی شهرهای کشور</p>
                                    </a>
                                </li>
                            @endcan
                            @can('fund')
                                <li class="nav-item">
                                    <a href={{ route('fund.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی درآمد / هزینه / صندوق</p>
                                    </a>
                                </li>
                            @endcan
                            @can('account_group')
                                <li class="nav-item">
                                    <a href={{ route('account-group.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی گروه حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('account_headings')
                                <li class="nav-item">
                                    <a href={{ route('account-headings.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی سرفصل های حساب (کل، معین، تفصیل)</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('buy_sell')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                خرید و فروش
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('sell_factor')
                                <li class="nav-item">
                                    <a href={{ route('sell-factor.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فاکتور فروش</p>
                                    </a>
                                </li>
                            @endcan
                            @can('buy_factor')
                                <li class="nav-item">
                                    <a href={{ route('buy-factor.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فاکتور خرید</p>
                                    </a>
                                </li>
                            @endcan
                            @can('return_sell_factor')
                                <li class="nav-item">
                                    <a href={{ route('return-sell-factor.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فاکتور برگشت از فروش</p>
                                    </a>
                                </li>
                            @endcan
                            @can('return_buy_factor')
                                <li class="nav-item">
                                    <a href={{ route('return-buy-factor.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فاکتور برگشت از خرید</p>
                                    </a>
                                </li>
                            @endcan
                            @can('sell_factor_advanced')
                                <li class="nav-item">
                                    <a href={{ route('sell-factor-advanced.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پیش فاکتور فروش</p>
                                    </a>
                                </li>
                            @endcan
                            @can('wastage_factor')
                                <li class="nav-item">
                                    <a href={{ route('wastage-factor.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فاکتور ضایعات</p>
                                    </a>
                                </li>
                            @endcan
                            @can('benefit_loss_bill')
                                <li class="nav-item">
                                    <a href={{ route('benefit-loss-bill.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>صورت حساب سود و زیان</p>
                                    </a>
                                </li>
                            @endcan
                            @can('ttms')
                                <li class="nav-item">
                                    <a href={{ route('ttms.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارشات فصلی دارایی (TTMS)</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('buy_sell_reports')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                گزارشات خرید و فروش
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('factors_types_report')
                                <li class="nav-item">
                                    <a href={{ route('factors-types-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)</p>
                                    </a>
                                </li>
                            @endcan
                            @can('period_report')
                                <li class="nav-item">
                                    <a href={{ route('period-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش دوره ای خرید و فروش</p>
                                    </a>
                                </li>
                            @endcan
                            @can('sell_report')
                                <li class="nav-item">
                                    <a href={{ route('sell-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش فروش به تفکیک ماه، فصل، سال</p>
                                    </a>
                                </li>
                            @endcan
                            @can('sell_statistics_report')
                                <li class="nav-item">
                                    <a href={{ route('sell-statistics-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش آماری فروش بر اساس کالا</p>
                                    </a>
                                </li>
                            @endcan
                            @can('customer_report')
                                <li class="nav-item">
                                    <a href={{ route('customer-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش آماری فروش بر اساس مشتری</p>
                                    </a>
                                </li>
                            @endcan
                            @can('customer_report')
                                <li class="nav-item">
                                    <a href={{ route('buy-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش خرید به تفکیک ماه، فصل، سال</p>
                                    </a>
                                </li>
                            @endcan
                            @can('buy_statistics_report')
                                <li class="nav-item">
                                    <a href={{ route('buy-statistics-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش آماری خرید بر اساس کالا</p>
                                    </a>
                                </li>
                            @endcan
                            @can('taraf_hesab_buy_report')
                                <li class="nav-item">
                                    <a href={{ route('taraf-hesab-buy-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش آماری خرید بر اساس طرف حساب</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('benefit_report')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                گزارش سود ناخالص فروش کالا
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('products_benefit')
                                <li class="nav-item">
                                    <a href={{ route('products-benefit.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سود به تفکیک کالاها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('factors_benefit')
                                <li class="nav-item">
                                    <a href={{ route('factors-benefit.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سود به تفکیک فاکتورها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('taraf_hesab_benefit')
                                <li class="nav-item">
                                    <a href={{ route('taraf-hesab-benefit.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سود به تفکیک طرف های حساب</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('warehouse_menu')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                انبار
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('warehouse_moves')
                                <li class="nav-item">
                                    <a href={{ route('warehouse-moves.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>انتقال بین انبارها</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('product_warehouse_reports')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                گزارشات کالا و انبار
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('riali_report')
                                <li class="nav-item">
                                    <a href={{ route('riali-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش موجودی ریالی به تفکیک انبار</p>
                                    </a>
                                </li>
                            @endcan
                            @can('products_barcode')
                                <li class="nav-item">
                                    <a href={{ route('products-barcode.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>چاپ بارکد کالاها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cardex')
                                <li class="nav-item">
                                    <a href={{ route('cardex.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گردش کالا در انبار (کاردکس)</p>
                                    </a>
                                </li>
                            @endcan
                            @can('inventory_warehouse')
                                <li class="nav-item">
                                    <a href={{ route('inventory-warehouse.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>موجودی کالاهای انبار</p>
                                    </a>
                                </li>
                            @endcan
                            @can('inventory_products')
                                <li class="nav-item">
                                    <a href={{ route('inventory-products.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>موجودی کالاها به تفکیک انبار</p>
                                    </a>
                                </li>
                            @endcan
                            @can('ordering_products')
                                <li class="nav-item">
                                    <a href={{ route('ordering-products.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>نقطه سفارش کالاها</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('financial_management')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                مدیریت مالی
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('accounting_documents')
                                <li class="nav-item">
                                    <a href={{ route('accounting-documents.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اسناد حسابداری</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('receive_payment')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                دریافت / پرداخت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('receive_from_the_account')
                                <li class="nav-item">
                                    <a href={{ route('receive-from-the-account.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دریافت از طرف حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_to_account')
                                <li class="nav-item">
                                    <a href={{ route('payment-to-account.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پرداخت به طرف حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('pay')
                                <li class="nav-item">
                                    <a href={{ route('pay.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پرداخت هزینه</p>
                                    </a>
                                </li>
                            @endcan
                            @can('fund_to_bank')
                                <li class="nav-item">
                                    <a href={{ route('fund-to-bank.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>از صندوق به بانک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_to_fund')
                                <li class="nav-item">
                                    <a href={{ route('bank-to-fund.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>از بانک به صندوق</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_to_bank')
                                <li class="nav-item">
                                    <a href={{ route('bank-to-bank.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>از بانک به بانک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('receive_miscellaneous_income')
                                <li class="nav-item">
                                    <a href={{ route('receive-miscellaneous-income.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دریافت درآمد متفرقه</p>
                                    </a>
                                </li>
                            @endcan
                            @can('withdrawal_partner')
                                <li class="nav-item">
                                    <a href={{ route('withdrawal-partner.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>برداشت شرکا</p>
                                    </a>
                                </li>
                            @endcan
                            @can('investment')
                                <li class="nav-item">
                                    <a href={{ route('investment.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پرداخت شرکا (سرمایه گذاری)</p>
                                    </a>
                                </li>
                            @endcan
                            @can('transfer_person')
                                <li class="nav-item">
                                    <a href={{ route('transfer-person.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>انتقال بین اشخاص</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('first_period')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                اول دوره
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('fund_period')
                                <li class="nav-item">
                                    <a href={{ route('fund-period.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اول دوره صندوق</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_accounts_period')
                                <li class="nav-item">
                                    <a href={{ route('bank-accounts-period.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اول دوره حساب های بانکی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('taraf_hesab_period')
                                <li class="nav-item">
                                    <a href={{ route('taraf-hesab-period.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اول دوره طرف حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('receive_cheques')
                                <li class="nav-item">
                                    <a href={{ route('receive-cheques.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>چک های دریافتی اول دوره</p>
                                    </a>
                                </li>
                            @endcan
                            @can('pay_cheques')
                                <li class="nav-item">
                                    <a href={{ route('pay-cheques.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>چک های پرداختی اول دوره</p>
                                    </a>
                                </li>
                            @endcan
                            @can('inventory_products_period')
                                <li class="nav-item">
                                    <a href={{ route('inventory-products-period.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>موجودی اول دوره کالاها</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('cheque_management')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                مدیریت چک
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('cheque_book')
                                <li class="nav-item">
                                    <a href={{ route('cheque-book.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>معرفی دسته چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cheque_book_report')
                                <li class="nav-item">
                                    <a href={{ route('cheque-book-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش دسته چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('receive_cheques_report')
                                <li class="nav-item">
                                    <a href={{ route('receive-cheques-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش چک های دریافتی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('pay_cheques_report')
                                <li class="nav-item">
                                    <a href={{ route('pay-cheques-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>گزارش چک های پرداختی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('circulation_receive_cheque')
                                <li class="nav-item">
                                    <a href={{ route('circulation-receive-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سابقه گردش چک دریافتی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('circulation_pay_cheque_report')
                                <li class="nav-item">
                                    <a href={{ route('circulation-pay-cheque-report.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سابقه گردش چک پرداختی</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('receive_cheques_operations')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                عملیات چک های دریافتی
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('deposit')
                                <li class="nav-item">
                                    <a href={{ route('deposit.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>خواباندن چک به حساب</p>
                                    </a>
                                </li>
                            @endcan
                            @can('notification')
                                <li class="nav-item">
                                    <a href={{ route('notification.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اعلام وصول چک های خوابانده شده</p>
                                    </a>
                                </li>
                            @endcan
                            @can('manual')
                                <li class="nav-item">
                                    <a href={{ route('manual.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اعلام وصول دستی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('returning_cheque')
                                <li class="nav-item">
                                    <a href={{ route('returning-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>برگشت چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('announcement')
                                <li class="nav-item">
                                    <a href={{ route('announcement.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اعلام وصول چک های برگشتی</p>
                                    </a>
                                </li>
                            @endcan
                            @can('spent_cheque')
                                <li class="nav-item">
                                    <a href={{ route('spent-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پس گرفتن چک خرج شده</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cheque_return')
                                <li class="nav-item">
                                    <a href={{ route('cheque-return.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>عودت چک</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('payment_cheques_operations')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                عملیات چک های پرداختی
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('receipt_cheque')
                                <li class="nav-item">
                                    <a href={{ route('receipt-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اعلام وصول چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('pay_returning_cheque')
                                <li class="nav-item">
                                    <a href={{ route('pay-returning-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>برگشت چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cashing_cheque')
                                <li class="nav-item">
                                    <a href={{ route('cashing-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پس گرفتن چک</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cancel_cheque')
                                <li class="nav-item">
                                    <a href={{ route('cancel-cheque.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ابطال چک</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('security')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shield"></i>
                            <p>
                                امنیت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('users')
                                <li class="nav-item">
                                    <a href={{ route('users.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فهرست کاربران</p>
                                    </a>
                                </li>
                            @endcan
                            @can('profile')
                                <li class="nav-item">
                                    <a href={{ route('profile.edit', ['profile' => Auth::user()->id]) }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پروفایل من</p>
                                    </a>
                                </li>
                            @endcan
                            @can('roles')
                                <li class="nav-item">
                                    <a href={{ route('roles.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>نقش ها و مجوز دسترسی</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('facilities')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                امکانات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('phone_book')
                                <li class="nav-item">
                                    <a href={{ route('phone-book.index') }} class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دفترچه تلفن</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</div>
