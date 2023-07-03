<?php

use App\Http\Controllers\AccountGroupController;
use App\Http\Controllers\AccountHeadingController;
use App\Http\Controllers\AccountingDocumentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ArzeshAfzoudeGroupController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankAccountsPeriodController;
use App\Http\Controllers\BankToBankController;
use App\Http\Controllers\BankToFundController;
use App\Http\Controllers\BankTypeController;
use App\Http\Controllers\BenefitLossBillController;
use App\Http\Controllers\BuyFactorController;
use App\Http\Controllers\BuyFactorDetailController;
use App\Http\Controllers\BuyReportController;
use App\Http\Controllers\BuyStatisticsReportController;
use App\Http\Controllers\CancelChequeController;
use App\Http\Controllers\CardexController;
use App\Http\Controllers\CashingChequeController;
use App\Http\Controllers\ChequeBookController;
use App\Http\Controllers\ChequeBookReportController;
use App\Http\Controllers\ChequeReturnController;
use App\Http\Controllers\CirculationPayChequeReportController;
use App\Http\Controllers\CirculationReceiveChequeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\FactorsBenefitController;
use App\Http\Controllers\FactorsTypesReportController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundPeriodController;
use App\Http\Controllers\FundToBankController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryProductController;
use App\Http\Controllers\InventoryProductsPeriodController;
use App\Http\Controllers\InventoryWarehouseController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\KolController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\MoeinController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderingProductController;
use App\Http\Controllers\PayChequeController;
use App\Http\Controllers\PayChequesReportController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentToAccountController;
use App\Http\Controllers\PayReturningChequeController;
use App\Http\Controllers\PeriodReportController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\ProductAsliController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFareiAsliController;
use App\Http\Controllers\ProductFareiController;
use App\Http\Controllers\ProductNoUnitController;
use App\Http\Controllers\ProductsBarcodeController;
use App\Http\Controllers\ProductsBenefitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptChequeController;
use App\Http\Controllers\ReceiveChequeController;
use App\Http\Controllers\ReceiveChequesReportController;
use App\Http\Controllers\ReceiveFromTheAccountController;
use App\Http\Controllers\ReceiveMiscellaneousIncomeController;
use App\Http\Controllers\ReturnBuyFactorController;
use App\Http\Controllers\ReturnBuyFactorDetailController;
use App\Http\Controllers\ReturningChequeController;
use App\Http\Controllers\ReturnSellFactorController;
use App\Http\Controllers\ReturnSellFactorDetailController;
use App\Http\Controllers\RialiReportController;
use App\Http\Controllers\SellFactorAdvancedController;
use App\Http\Controllers\SellFactorAdvancedDetailController;
use App\Http\Controllers\SellFactorController;
use App\Http\Controllers\SellFactorDetailController;
use App\Http\Controllers\SellReportController;
use App\Http\Controllers\SellStatisticsReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpentChequeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TafsilController;
use App\Http\Controllers\TarafHesabBenefitController;
use App\Http\Controllers\TarafHesabBuyReportController;
use App\Http\Controllers\TarafHesabController;
use App\Http\Controllers\TarafHesabGroupController;
use App\Http\Controllers\TarafHesabPeriodController;
use App\Http\Controllers\TransferPersonController;
use App\Http\Controllers\TtmsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseMoveController;
use App\Http\Controllers\WarehouseMoveDetailController;
use App\Http\Controllers\WarehouseWastageFactorController;
use App\Http\Controllers\WastageFactorController;
use App\Http\Controllers\WastageFactorDetailController;
use App\Http\Controllers\WithdrawalPartnerController;

