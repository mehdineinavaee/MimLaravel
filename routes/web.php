<?php

use App\Http\Controllers\AccountHeadingController;
use App\Http\Controllers\AccountingDocumentController;
use App\Http\Controllers\ArzeshAfzoudeGroupController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankAccountsPeriodController;
use App\Http\Controllers\BankTypeController;
use App\Http\Controllers\BenefitLossBillController;
use App\Http\Controllers\BuyFactorController;
use App\Http\Controllers\BuyReportController;
use App\Http\Controllers\BuyStatisticsReportController;
use App\Http\Controllers\CardexController;
use App\Http\Controllers\ChequeBookController;
use App\Http\Controllers\ChequeBookReportController;
use App\Http\Controllers\CirculationPayChequeReportController;
use App\Http\Controllers\CirculationReceiveChequeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FactorsBenefitController;
use App\Http\Controllers\FactorsTypesReportController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundPeriodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryProductController;
use App\Http\Controllers\InventoryProductsPeriodController;
use App\Http\Controllers\InventoryWarehouseController;
use App\Http\Controllers\OrderingProductController;
use App\Http\Controllers\PayChequeController;
use App\Http\Controllers\PayChequesOperationController;
use App\Http\Controllers\PayChequesReportController;
use App\Http\Controllers\PeriodReportController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFareiAsliController;
use App\Http\Controllers\ProductNoUnitController;
use App\Http\Controllers\ProductsBarcodeController;
use App\Http\Controllers\ProductsBenefitController;
use App\Http\Controllers\ReceiveChequeController;
use App\Http\Controllers\ReceiveChequesOperationController;
use App\Http\Controllers\ReceiveChequesReportController;
use App\Http\Controllers\ReceivePayController;
use App\Http\Controllers\ReturnBuyFactorController;
use App\Http\Controllers\ReturnSellFactorController;
use App\Http\Controllers\SellFactorAdvancedController;
use App\Http\Controllers\SellFactorController;
use App\Http\Controllers\SellReportController;
use App\Http\Controllers\SellStatisticsReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TarafHesabBenefitController;
use App\Http\Controllers\TarafHesabBuyReportController;
use App\Http\Controllers\TarafHesabController;
use App\Http\Controllers\TarafHesabGroupController;
use App\Http\Controllers\TarafHesabPeriodController;
use App\Http\Controllers\TtmsController;
use App\Http\Controllers\WarehouseMoveController;
use App\Http\Controllers\WarehouseWastageFactorController;
use App\Http\Controllers\WastageFactorController;

// Taarife Payeh
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::resource('account-headings', AccountHeadingController::class);
Route::resource('arzesh-afzoude-groups', ArzeshAfzoudeGroupController::class);
Route::resource('bank-accounts', BankAccountController::class);
Route::resource('banks-types', BankTypeController::class);
Route::resource('cities', CityController::class);
Route::resource('fund', FundController::class);
Route::resource('product-farei-asli', ProductFareiAsliController::class);
Route::resource('product-no-unit', ProductNoUnitController::class);
Route::resource('products', ProductController::class);
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
Route::resource('products-barcode', ProductsBarcodeController::class);

// Financial Management
Route::resource('accounting-documents', AccountingDocumentController::class);
Route::resource('receive-pay', ReceivePayController::class);

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
Route::resource('pay-cheques-operations', PayChequesOperationController::class);
Route::resource('pay-cheques-report', PayChequesReportController::class);
Route::resource('receive-cheques-operations', ReceiveChequesOperationController::class);
Route::resource('receive-cheques-report', ReceiveChequesReportController::class);

// Security
// Route::resource('users', UserController::class);

// Facilities
Route::resource('phone-book', PhoneBookController::class);
