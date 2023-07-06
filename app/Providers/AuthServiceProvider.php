<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Start the main menu

        Gate::define('taarife_payeh', function ($user) {
            return $user->role->taraf_hesab === "true"
                || $user->role->taraf_hesab_group === "true"
                || $user->role->staff === "true"
                || $user->role->warehouse === "true"
                || $user->role->product_no_unit === "true"
                || $user->role->product_farei_asli === "true"
                || $user->role->products === "true"
                || $user->role->services === "true"
                || $user->role->arzesh_afzoude_groups === "true"
                || $user->role->banks_types === "true"
                || $user->role->bank_accounts === "true"
                || $user->role->cities === "true"
                || $user->role->fund === "true"
                || $user->role->account_group === "true"
                || $user->role->account_headings === "true";
        });

        Gate::define('buy_sell', function ($user) {
            return $user->role->sell_factor === "true"
                || $user->role->buy_factor === "true"
                || $user->role->return_sell_factor === "true"
                || $user->role->return_buy_factor === "true"
                || $user->role->sell_factor_advanced === "true"
                || $user->role->wastage_factor === "true"
                || $user->role->benefit_loss_bill === "true"
                || $user->role->ttms === "true";
        });

        Gate::define('buy_sell_reports', function ($user) {
            return $user->role->factors_types_report === "true"
                || $user->role->period_report === "true"
                || $user->role->sell_report === "true"
                || $user->role->sell_statistics_report === "true"
                || $user->role->customer_report === "true"
                || $user->role->buy_report === "true"
                || $user->role->buy_statistics_report === "true"
                || $user->role->taraf_hesab_buy_report === "true";
        });

        Gate::define('benefit_report', function ($user) {
            return $user->role->products_benefit === "true"
                || $user->role->factors_benefit === "true"
                || $user->role->taraf_hesab_benefit === "true";
        });

        Gate::define('warehouse_menu', function ($user) {
            return $user->role->warehouse_moves === "true";
        });

        Gate::define('product_warehouse_reports', function ($user) {
            return $user->role->riali_report === "true"
                || $user->role->products_barcode === "true"
                || $user->role->cardex === "true"
                || $user->role->inventory_warehouse === "true"
                || $user->role->inventory_products === "true"
                || $user->role->ordering_products === "true";
        });

        Gate::define('financial_management', function ($user) {
            return $user->role->accounting_documents === "true";
        });

        Gate::define('receive_payment', function ($user) {
            return $user->role->receive_from_the_account === "true"
                || $user->role->payment_to_account === "true"
                || $user->role->pay === "true"
                || $user->role->fund_to_bank === "true"
                || $user->role->bank_to_fund === "true"
                || $user->role->bank_to_bank === "true"
                || $user->role->receive_miscellaneous_income === "true"
                || $user->role->withdrawal_partner === "true"
                || $user->role->investment === "true"
                || $user->role->transfer_person === "true";
        });

        Gate::define('first_period', function ($user) {
            return $user->role->fund_period === "true"
                || $user->role->bank_accounts_period === "true"
                || $user->role->taraf_hesab_period === "true"
                || $user->role->receive_cheques === "true"
                || $user->role->pay_cheques === "true"
                || $user->role->inventory_products_period === "true";
        });

        Gate::define('cheque_management', function ($user) {
            return $user->role->cheque_book === "true"
                || $user->role->cheque_book_report === "true"
                || $user->role->receive_cheques_report === "true"
                || $user->role->pay_cheques_report === "true"
                || $user->role->circulation_receive_cheque === "true"
                || $user->role->circulation_pay_cheque_report === "true";
        });

        Gate::define('receive_cheques_operations', function ($user) {
            return $user->role->deposit === "true"
                || $user->role->notification === "true"
                || $user->role->manual === "true"
                || $user->role->returning_cheque === "true"
                || $user->role->announcement === "true"
                || $user->role->spent_cheque === "true"
                || $user->role->cheque_return === "true";
        });

        Gate::define('payment_cheques_operations', function ($user) {
            return $user->role->receipt_cheque === "true"
                || $user->role->pay_returning_cheque === "true"
                || $user->role->cashing_cheque === "true"
                || $user->role->cancel_cheque === "true";
        });

        Gate::define('security', function ($user) {
            return $user->role->users === "true"
                || $user->role->profile === "true"
                || $user->role->roles === "true";
        });

        Gate::define('facilities', function ($user) {
            return $user->role->facilities === "true";
        });

        // End the main menu

        Gate::define('taraf_hesab', function ($user) {
            return $user->role->taraf_hesab === "true";
        });

        Gate::define('taraf_hesab_group', function ($user) {
            return $user->role->taraf_hesab_group === "true";
        });

        Gate::define('staff', function ($user) {
            return $user->role->staff === "true";
        });

        Gate::define('warehouse', function ($user) {
            return $user->role->warehouse === "true";
        });

        Gate::define('product_no_unit', function ($user) {
            return $user->role->product_no_unit === "true";
        });

        Gate::define('product_farei_asli', function ($user) {
            return $user->role->product_farei_asli === "true";
        });

        Gate::define('products', function ($user) {
            return $user->role->products === "true";
        });

        Gate::define('services', function ($user) {
            return $user->role->services === "true";
        });

        Gate::define('arzesh_afzoude_groups', function ($user) {
            return $user->role->arzesh_afzoude_groups === "true";
        });

        Gate::define('banks_types', function ($user) {
            return $user->role->banks_types === "true";
        });

        Gate::define('bank_accounts', function ($user) {
            return $user->role->bank_accounts === "true";
        });

        Gate::define('cities', function ($user) {
            return $user->role->cities === "true";
        });

        Gate::define('fund', function ($user) {
            return $user->role->fund === "true";
        });

        Gate::define('account_group', function ($user) {
            return $user->role->account_group === "true";
        });

        Gate::define('account_headings', function ($user) {
            return $user->role->account_headings === "true";
        });

        Gate::define('sell_factor', function ($user) {
            return $user->role->sell_factor === "true";
        });

        Gate::define('buy_factor', function ($user) {
            return $user->role->buy_factor === "true";
        });

        Gate::define('return_sell_factor', function ($user) {
            return $user->role->return_sell_factor === "true";
        });

        Gate::define('return_buy_factor', function ($user) {
            return $user->role->return_buy_factor === "true";
        });

        Gate::define('sell_factor_advanced', function ($user) {
            return $user->role->sell_factor_advanced === "true";
        });

        Gate::define('wastage_factor', function ($user) {
            return $user->role->wastage_factor === "true";
        });

        Gate::define('benefit_loss_bill', function ($user) {
            return $user->role->benefit_loss_bill === "true";
        });

        Gate::define('ttms', function ($user) {
            return $user->role->ttms === "true";
        });

        Gate::define('factors_types_report', function ($user) {
            return $user->role->factors_types_report === "true";
        });

        Gate::define('period_report', function ($user) {
            return $user->role->period_report === "true";
        });

        Gate::define('sell_report', function ($user) {
            return $user->role->sell_report === "true";
        });

        Gate::define('sell_statistics_report', function ($user) {
            return $user->role->sell_statistics_report === "true";
        });

        Gate::define('customer_report', function ($user) {
            return $user->role->customer_report === "true";
        });

        Gate::define('buy_report', function ($user) {
            return $user->role->buy_report === "true";
        });

        Gate::define('buy_statistics_report', function ($user) {
            return $user->role->buy_statistics_report === "true";
        });

        Gate::define('taraf_hesab_buy_report', function ($user) {
            return $user->role->taraf_hesab_buy_report === "true";
        });

        Gate::define('products_benefit', function ($user) {
            return $user->role->products_benefit === "true";
        });

        Gate::define('factors_benefit', function ($user) {
            return $user->role->factors_benefit === "true";
        });

        Gate::define('taraf_hesab_benefit', function ($user) {
            return $user->role->taraf_hesab_benefit === "true";
        });

        Gate::define('warehouse_moves', function ($user) {
            return $user->role->warehouse_moves === "true";
        });

        Gate::define('riali_report', function ($user) {
            return $user->role->riali_report === "true";
        });

        Gate::define('products_barcode', function ($user) {
            return $user->role->products_barcode === "true";
        });

        Gate::define('cardex', function ($user) {
            return $user->role->cardex === "true";
        });

        Gate::define('inventory_warehouse', function ($user) {
            return $user->role->inventory_warehouse === "true";
        });

        Gate::define('inventory_products', function ($user) {
            return $user->role->inventory_products === "true";
        });

        Gate::define('ordering_products', function ($user) {
            return $user->role->ordering_products === "true";
        });

        Gate::define('accounting_documents', function ($user) {
            return $user->role->accounting_documents === "true";
        });

        Gate::define('receive_from_the_account', function ($user) {
            return $user->role->receive_from_the_account === "true";
        });

        Gate::define('payment_to_account', function ($user) {
            return $user->role->payment_to_account === "true";
        });

        Gate::define('pay', function ($user) {
            return $user->role->pay === "true";
        });

        Gate::define('fund_to_bank', function ($user) {
            return $user->role->fund_to_bank === "true";
        });

        Gate::define('bank_to_fund', function ($user) {
            return $user->role->bank_to_fund === "true";
        });

        Gate::define('bank_to_bank', function ($user) {
            return $user->role->bank_to_bank === "true";
        });

        Gate::define('receive_miscellaneous_income', function ($user) {
            return $user->role->receive_miscellaneous_income === "true";
        });

        Gate::define('withdrawal_partner', function ($user) {
            return $user->role->withdrawal_partner === "true";
        });

        Gate::define('investment', function ($user) {
            return $user->role->investment === "true";
        });

        Gate::define('transfer_person', function ($user) {
            return $user->role->transfer_person === "true";
        });

        Gate::define('fund_period', function ($user) {
            return $user->role->fund_period === "true";
        });

        Gate::define('bank_accounts_period', function ($user) {
            return $user->role->bank_accounts_period === "true";
        });

        Gate::define('taraf_hesab_period', function ($user) {
            return $user->role->taraf_hesab_period === "true";
        });

        Gate::define('receive_cheques', function ($user) {
            return $user->role->receive_cheques === "true";
        });

        Gate::define('pay_cheques', function ($user) {
            return $user->role->pay_cheques === "true";
        });

        Gate::define('inventory_products_period', function ($user) {
            return $user->role->inventory_products_period === "true";
        });

        Gate::define('cheque_book', function ($user) {
            return $user->role->cheque_book === "true";
        });

        Gate::define('cheque_book_report', function ($user) {
            return $user->role->cheque_book_report === "true";
        });

        Gate::define('receive_cheques_report', function ($user) {
            return $user->role->receive_cheques_report === "true";
        });

        Gate::define('pay_cheques_report', function ($user) {
            return $user->role->pay_cheques_report === "true";
        });

        Gate::define('circulation_receive_cheque', function ($user) {
            return $user->role->circulation_receive_cheque === "true";
        });

        Gate::define('circulation_pay_cheque_report', function ($user) {
            return $user->role->circulation_pay_cheque_report === "true";
        });

        Gate::define('deposit', function ($user) {
            return $user->role->deposit === "true";
        });

        Gate::define('notification', function ($user) {
            return $user->role->notification === "true";
        });

        Gate::define('manual', function ($user) {
            return $user->role->manual === "true";
        });

        Gate::define('returning_cheque', function ($user) {
            return $user->role->returning_cheque === "true";
        });

        Gate::define('announcement', function ($user) {
            return $user->role->announcement === "true";
        });

        Gate::define('spent_cheque', function ($user) {
            return $user->role->spent_cheque === "true";
        });

        Gate::define('cheque_return', function ($user) {
            return $user->role->cheque_return === "true";
        });

        Gate::define('receipt_cheque', function ($user) {
            return $user->role->receipt_cheque === "true";
        });

        Gate::define('pay_returning_cheque', function ($user) {
            return $user->role->pay_returning_cheque === "true";
        });

        Gate::define('cashing_cheque', function ($user) {
            return $user->role->cashing_cheque === "true";
        });

        Gate::define('cancel_cheque', function ($user) {
            return $user->role->cancel_cheque === "true";
        });

        Gate::define('users', function ($user) {
            return $user->role->users === "true";
        });

        Gate::define('profile', function ($user) {
            return $user->role->profile === "true";
        });

        Gate::define('roles', function ($user) {
            return $user->role->roles === "true";
        });

        Gate::define('phone_book', function ($user) {
            return $user->role->phone_book === "true";
        });
    }
}