// Taarife Payeh
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::resource('account-group', AccountGroupController::class);
Route::get('/index-search-account-group', [AccountGroupController::class, 'index_search_account_group'])->name('index_search_account_group');
Route::resource('account-headings', AccountHeadingController::class);
Route::get('/index-search-account-heading', [AccountHeadingController::class, 'index_search_account_heading'])->name('index_search_account_heading');
Route::resource('kol', KolController::class);
Route::resource('moein', MoeinController::class);
Route::resource('tafsil', TafsilController::class);
Route::resource('arzesh-afzoude-groups', ArzeshAfzoudeGroupController::class);
Route::get('/index-search-arzesh-afzoude-group', [ArzeshAfzoudeGroupController::class, 'index_search_arzesh_afzoude_group'])->name('index_search_arzesh_afzoude_group');
Route::resource('bank-accounts', BankAccountController::class);
Route::get('/index-search-bank-account', [BankAccountController::class, 'index_search_bank_account'])->name('index_search_bank_account');
Route::resource('banks-types', BankTypeController::class);
Route::get('/index-search-bank-type', [BankTypeController::class, 'index_search_bank_type'])->name('index_search_bank_type');
Route::resource('cities', CityController::class);
Route::get('/index-search-city', [CityController::class, 'index_search_city'])->name('index_search_city');
Route::resource('fund', FundController::class);
Route::get('/index-search-fund', [FundController::class, 'index_search_fund'])->name('index_search_fund');
Route::resource('product-farei-asli', ProductFareiAsliController::class);
Route::resource('product-asli', ProductAsliController::class);
Route::resource('product-farei', ProductFareiController::class);
Route::resource('product-no-unit', ProductNoUnitController::class);
Route::get('/index-search-product-no-unit', [ProductNoUnitController::class, 'index_search_product_no_unit'])->name('index_search_product_no_unit');
Route::resource('products', ProductController::class);
Route::get('/index-search-product', [ProductController::class, 'index_search_product'])->name('index_search_product');
Route::resource('services', ServiceController::class);
Route::get('/index-search-service', [ServiceController::class, 'index_search_service'])->name('index_search_service');
Route::resource('warehouse', WarehouseController::class);
Route::get('/index-search-warehouse', [WarehouseController::class, 'index_search_warehouse'])->name('index_search_warehouse');
Route::resource('staff', StaffController::class);
Route::get('/index-search-staff', [StaffController::class, 'index_search_staff'])->name('index_search_staff');
Route::resource('taraf-hesab', TarafHesabController::class);
Route::get('/index-search-taraf-hesab', [TarafHesabController::class, 'index_search_taraf_hesab'])->name('index_search_taraf_hesab');
Route::resource('taraf-hesab-group', TarafHesabGroupController::class);

