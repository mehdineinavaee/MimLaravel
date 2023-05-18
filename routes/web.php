<?php

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
use App\Http\Controllers\CardexController;
use App\Http\Controllers\ChequeBookController;
use App\Http\Controllers\ChequeBookReportController;
use App\Http\Controllers\ChequeReturnController;
use App\Http\Controllers\CirculationPayChequeReportController;
use App\Http\Controllers\CirculationReceiveChequeController;
use App\Http\Controllers\CityController;
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
use App\Http\Controllers\ManualController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderingProductController;
use App\Http\Controllers\PayChequeController;
use App\Http\Controllers\PayChequesOperationController;
use App\Http\Controllers\PayChequesReportController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentToAccountController;
use App\Http\Controllers\PeriodReportController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFareiAsliController;
use App\Http\Controllers\ProductNoUnitController;
use App\Http\Controllers\ProductsBarcodeController;
use App\Http\Controllers\ProductsBenefitController;
use App\Http\Controllers\ReceiveChequeController;
use App\Http\Controllers\ReceiveChequesReportController;
use App\Http\Controllers\ReceiveFromTheAccountController;
use App\Http\Controllers\ReceiveMiscellaneousIncomeController;
use App\Http\Controllers\ReturnBuyFactorController;
use App\Http\Controllers\ReturningChequeController;
use App\Http\Controllers\ReturnSellFactorController;
use App\Http\Controllers\SellFactorAdvancedController;
use App\Http\Controllers\SellFactorController;
use App\Http\Controllers\SellReportController;
use App\Http\Controllers\SellStatisticsReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpentChequeController;
use App\Http\Controllers\StaffController;
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
Route::resource('account-headings', AccountHeadingController::class);
Route::resource('arzesh-afzoude-groups', ArzeshAfzoudeGroupController::class);
Route::resource('bank-accounts', BankAccountController::class);
Route::resource('banks-types', BankTypeController::class);
Route::resource('cities', CityController::class);
Route::resource('fund', FundController::class);
Route::resource('product-farei-asli', ProductFareiAsliController::class);
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
Route::resource('pay-cheques-operations', PayChequesOperationController::class);
Route::resource('pay-cheques-report', PayChequesReportController::class);
Route::resource('deposit', DepositController::class);
Route::resource('notification', NotificationController::class);
Route::resource('manual', ManualController::class);
Route::resource('returning-cheque', ReturningChequeController::class);
Route::resource('cheque-return', ChequeReturnController::class);
Route::resource('announcement', AnnouncementController::class);
Route::resource('spent-cheque', SpentChequeController::class);
Route::resource('receive-cheques-report', ReceiveChequesReportController::class);

// Security
Route::resource('users', UserController::class);

// Facilities
Route::resource('phone-book', PhoneBookController::class);

