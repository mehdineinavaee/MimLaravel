<div class="sidebar" style="direction: rtl">
    <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        @include('layout.sidebar-user-panel')

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            تعاریف پایه
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('taraf-hesab.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی طرف حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('taraf-hesab-group.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گروه بندی طرف های حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('staff.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی پرسنل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('warehouse.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی انبارها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('product-no-unit.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی واحد شمارش کالا</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('product-farei-asli.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی گروه اصلی و فرعی کالا</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href={{ route('products.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی کالاها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('services.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی خدمات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('arzesh-afzoude-groups.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی گروه های ارزش افزوده</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('banks-types.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی انواع بانک های کشور</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('bank-accounts.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی حساب های بانکی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cities.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی شهرهای کشور</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('fund.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی درآمد / هزینه / صندوق</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('account-group.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی گروه حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('account-headings.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی سرفصل های حساب (کل، معین، تفصیل)</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            خرید و فروش
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('sell-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور فروش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('buy-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور خرید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('return-sell-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور برگشت از فروش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('return-buy-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور برگشت از خرید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('sell-factor-advanced.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پیش فاکتور فروش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('wastage-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور ضایعات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('benefit-loss-bill.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>صورت حساب سود و زیان</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('ttms.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارشات فصلی دارایی (TTMS)</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            گزارشات خرید و فروش
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('factors-types-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('period-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش دوره ای خرید و فروش</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('sell-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش فروش به تفکیک ماه، فصل، سال</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('sell-statistics-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش آماری فروش بر اساس کالا</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('customer-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش آماری فروش بر اساس مشتری</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('buy-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش خرید به تفکیک ماه، فصل، سال</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('buy-statistics-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش آماری خرید بر اساس کالا</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('taraf-hesab-buy-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش آماری خرید بر اساس طرف حساب</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            گزارش سود ناخالص فروش کالا
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('products-benefit.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>سود به تفکیک کالاها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('factors-benefit.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>سود به تفکیک فاکتورها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('taraf-hesab-benefit.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>سود به تفکیک طرف های حساب</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            انبار
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('warehouse-wastage-factor.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فاکتور ضایعات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('warehouse-moves.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>انتقال بین انبارها</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            گزارشات کالا و انبار
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('riali-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش موجودی ریالی به تفکیک انبار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('products-barcode.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>چاپ بارکد کالاها</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cardex.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گردش کالا در انبار (کاردکس)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('inventory-warehouse.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>موجودی کالاهای انبار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('inventory-products.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>موجودی کالاها به تفکیک انبار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('ordering-products.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>نقطه سفارش کالاها</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            مدیریت مالی
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('accounting-documents.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اسناد حسابداری</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            دریافت / پرداخت
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('receive-from-the-account.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>دریافت از طرف حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('payment-to-account.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پرداخت به طرف حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('pay.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پرداخت هزینه</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('fund-to-bank.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>از صندوق به بانک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('bank-to-fund.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>از بانک به صندوق</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('bank-to-bank.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>از بانک به بانک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('receive-miscellaneous-income.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>دریافت درآمد متفرقه</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('withdrawal-partner.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>برداشت شرکا</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('investment.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پرداخت شرکا (سرمایه گذاری)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('transfer-person.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>انتقال بین اشخاص</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            اول دوره
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('fund-period.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اول دوره صندوق</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('bank-accounts-period.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اول دوره حساب های بانکی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('taraf-hesab-period.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اول دوره طرف حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('receive-cheques.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>چک های دریافتی اول دوره</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('pay-cheques.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>چک های پرداختی اول دوره</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('inventory-products-period.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>موجودی اول دوره کالاها</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            مدیریت چک
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('cheque-book.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>معرفی دسته چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cheque-book-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش دسته چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('receive-cheques-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش چک های دریافتی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('pay-cheques-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش چک های پرداختی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('circulation-receive-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>سابقه گردش چک دریافتی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('circulation-pay-cheque-report.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>گزارش گردش چک پرداختی</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            عملیات چک های دریافتی
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('deposit.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>خواباندن چک به حساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('notification.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اعلام وصول چک های خوابانده شده</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('manual.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اعلام وصول دستی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('returning-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>برگشت چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('announcement.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اعلام وصول چک های برگشتی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('spent-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پس گرفتن چک خرج شده</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cheque-return.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>عودت چک</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            عملیات چک های پرداختی
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('receipt-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>اعلام وصول چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('pay-returning-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>برگشت چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cashing-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پس گرفتن چک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('cancel-cheque.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>ابطال چک</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-shield"></i>
                        <p>
                            امنیت
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('users.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>فهرست کاربران</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('profile.edit', ['profile' => Auth::user()->id]) }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>پروفایل من</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            امکانات
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ route('phone-book.index') }} class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>دفترچه تلفن</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</div>