// Buy Sell
Route::resource('benefit-loss-bill', BenefitLossBillController::class);
Route::get('/benefit-loss-bill-invoice', [BenefitLossBillController::class, 'benefit_loss_bill_invoice'])->name('benefit_loss_bill_invoice');
Route::resource('buy-factor', BuyFactorController::class);
Route::get('/fetch-buy-factor', [BuyFactorController::class, 'fetch_buy_factor'])->name('fetch_buy_factor');
Route::get('/search-buy-factor', [BuyFactorController::class, 'search_buy_factor'])->name('search_buy_factor');
Route::get('/index-search-buy-factors', [BuyFactorController::class, 'index_search_buy_factors'])->name('index_search_buy_factors');
Route::resource('buy-factor-detail', BuyFactorDetailController::class);
Route::put('update-buy-factor/{buy_factor_id}/{product_id}', [BuyFactorDetailController::class, 'update_buy_factor'])->name('update_buy_factor');
Route::delete('destroy-buy-factor/{buy_factor_id}/{product_id}', [BuyFactorDetailController::class, 'destroy_buy_factor'])->name('destroy_buy_factor');
Route::resource('return-buy-factor', ReturnBuyFactorController::class);
Route::get('/fetch-return-buy-factor', [ReturnBuyFactorController::class, 'fetch_return_buy_factor'])->name('fetch_return_buy_factor');
Route::get('/search-return-buy-factor', [ReturnBuyFactorController::class, 'search_return_buy_factor'])->name('search_return_buy_factor');
Route::get('/index-search-return-buy-factors', [ReturnBuyFactorController::class, 'index_search_return_buy_factors'])->name('index_search_return_buy_factors');
Route::resource('return-buy-factor-detail', ReturnBuyFactorDetailController::class);
Route::put('update-return-buy-factor/{return_buy_factor_id}/{product_id}', [ReturnBuyFactorDetailController::class, 'update_return_buy_factor'])->name('update_return_buy_factor');
Route::delete('destroy-return-buy-factor/{return_buy_factor_id}/{product_id}', [ReturnBuyFactorDetailController::class, 'destroy_return_buy_factor'])->name('destroy_return_buy_factor');
Route::resource('return-sell-factor', ReturnSellFactorController::class);
Route::get('/fetch-return-sell-factor', [ReturnSellFactorController::class, 'fetch_return_sell_factor'])->name('fetch_return_sell_factor');
Route::get('/search-return-sell-factor', [ReturnSellFactorController::class, 'search_return_sell_factor'])->name('search_return_sell_factor');
Route::get('/index-search-return-sell-factors', [ReturnSellFactorController::class, 'index_search_return_sell_factors'])->name('index_search_return_sell_factors');
Route::resource('return-sell-factor-detail', ReturnSellFactorDetailController::class);
Route::put('update-return-sell-factor/{return_sell_factor_id}/{product_id}', [ReturnSellFactorDetailController::class, 'update_return_sell_factor'])->name('update_return_sell_factor');
Route::delete('destroy-return-sell-factor/{return_sell_factor_id}/{product_id}', [ReturnSellFactorDetailController::class, 'destroy_return_sell_factor'])->name('destroy_return_sell_factor');
Route::resource('sell-factor', SellFactorController::class);
Route::get('/add-fetch-products', [SellFactorController::class, 'add_fetch_products'])->name('add_fetch_products');
Route::get('/add-search-products', [SellFactorController::class, 'add_search_products'])->name('add_search_products');
Route::get('/index-search-factors', [SellFactorController::class, 'index_search_factors'])->name('index_search_factors');
Route::resource('sell-factor-detail', SellFactorDetailController::class);
Route::put('update-factor-items/{sell_factor_id}/{product_id}', [SellFactorDetailController::class, 'update_factor_items'])->name('update_factor_items');
Route::delete('destroy-factor-items/{sell_factor_id}/{product_id}', [SellFactorDetailController::class, 'destroy_factor_items'])->name('destroy_factor_items');
Route::resource('sell-factor-advanced', SellFactorAdvancedController::class);
Route::get('/fetch-sell-factor-advanced', [SellFactorAdvancedController::class, 'fetch_sell_factor_advanced'])->name('fetch_sell_factor_advanced');
Route::get('/search-sell-factor-advanced', [SellFactorAdvancedController::class, 'search_sell_factor_advanced'])->name('search_sell_factor_advanced');
Route::get('/index-search-sell-factor-advanced', [SellFactorAdvancedController::class, 'index_search_sell_factor_advanced'])->name('index_search_sell_factor_advanced');
Route::resource('sell-factor-advanced-detail', SellFactorAdvancedDetailController::class);
Route::put('update-sell-factor-advanced/{sell_factor_advanced_id}/{product_id}', [SellFactorAdvancedDetailController::class, 'update_sell_factor_advanced'])->name('update_sell_factor_advanced');
Route::delete('destroy-sell-factor-advanced/{sell_factor_advanced_id}/{product_id}', [SellFactorAdvancedDetailController::class, 'destroy_sell_factor_advanced'])->name('destroy_sell_factor_advanced');
Route::resource('ttms', TtmsController::class);
Route::resource('wastage-factor', WastageFactorController::class);
Route::get('/fetch-wastage-factor', [WastageFactorController::class, 'fetch_wastage_factor'])->name('fetch_wastage_factor');
Route::get('/search-wastage-factor', [WastageFactorController::class, 'search_wastage_factor'])->name('search_wastage_factor');
Route::get('/index-search-wastage-factor', [WastageFactorController::class, 'index_search_wastage_factor'])->name('index_search_wastage_factor');
Route::resource('wastage-factor-detail', WastageFactorDetailController::class);
Route::put('update-wastage-factor/{wastage_factor_id}/{product_id}', [WastageFactorDetailController::class, 'update_wastage_factor'])->name('update_wastage_factor');
Route::delete('destroy-wastage-factor/{wastage_factor_id}/{product_id}', [WastageFactorDetailController::class, 'destroy_wastage_factor'])->name('destroy_wastage_factor');

