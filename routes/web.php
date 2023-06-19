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
use App\Http\Controllers\ReturningChequeController;
use App\Http\Controllers\ReturnSellFactorController;
use App\Http\Controllers\RialiReportController;
use App\Http\Controllers\SellFactorAdvancedController;
use App\Http\Controllers\SellFactorController;
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
use App\Http\Controllers\WarehouseWastageFactorController;
use App\Http\Controllers\WastageFactorController;
use App\Http\Controllers\WithdrawalPartnerController;

// Taarife Payeh
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::resource('account-group', AccountGroupController::class);
Route::resource('account-headings', AccountHeadingController::class);
Route::resource('kol', KolController::class);
Route::resource('moein', MoeinController::class);
Route::resource('tafsil', TafsilController::class);
Route::resource('arzesh-afzoude-groups', ArzeshAfzoudeGroupController::class);
Route::resource('bank-accounts', BankAccountController::class);
Route::resource('banks-types', BankTypeController::class);
Route::resource('cities', CityController::class);
Route::resource('fund', FundController::class);
Route::resource('product-farei-asli', ProductFareiAsliController::class);
Route::resource('product-asli', ProductAsliController::class);
Route::resource('product-farei', ProductFareiController::class);
Route::resource('product-no-unit', ProductNoUnitController::class);
Route::resource('products', ProductController::class);
Route::resource('services', ServiceController::class);
Route::resource('warehouse', WarehouseController::class);
Route::resource('staff', StaffController::class);
Route::resource('taraf-hesab', TarafHesabController::class);
Route::resource('taraf-hesab-group', TarafHesabGroupController::class);

// Buy Sell
Route::resource('benefit-loss-bill', BenefitLossBillController::class);
Route::resource('buy-factor', BuyFactorController::class);
Route::resource('return-buy-factor', ReturnBuyFactorController::class);
Route::resource('return-sell-factor', ReturnSellFactorController::class);
Route::resource('sell-factor', SellFactorController::class);
Route::get('/fetch-products', [SellFactorController::class, 'fetch_products'])->name('fetch_products');
Route::get('/search', [SellFactorController::class, 'search'])->name('sell-factor.search');
Route::get('/fetch-sell-factor-id/{id}', [SellFactorController::class, 'fetch_sell_factor_id'])->name('fetch_sell_factor_details');
Route::resource('sell-factor-advanced', SellFactorAdvancedController::class);
Route::resource('ttms', TtmsController::class);
Route::resource('wastage-factor', WastageFactorController::class);

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
Route::resource('warehouse-wastage-factor', WarehouseWastageFactorController::class);

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
Route::resource('payment-to-account', PaymentToAccountController::class);
Route::resource('pay', PayController::class);
Route::resource('fund-to-bank', FundToBankController::class);
Route::resource('bank-to-fund', BankToFundController::class);
Route::resource('bank-to-bank', BankToBankController::class);
Route::resource('receive-miscellaneous-income', ReceiveMiscellaneousIncomeController::class);
Route::resource('withdrawal-partner', WithdrawalPartnerController::class);
Route::resource('investment', InvestmentController::class);
Route::resource('transfer-person', TransferPersonController::class);

// First Period
Route::resource('bank-accounts-period', BankAccountsPeriodController::class);
Route::resource('fund-period', FundPeriodController::class);
Route::resource('inventory-products-period', InventoryProductsPeriodController::class);
Route::resource('pay-cheques', PayChequeController::class);
Route::resource('receive-cheques', ReceiveChequeController::class);
Route::resource('taraf-hesab-period', TarafHesabPeriodController::class);

// Cheque Management
Route::resource('cheque-book', ChequeBookController::class);
Route::resource('cheque-book-report', ChequeBookReportController::class);
Route::resource('circulation-pay-cheque-report', CirculationPayChequeReportController::class);
Route::resource('circulation-receive-cheque', CirculationReceiveChequeController::class);
Route::resource('pay-cheques-report', PayChequesReportController::class);
Route::resource('deposit', DepositController::class);
Route::resource('notification', NotificationController::class);
Route::resource('manual', ManualController::class);
Route::resource('returning-cheque', ReturningChequeController::class);
Route::resource('cheque-return', ChequeReturnController::class);
Route::resource('receipt-cheque', ReceiptChequeController::class);
Route::resource('pay-returning-cheque', PayReturningChequeController::class);
Route::resource('cashing-cheque', CashingChequeController::class);
Route::resource('cancel-cheque', CancelChequeController::class);
Route::resource('announcement', AnnouncementController::class);
Route::resource('spent-cheque', SpentChequeController::class);
Route::resource('receive-cheques-report', ReceiveChequesReportController::class);

// Security
Route::resource('users', UserController::class);
Route::resource('profile', ProfileController::class);
Route::post('/ajaxUploadImg', [ProfileController::class, 'imgUploadPost']);
Route::post('/update-password', [ProfileController::class, 'update_password'])->name('update_password');

// Facilities
Route::resource('phone-book', PhoneBookController::class);

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