// Fetch Routes
Route::get('fetch-account-heading', [AccountHeadingController::class, 'fetchAccountHeading']);
Route::get('fetch-arzesh-afzoude-groups', [ArzeshAfzoudeGroupController::class, 'fetchArzeshAfzoudeGroups']);
Route::get('fetch-bank-accounts', [BankAccountController::class, 'fetchBankAccounts']);
Route::get('fetch-banks-types', [BankTypeController::class, 'fetchBanksTypes']);
Route::get('fetch-cities', [CityController::class, 'fetchCities']);
Route::get('fetch-fund', [FundController::class, 'fetchFund']);
Route::get('fetch-product-farei-asli', [ProductFareiAsliController::class, 'fetchProductFareiAsli']);
Route::get('fetch-product-no-unit', [ProductNoUnitController::class, 'fetchProductNoUnit']);
Route::get('fetch-product', [ProductController::class, 'fetchProduct']);
Route::get('fetch-service', [ServiceController::class, 'fetchService']);
Route::get('fetch-warehouse', [WarehouseController::class, 'fetchWarehouse']);
Route::get('fetch-staff', [StaffController::class, 'fetchStaff']);
Route::get('fetch-taraf-hesab', [TarafHesabController::class, 'fetchTarafHesab']);
Route::get('fetch-benefit-loss-bill', [BenefitLossBillController::class, 'fetchBenefitLossBill']);
Route::get('fetch-buy-factor', [BuyFactorController::class, 'fetchBuyFactor']);
Route::get('fetch-return-buy-factor', [ReturnBuyFactorController::class, 'fetchReturnBuyFactor']);
Route::get('fetch-return-sell-factor', [ReturnSellFactorController::class, 'fetchReturnSellFactor']);
Route::get('fetch-sell-factor', [SellFactorController::class, 'fetchSellFactor']);
Route::get('fetch-sell-factor-advanced', [SellFactorAdvancedController::class, 'fetchSellFactorAdvanced']);
Route::get('fetch-ttms', [TtmsController::class, 'fetchTtms']);
Route::get('fetch-wastage-factor', [WastageFactorController::class, 'fetchWastageFactor']);
Route::get('fetch-buy-report', [BuyReportController::class, 'fetchBuyReport']);
Route::get('fetch-buy-statistics-report', [BuyStatisticsReportController::class, 'fetchBuyStatisticsReport']);
Route::get('fetch-factors-types-report', [FactorsTypesReportController::class, 'fetchFactorsTypesReport']);
Route::get('fetch-period-report', [PeriodReportController::class, 'fetchPeriodReport']);
Route::get('fetch-sell-report', [SellReportController::class, 'fetchSellReport']);
Route::get('fetch-sell-statistics-report', [SellStatisticsReportController::class, 'fetchSellStatisticsReport']);
Route::get('fetch-taraf-hesab-buy-report', [TarafHesabBuyReportController::class, 'fetchTarafHesabBuyReport']);
Route::get('fetch-factors-benefit', [FactorsBenefitController::class, 'fetchFactorsBenefit']);
Route::get('fetch-products-benefit', [ProductsBenefitController::class, 'fetchProductsBenefit']);
Route::get('fetch-taraf-hesab-benefit', [TarafHesabBenefitController::class, 'fetchTarafHesabBenefit']);
Route::get('fetch-warehouse-moves', [WarehouseMoveController::class, 'fetchWarehouseMove']);
Route::get('fetch-warehouse-wastage-factor', [WarehouseWastageFactorController::class, 'fetchWarehouseWastageFactor']);
Route::get('fetch-cardex', [CardexController::class, 'fetchCardex']);
Route::get('fetch-inventory-products', [InventoryProductController::class, 'fetchInventoryProduct']);
Route::get('fetch-inventory-warehouse', [InventoryWarehouseController::class, 'fetchInventoryWarehouse']);
Route::get('fetch-ordering-products', [OrderingProductController::class, 'fetchOrderingProduct']);
Route::get('fetch-products-barcode', [ProductsBarcodeController::class, 'fetchProductsBarcode']);
Route::get('fetch-accounting-documents', [AccountingDocumentController::class, 'fetchAccountingDocument']);
Route::get('fetch-receive-from-the-account', [ReceiveFromTheAccountController::class, 'fetchReceiveFromTheAccount']);
Route::get('fetch-payment-to-account', [PaymentToAccountController::class, 'fetchPaymentToAccount']);
Route::get('fetch-pay', [PayController::class, 'fetchPay']);
Route::get('fetch-fund-to-bank', [FundToBankController::class, 'fetchFundToBank']);
Route::get('fetch-bank-to-fund', [BankToFundController::class, 'fetchBankToFund']);
Route::get('fetch-bank-to-bank', [BankToBankController::class, 'fetchBankToBank']);
Route::get('fetch-receive-miscellaneous-income', [ReceiveMiscellaneousIncomeController::class, 'fetchReceiveMiscellaneousIncome']);
Route::get('fetch-withdrawal-partner', [WithdrawalPartnerController::class, 'fetchWithdrawalPartner']);
Route::get('fetch-investment', [InvestmentController::class, 'fetchInvestment']);
Route::get('fetch-transfer-person', [TransferPersonController::class, 'fetchTransferPerson']);
Route::get('fetch-bank-accounts-period', [BankAccountsPeriodController::class, 'fetchBankAccountsPeriod']);
Route::get('fetch-fund-period', [FundPeriodController::class, 'fetchFundPeriod']);
Route::get('fetch-inventory-products-period', [InventoryProductsPeriodController::class, 'fetchInventoryProductsPeriod']);
Route::get('fetch-pay-cheques', [PayChequeController::class, 'fetchPayCheque']);
Route::get('fetch-receive-cheques', [ReceiveChequeController::class, 'fetchReceiveCheque']);
Route::get('fetch-taraf-hesab-period', [TarafHesabPeriodController::class, 'fetchTarafHesabPeriod']);
Route::get('fetch-cheque-book', [ChequeBookController::class, 'fetchChequeBook']);
Route::get('fetch-cheque-book-report', [ChequeBookReportController::class, 'fetchChequeBookReport']);
Route::get('fetch-circulation-pay-cheque-report', [CirculationPayChequeReportController::class, 'fetchCirculationPayChequeReport']);
Route::get('fetch-circulation-receive-cheque', [CirculationReceiveChequeController::class, 'fetchCirculationReceiveCheque']);
Route::get('fetch-pay-cheques-operations', [PayChequesOperationController::class, 'fetchPayChequesOperation']);
Route::get('fetch-pay-cheques-report', [PayChequesReportController::class, 'fetchPayChequesReport']);
Route::get('fetch-deposit', [DepositController::class, 'fetchDeposit']);
Route::get('fetch-notification', [NotificationController::class, 'fetchNotification']);
Route::get('fetch-manual', [ManualController::class, 'fetchManual']);
Route::get('fetch-returning-cheque', [ReturningChequeController::class, 'fetchReturningCheque']);
Route::get('fetch-cheque-return', [ChequeReturnController::class, 'fetchChequeReturn']);
Route::get('fetch-announcement', [AnnouncementController::class, 'fetchAnnouncement']);
Route::get('fetch-spent-cheque', [SpentChequeController::class, 'fetchSpentCheque']);
Route::get('fetch-receive-cheques-report', [ReceiveChequesReportController::class, 'fetchReceiveChequesReport']);
Route::get('fetch-users', [UserController::class, 'fetchUser']);
Route::get('fetch-phone-book', [PhoneBookController::class, 'fetchPhoneBook']);