// Buy Sell Reports
Route::resource('buy-report', BuyReportController::class);
Route::resource('buy-statistics-report', BuyStatisticsReportController::class);
Route::resource('factors-types-report', FactorsTypesReportController::class);
Route::resource('period-report', PeriodReportController::class);
Route::resource('sell-report', SellReportController::class);
Route::resource('sell-statistics-report', SellStatisticsReportController::class);
Route::resource('customer-report', CustomerReportController::class);
Route::resource('taraf-hesab-buy-report', TarafHesabBuyReportController::class);

// Benefit Report
Route::resource('factors-benefit', FactorsBenefitController::class);
Route::resource('products-benefit', ProductsBenefitController::class);
Route::resource('taraf-hesab-benefit', TarafHesabBenefitController::class);

// Warehouse
Route::resource('warehouse-moves', WarehouseMoveController::class);
Route::get('/index-search-warehouse-move', [WarehouseMoveController::class, 'index_search_warehouse_move'])->name('index_search_warehouse_move');
Route::resource('warehouse-moves-detail', WarehouseMoveDetailController::class);
Route::get('fetch-products-according-to-warehouses/{transmitter_id}', [WarehouseMoveDetailController::class, 'fetch_products_according_to_warehouses'])->name('fetch_products_according_to_warehouses');
Route::get('/search-products-according-to-warehouses/{transmitter_id}', [WarehouseMoveDetailController::class, 'search_products_according_to_warehouses'])->name('search_products_according_to_warehouses');
Route::get('/receiver-warehouse-item/{receiver_id}/{product_id}', [WarehouseMoveDetailController::class, 'receiver_warehouse_item'])->name('receiver_warehouse_item');

// Product Warehouse Reports
Route::resource('cardex', CardexController::class);
Route::resource('inventory-products', InventoryProductController::class);
Route::resource('inventory-warehouse', InventoryWarehouseController::class);
Route::resource('ordering-products', OrderingProductController::class);
Route::resource('riali-report', RialiReportController::class);
Route::resource('products-barcode', ProductsBarcodeController::class);

// Financial Management
Route::resource('accounting-documents', AccountingDocumentController::class);
Route::resource('receive-from-the-account', ReceiveFromTheAccountController::class);
Route::get('/index-search-receive-from-the-account', [ReceiveFromTheAccountController::class, 'index_search_receive_from_the_account'])->name('index_search_receive_from_the_account');
Route::resource('payment-to-account', PaymentToAccountController::class);
Route::get('/index-search-payment-to-account', [PaymentToAccountController::class, 'index_search_payment_to_account'])->name('index_search_payment_to_account');
Route::resource('pay', PayController::class);
Route::get('/index-search-pay', [PayController::class, 'index_search_pay'])->name('index_search_pay');
Route::resource('fund-to-bank', FundToBankController::class);
Route::get('/index-search-fund-to-bank', [FundToBankController::class, 'index_search_fund_to_bank'])->name('index_search_fund_to_bank');
Route::resource('bank-to-fund', BankToFundController::class);
Route::get('/index-search-bank-to-fund', [BankToFundController::class, 'index_search_bank_to_fund'])->name('index_search_bank_to_fund');
Route::resource('bank-to-bank', BankToBankController::class);
Route::get('/index-search-bank-to-bank', [BankToBankController::class, 'index_search_bank_to_bank'])->name('index_search_bank_to_bank');
Route::resource('receive-miscellaneous-income', ReceiveMiscellaneousIncomeController::class);
Route::get('/index-search-receive-miscellaneous-income', [ReceiveMiscellaneousIncomeController::class, 'index_search_receive_miscellaneous_income'])->name('index_search_receive_miscellaneous_income');
Route::resource('withdrawal-partner', WithdrawalPartnerController::class);
Route::get('/index-search-withdrawal-partner', [WithdrawalPartnerController::class, 'index_search_withdrawal_partner'])->name('index_search_withdrawal_partner');
Route::resource('investment', InvestmentController::class);
Route::get('/index-search-investment', [InvestmentController::class, 'index_search_investment'])->name('index_search_investment');
Route::resource('transfer-person', TransferPersonController::class);
Route::get('/index-search-transfer-person', [TransferPersonController::class, 'index_search_transfer_person'])->name('index_search_transfer_person');

