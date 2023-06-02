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

// Facilities
Route::resource('phone-book', PhoneBookController::class);

// PDF Report Routes
Route::get('/address-print-pdf/{id}', [TarafHesabController::class, 'addressPrintPDF'])->name('addressPrintPDF');
Route::get('/account-group-pdf', [AccountGroupController::class, 'AccountGroupPDF'])->name('AccountGroupPDF');
Route::get('/account-heading-pdf', [AccountHeadingController::class, 'AccountHeadingPDF'])->name('AccountHeadingPDF');
Route::get('/kol-pdf', [KolController::class, 'KolPDF'])->name('KolPDF');
Route::get('/moein-pdf', [MoeinController::class, 'MoeinPDF'])->name('MoeinPDF');
Route::get('/tafsil-pdf', [TafsilController::class, 'TafsilPDF'])->name('TafsilPDF');
Route::get('/arzesh-afzoude-groups-pdf', [ArzeshAfzoudeGroupController::class, 'ArzeshAfzoudeGroupsPDF'])->name('ArzeshAfzoudeGroupsPDF');
Route::get('/bank-accounts-pdf', [BankAccountController::class, 'BankAccountsPDF'])->name('BankAccountsPDF');
Route::get('/banks-types-pdf', [BankTypeController::class, 'BanksTypesPDF'])->name('BanksTypesPDF');
Route::get('/cities-pdf', [CityController::class, 'CitiesPDF'])->name('CitiesPDF');
Route::get('/fund-pdf', [FundController::class, 'FundPDF'])->name('FundPDF');
Route::get('/product-farei-asli-pdf', [ProductFareiAsliController::class, 'ProductFareiAsliPDF'])->name('ProductFareiAsliPDF');
Route::get('/product-asli-pdf', [ProductAsliController::class, 'ProductAsliPDF'])->name('ProductAsliPDF');
Route::get('/product-farei-pdf', [ProductFareiController::class, 'ProductFareiPDF'])->name('ProductFareiPDF');
Route::get('/product-no-unit-pdf', [ProductNoUnitController::class, 'ProductNoUnitPDF'])->name('ProductNoUnitPDF');
Route::get('/product-pdf', [ProductController::class, 'ProductPDF'])->name('ProductPDF');
Route::get('/service-pdf', [ServiceController::class, 'ServicePDF'])->name('ServicePDF');
Route::get('/warehouse-pdf', [WarehouseController::class, 'WarehousePDF'])->name('WarehousePDF');
Route::get('/staff-pdf', [StaffController::class, 'StaffPDF'])->name('StaffPDF');
Route::get('/taraf-hesab-pdf', [TarafHesabController::class, 'TarafHesabPDF'])->name('TarafHesabPDF');
Route::get('/taraf-hesab-group-pdf', [TarafHesabGroupController::class, 'TarafHesabGroupPDF'])->name('TarafHesabGroupPDF');
Route::get('/benefit-loss-bill-pdf', [BenefitLossBillController::class, 'BenefitLossBillPDF'])->name('BenefitLossBillPDF');
Route::get('/buy-factor-pdf', [BuyFactorController::class, 'BuyFactorPDF'])->name('BuyFactorPDF');
Route::get('/return-buy-factor-pdf', [ReturnBuyFactorController::class, 'ReturnBuyFactorPDF'])->name('ReturnBuyFactorPDF');
Route::get('/return-sell-factor-pdf', [ReturnSellFactorController::class, 'ReturnSellFactorPDF'])->name('ReturnSellFactorPDF');
Route::get('/sell-factor-pdf', [SellFactorController::class, 'SellFactorPDF'])->name('SellFactorPDF');
Route::get('/sell-factor-advanced-pdf', [SellFactorAdvancedController::class, 'SellFactorAdvancedPDF'])->name('SellFactorAdvancedPDF');
Route::get('/ttms-pdf', [TtmsController::class, 'TtmsPDF'])->name('TtmsPDF');
Route::get('/wastage-factor-pdf', [WastageFactorController::class, 'WastageFactorPDF'])->name('WastageFactorPDF');
Route::get('/buy-report-pdf', [BuyReportController::class, 'BuyReportPDF'])->name('BuyReportPDF');
Route::get('/buy-statistics-report-pdf', [BuyStatisticsReportController::class, 'BuyStatisticsReportPDF'])->name('BuyStatisticsReportPDF');
Route::get('/factors-types-report-pdf', [FactorsTypesReportController::class, 'FactorsTypesReportPDF'])->name('FactorsTypesReportPDF');
Route::get('/period-report-pdf', [PeriodReportController::class, 'PeriodReportPDF'])->name('PeriodReportPDF');
Route::get('/sell-report-pdf', [SellReportController::class, 'SellReportPDF'])->name('SellReportPDF');
Route::get('/sell-statistics-report-pdf', [SellStatisticsReportController::class, 'SellStatisticsReportPDF'])->name('SellStatisticsReportPDF');
Route::get('/customer-report-pdf', [CustomerReportController::class, 'CustomerReportPDF'])->name('CustomerReportPDF');
Route::get('/taraf-hesab-buy-report-pdf', [TarafHesabBuyReportController::class, 'TarafHesabBuyReportPDF'])->name('TarafHesabBuyReportPDF');
Route::get('/factors-benefit-pdf', [FactorsBenefitController::class, 'FactorsBenefitPDF'])->name('FactorsBenefitPDF');
Route::get('/products-benefit-pdf', [ProductsBenefitController::class, 'ProductsBenefitPDF'])->name('ProductsBenefitPDF');
Route::get('/taraf-hesab-benefit-pdf', [TarafHesabBenefitController::class, 'TarafHesabBenefitPDF'])->name('TarafHesabBenefitPDF');
Route::get('/warehouse-moves-pdf', [WarehouseMoveController::class, 'WarehouseMovePDF'])->name('WarehouseMovePDF');
Route::get('/warehouse-wastage-factor-pdf', [WarehouseWastageFactorController::class, 'WarehouseWastageFactorPDF'])->name('WarehouseWastageFactorPDF');
Route::get('/cardex-pdf', [CardexController::class, 'CardexPDF'])->name('CardexPDF');
Route::get('/inventory-products-pdf', [InventoryProductController::class, 'InventoryProductPDF'])->name('InventoryProductPDF');
Route::get('/inventory-warehouse-pdf', [InventoryWarehouseController::class, 'InventoryWarehousePDF'])->name('InventoryWarehousePDF');
Route::get('/ordering-products-pdf', [OrderingProductController::class, 'OrderingProductPDF'])->name('OrderingProductPDF');
Route::get('/riali-report-pdf', [RialiReportController::class, 'RialiReportPDF'])->name('RialiReportPDF');
Route::get('/products-barcode-pdf', [ProductsBarcodeController::class, 'ProductsBarcodePDF'])->name('ProductsBarcodePDF');
Route::get('/accounting-documents-pdf', [AccountingDocumentController::class, 'AccountingDocumentPDF'])->name('AccountingDocumentPDF');
Route::get('/receive-from-the-account-pdf', [ReceiveFromTheAccountController::class, 'ReceiveFromTheAccountPDF'])->name('ReceiveFromTheAccountPDF');
Route::get('/payment-to-account-pdf', [PaymentToAccountController::class, 'PaymentToAccountPDF'])->name('PaymentToAccountPDF');
Route::get('/pay-pdf', [PayController::class, 'PayPDF'])->name('PayPDF');
Route::get('/fund-to-bank-pdf', [FundToBankController::class, 'FundToBankPDF'])->name('FundToBankPDF');
Route::get('/bank-to-fund-pdf', [BankToFundController::class, 'BankToFundPDF'])->name('BankToFundPDF');
Route::get('/bank-to-bank-pdf', [BankToBankController::class, 'BankToBankPDF'])->name('BankToBankPDF');
Route::get('/receive-miscellaneous-income-pdf', [ReceiveMiscellaneousIncomeController::class, 'ReceiveMiscellaneousIncomePDF'])->name('ReceiveMiscellaneousIncomePDF');
Route::get('/withdrawal-partner-pdf', [WithdrawalPartnerController::class, 'WithdrawalPartnerPDF'])->name('WithdrawalPartnerPDF');
Route::get('/investment-pdf', [InvestmentController::class, 'InvestmentPDF'])->name('InvestmentPDF');
Route::get('/transfer-person-pdf', [TransferPersonController::class, 'TransferPersonPDF'])->name('TransferPersonPDF');
Route::get('/bank-accounts-period-pdf', [BankAccountsPeriodController::class, 'BankAccountsPeriodPDF'])->name('BankAccountsPeriodPDF');
Route::get('/fund-period-pdf', [FundPeriodController::class, 'FundPeriodPDF'])->name('FundPeriodPDF');
Route::get('/inventory-products-period-pdf', [InventoryProductsPeriodController::class, 'InventoryProductsPeriodPDF'])->name('InventoryProductsPeriodPDF');
Route::get('/pay-cheques-pdf', [PayChequeController::class, 'PayChequePDF'])->name('PayChequePDF');
Route::get('/receive-cheques-pdf', [ReceiveChequeController::class, 'ReceiveChequePDF'])->name('ReceiveChequePDF');
Route::get('/taraf-hesab-period-pdf', [TarafHesabPeriodController::class, 'TarafHesabPeriodPDF'])->name('TarafHesabPeriodPDF');
Route::get('/cheque-book-pdf', [ChequeBookController::class, 'ChequeBookPDF'])->name('ChequeBookPDF');
Route::get('/cheque-book-report-pdf', [ChequeBookReportController::class, 'ChequeBookReportPDF'])->name('ChequeBookReportPDF');
Route::get('/circulation-pay-cheque-report-pdf', [CirculationPayChequeReportController::class, 'CirculationPayChequeReportPDF'])->name('CirculationPayChequeReportPDF');
Route::get('/circulation-receive-cheque-pdf', [CirculationReceiveChequeController::class, 'CirculationReceiveChequePDF'])->name('CirculationReceiveChequePDF');
Route::get('/pay-cheques-report-pdf', [PayChequesReportController::class, 'PayChequesReportPDF'])->name('PayChequesReportPDF');
Route::get('/deposit-pdf', [DepositController::class, 'DepositPDF'])->name('DepositPDF');
Route::get('/notification-pdf', [NotificationController::class, 'NotificationPDF'])->name('NotificationPDF');
Route::get('/manual-pdf', [ManualController::class, 'ManualPDF'])->name('ManualPDF');
Route::get('/returning-cheque-pdf', [ReturningChequeController::class, 'ReturningChequePDF'])->name('ReturningChequePDF');
Route::get('/cheque-return-pdf', [ChequeReturnController::class, 'ChequeReturnPDF'])->name('ChequeReturnPDF');
Route::get('/receipt-cheque-pdf', [ReceiptChequeController::class, 'ReceiptChequePDF'])->name('ReceiptChequePDF');
Route::get('/pay-returning-cheque-pdf', [PayReturningChequeController::class, 'PayReturningChequePDF'])->name('PayReturningChequePDF');
Route::get('/cashing-cheque-pdf', [CashingChequeController::class, 'CashingChequePDF'])->name('CashingChequePDF');
Route::get('/cancel-cheque-pdf', [CancelChequeController::class, 'CancelChequePDF'])->name('CancelChequePDF');
Route::get('/announcement-pdf', [AnnouncementController::class, 'AnnouncementPDF'])->name('AnnouncementPDF');
Route::get('/spent-cheque-pdf', [SpentChequeController::class, 'SpentChequePDF'])->name('SpentChequePDF');
Route::get('/receive-cheques-report-pdf', [ReceiveChequesReportController::class, 'ReceiveChequesReportPDF'])->name('ReceiveChequesReportPDF');
Route::get('/users-pdf', [UserController::class, 'UserPDF'])->name('UserPDF');
Route::get('/phone-book-pdf', [PhoneBookController::class, 'PhoneBookPDF'])->name('PhoneBookPDF');

// CSV Report Routes
Route::get('/city-csv', [CityController::class, 'cityCSV'])->name('cityCSV');