// First Period
Route::resource('bank-accounts-period', BankAccountsPeriodController::class);
Route::resource('fund-period', FundPeriodController::class);
Route::resource('inventory-products-period', InventoryProductsPeriodController::class);
Route::get('/index-fetch-inventory-products-period', [InventoryProductsPeriodController::class, 'index_fetch_inventory_products_period'])->name('index_fetch_inventory_products_period');
Route::get('/index-search-inventory-products-period', [InventoryProductsPeriodController::class, 'index_search_inventory_products_period'])->name('index_search_inventory_products_period');
Route::resource('pay-cheques', PayChequeController::class);
Route::resource('receive-cheques', ReceiveChequeController::class);
Route::resource('taraf-hesab-period', TarafHesabPeriodController::class);

// Cheque Management
Route::resource('cheque-book', ChequeBookController::class);
Route::get('/index-search-cheque-book', [ChequeBookController::class, 'index_search_cheque_book'])->name('index_search_cheque_book');
Route::resource('cheque-book-report', ChequeBookReportController::class);
Route::resource('circulation-pay-cheque-report', CirculationPayChequeReportController::class);
Route::resource('circulation-receive-cheque', CirculationReceiveChequeController::class);
Route::resource('pay-cheques-report', PayChequesReportController::class);
Route::resource('deposit', DepositController::class);
Route::get('/index-search-deposit', [DepositController::class, 'index_search_deposit'])->name('index_search_deposit');
Route::resource('notification', NotificationController::class);
Route::get('/index-search-notification', [NotificationController::class, 'index_search_notification'])->name('index_search_notification');
Route::resource('manual', ManualController::class);
Route::resource('returning-cheque', ReturningChequeController::class);
Route::get('/index-search-returning-cheque', [ReturningChequeController::class, 'index_search_returning_cheque'])->name('index_search_returning_cheque');
Route::resource('cheque-return', ChequeReturnController::class);
Route::resource('receipt-cheque', ReceiptChequeController::class);
Route::get('/index-search-receipt-cheque', [ReceiptChequeController::class, 'index_search_receipt_cheque'])->name('index_search_receipt_cheque');
Route::resource('pay-returning-cheque', PayReturningChequeController::class);
Route::get('/index-search-pay-returning-cheque', [PayReturningChequeController::class, 'index_search_pay_returning_cheque'])->name('index_search_pay_returning_cheque');
Route::resource('cashing-cheque', CashingChequeController::class);
Route::resource('cancel-cheque', CancelChequeController::class);
Route::resource('announcement', AnnouncementController::class);
Route::resource('spent-cheque', SpentChequeController::class);
Route::resource('receive-cheques-report', ReceiveChequesReportController::class);

// Security
Route::resource('users', UserController::class);
Route::get('/index-search-user', [UserController::class, 'index_search_user'])->name('index_search_user');
Route::resource('profile', ProfileController::class);
Route::post('/ajaxUploadImg', [ProfileController::class, 'imgUploadPost']);
Route::post('/update-password', [ProfileController::class, 'update_password'])->name('update_password');

// Facilities
Route::resource('phone-book', PhoneBookController::class);
Route::get('/index-search-phone-book', [PhoneBookController::class, 'index_search_phone_book'])->name('index_search_phone_book');

// PDF Report Routes
Route::get('/address-print-pdf/{id}', [TarafHesabController::class, 'addressPrintPDF'])->name('addressPrintPDF');
Route::get('/account-group-pdf', [AccountGroupController::class, 'accountGroupPDF'])->name('accountGroupPDF');
Route::get('/account-heading-pdf', [AccountHeadingController::class, 'accountHeadingPDF'])->name('accountHeadingPDF');
Route::get('/kol-pdf', [KolController::class, 'kolPDF'])->name('kolPDF');
Route::get('/moein-pdf', [MoeinController::class, 'moeinPDF'])->name('moeinPDF');
Route::get('/tafsil-pdf', [TafsilController::class, 'tafsilPDF'])->name('tafsilPDF');
Route::get('/arzesh-afzoude-groups-pdf', [ArzeshAfzoudeGroupController::class, 'arzeshAfzoudeGroupsPDF'])->name('arzeshAfzoudeGroupsPDF');
Route::get('/bank-accounts-pdf', [BankAccountController::class, 'bankAccountsPDF'])->name('bankAccountsPDF');
Route::get('/banks-types-pdf', [BankTypeController::class, 'banksTypesPDF'])->name('banksTypesPDF');
Route::get('/cities-pdf', [CityController::class, 'citiesPDF'])->name('citiesPDF');
Route::get('/fund-pdf', [FundController::class, 'fundPDF'])->name('fundPDF');
Route::get('/product-farei-asli-pdf', [ProductFareiAsliController::class, 'productFareiAsliPDF'])->name('productFareiAsliPDF');
Route::get('/product-asli-pdf', [ProductAsliController::class, 'productAsliPDF'])->name('productAsliPDF');
Route::get('/product-farei-pdf', [ProductFareiController::class, 'productFareiPDF'])->name('productFareiPDF');
Route::get('/product-no-unit-pdf', [ProductNoUnitController::class, 'productNoUnitPDF'])->name('productNoUnitPDF');
Route::get('/product-pdf', [ProductController::class, 'productPDF'])->name('productPDF');
Route::get('/service-pdf', [ServiceController::class, 'servicePDF'])->name('servicePDF');
Route::get('/warehouse-pdf', [WarehouseController::class, 'warehousePDF'])->name('warehousePDF');
Route::get('/staff-pdf', [StaffController::class, 'staffPDF'])->name('staffPDF');
Route::get('/taraf-hesab-pdf', [TarafHesabController::class, 'tarafHesabPDF'])->name('tarafHesabPDF');
Route::get('/taraf-hesab-group-pdf', [TarafHesabGroupController::class, 'tarafHesabGroupPDF'])->name('tarafHesabGroupPDF');
Route::get('/benefit-loss-bill-pdf', [BenefitLossBillController::class, 'benefitLossBillPDF'])->name('benefitLossBillPDF');
Route::get('/buy-factor-pdf', [BuyFactorController::class, 'buyFactorPDF'])->name('buyFactorPDF');
Route::get('/return-buy-factor-pdf', [ReturnBuyFactorController::class, 'returnBuyFactorPDF'])->name('returnBuyFactorPDF');
Route::get('/return-sell-factor-pdf', [ReturnSellFactorController::class, 'returnSellFactorPDF'])->name('returnSellFactorPDF');
Route::get('/sell-factor-pdf', [SellFactorController::class, 'sellFactorPDF'])->name('sellFactorPDF');
Route::get('/sell-factor-advanced-pdf', [SellFactorAdvancedController::class, 'sellFactorAdvancedPDF'])->name('sellFactorAdvancedPDF');
Route::get('/ttms-pdf', [TtmsController::class, 'ttmsPDF'])->name('ttmsPDF');
Route::get('/wastage-factor-pdf', [WastageFactorController::class, 'wastageFactorPDF'])->name('wastageFactorPDF');
Route::get('/buy-report-pdf', [BuyReportController::class, 'buyReportPDF'])->name('buyReportPDF');
Route::get('/buy-statistics-report-pdf', [BuyStatisticsReportController::class, 'buyStatisticsReportPDF'])->name('buyStatisticsReportPDF');
Route::get('/factors-types-report-pdf', [FactorsTypesReportController::class, 'factorsTypesReportPDF'])->name('factorsTypesReportPDF');
Route::get('/period-report-pdf', [PeriodReportController::class, 'periodReportPDF'])->name('periodReportPDF');
Route::get('/sell-report-pdf', [SellReportController::class, 'sellReportPDF'])->name('sellReportPDF');
Route::get('/sell-statistics-report-pdf', [SellStatisticsReportController::class, 'sellStatisticsReportPDF'])->name('sellStatisticsReportPDF');
Route::get('/customer-report-pdf', [CustomerReportController::class, 'customerReportPDF'])->name('customerReportPDF');
Route::get('/taraf-hesab-buy-report-pdf', [TarafHesabBuyReportController::class, 'tarafHesabBuyReportPDF'])->name('tarafHesabBuyReportPDF');
Route::get('/factors-benefit-pdf', [FactorsBenefitController::class, 'factorsBenefitPDF'])->name('factorsBenefitPDF');
Route::get('/products-benefit-pdf', [ProductsBenefitController::class, 'productsBenefitPDF'])->name('productsBenefitPDF');
Route::get('/taraf-hesab-benefit-pdf', [TarafHesabBenefitController::class, 'tarafHesabBenefitPDF'])->name('tarafHesabBenefitPDF');
Route::get('/warehouse-moves-pdf', [WarehouseMoveController::class, 'warehouseMovePDF'])->name('warehouseMovePDF');
Route::get('/warehouse-wastage-factor-pdf', [WarehouseWastageFactorController::class, 'warehouseWastageFactorPDF'])->name('warehouseWastageFactorPDF');
Route::get('/cardex-pdf', [CardexController::class, 'cardexPDF'])->name('cardexPDF');
Route::get('/inventory-products-pdf', [InventoryProductController::class, 'inventoryProductPDF'])->name('inventoryProductPDF');
Route::get('/inventory-warehouse-pdf', [InventoryWarehouseController::class, 'inventoryWarehousePDF'])->name('inventoryWarehousePDF');
Route::get('/ordering-products-pdf', [OrderingProductController::class, 'orderingProductPDF'])->name('orderingProductPDF');
Route::get('/riali-report-pdf', [RialiReportController::class, 'rialiReportPDF'])->name('rialiReportPDF');
Route::get('/products-barcode-pdf', [ProductsBarcodeController::class, 'productsBarcodePDF'])->name('productsBarcodePDF');
Route::get('/accounting-documents-pdf', [AccountingDocumentController::class, 'accountingDocumentPDF'])->name('accountingDocumentPDF');
Route::get('/receive-from-the-account-pdf', [ReceiveFromTheAccountController::class, 'receiveFromTheAccountPDF'])->name('receiveFromTheAccountPDF');
Route::get('/payment-to-account-pdf', [PaymentToAccountController::class, 'paymentToAccountPDF'])->name('paymentToAccountPDF');
Route::get('/pay-pdf', [PayController::class, 'payPDF'])->name('payPDF');
Route::get('/fund-to-bank-pdf', [FundToBankController::class, 'fundToBankPDF'])->name('fundToBankPDF');
Route::get('/bank-to-fund-pdf', [BankToFundController::class, 'bankToFundPDF'])->name('bankToFundPDF');
Route::get('/bank-to-bank-pdf', [BankToBankController::class, 'bankToBankPDF'])->name('bankToBankPDF');
Route::get('/receive-miscellaneous-income-pdf', [ReceiveMiscellaneousIncomeController::class, 'receiveMiscellaneousIncomePDF'])->name('receiveMiscellaneousIncomePDF');
Route::get('/withdrawal-partner-pdf', [WithdrawalPartnerController::class, 'withdrawalPartnerPDF'])->name('withdrawalPartnerPDF');
Route::get('/investment-pdf', [InvestmentController::class, 'investmentPDF'])->name('investmentPDF');
Route::get('/transfer-person-pdf', [TransferPersonController::class, 'transferPersonPDF'])->name('transferPersonPDF');
Route::get('/bank-accounts-period-pdf', [BankAccountsPeriodController::class, 'bankAccountsPeriodPDF'])->name('bankAccountsPeriodPDF');
Route::get('/fund-period-pdf', [FundPeriodController::class, 'fundPeriodPDF'])->name('fundPeriodPDF');
Route::get('/inventory-products-period-pdf', [InventoryProductsPeriodController::class, 'inventoryProductsPeriodPDF'])->name('inventoryProductsPeriodPDF');
Route::get('/pay-cheques-pdf', [PayChequeController::class, 'payChequePDF'])->name('payChequePDF');
Route::get('/receive-cheques-pdf', [ReceiveChequeController::class, 'receiveChequePDF'])->name('receiveChequePDF');
Route::get('/taraf-hesab-period-pdf', [TarafHesabPeriodController::class, 'tarafHesabPeriodPDF'])->name('tarafHesabPeriodPDF');
Route::get('/cheque-book-pdf', [ChequeBookController::class, 'chequeBookPDF'])->name('chequeBookPDF');
Route::get('/cheque-book-report-pdf', [ChequeBookReportController::class, 'chequeBookReportPDF'])->name('chequeBookReportPDF');
Route::get('/circulation-pay-cheque-report-pdf', [CirculationPayChequeReportController::class, 'circulationPayChequeReportPDF'])->name('circulationPayChequeReportPDF');
Route::get('/circulation-receive-cheque-pdf', [CirculationReceiveChequeController::class, 'circulationReceiveChequePDF'])->name('circulationReceiveChequePDF');
Route::get('/pay-cheques-report-pdf', [PayChequesReportController::class, 'payChequesReportPDF'])->name('payChequesReportPDF');
Route::get('/deposit-pdf', [DepositController::class, 'depositPDF'])->name('depositPDF');
Route::get('/notification-pdf', [NotificationController::class, 'notificationPDF'])->name('notificationPDF');
Route::get('/manual-pdf', [ManualController::class, 'manualPDF'])->name('manualPDF');
Route::get('/returning-cheque-pdf', [ReturningChequeController::class, 'returningChequePDF'])->name('returningChequePDF');
Route::get('/cheque-return-pdf', [ChequeReturnController::class, 'chequeReturnPDF'])->name('chequeReturnPDF');
Route::get('/receipt-cheque-pdf', [ReceiptChequeController::class, 'receiptChequePDF'])->name('receiptChequePDF');
Route::get('/pay-returning-cheque-pdf', [PayReturningChequeController::class, 'payReturningChequePDF'])->name('payReturningChequePDF');
Route::get('/cashing-cheque-pdf', [CashingChequeController::class, 'cashingChequePDF'])->name('cashingChequePDF');
Route::get('/cancel-cheque-pdf', [CancelChequeController::class, 'cancelChequePDF'])->name('cancelChequePDF');
Route::get('/announcement-pdf', [AnnouncementController::class, 'announcementPDF'])->name('announcementPDF');
Route::get('/spent-cheque-pdf', [SpentChequeController::class, 'spentChequePDF'])->name('spentChequePDF');
Route::get('/receive-cheques-report-pdf', [ReceiveChequesReportController::class, 'receiveChequesReportPDF'])->name('receiveChequesReportPDF');
Route::get('/users-pdf', [UserController::class, 'userPDF'])->name('userPDF');
Route::get('/phone-book-pdf', [PhoneBookController::class, 'phoneBookPDF'])->name('phoneBookPDF');

// CSV Report Routes
Route::get('/city-csv', [CityController::class, 'cityCSV'])->name('cityCSV');

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
