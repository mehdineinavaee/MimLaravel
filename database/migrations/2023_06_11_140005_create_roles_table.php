<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');

            $table->string('checked_all', 5)->nullable();

            $table->string('taarife_payeh', 5)->nullable();
            $table->string('buy_sell', 5)->nullable();
            $table->string('buy_sell_reports', 5)->nullable();
            $table->string('benefit_report', 5)->nullable();
            $table->string('warehouse_menu', 5)->nullable();
            $table->string('product_warehouse_reports', 5)->nullable();
            $table->string('financial_management', 5)->nullable();
            $table->string('receive_payment', 5)->nullable();
            $table->string('first_period', 5)->nullable();
            $table->string('cheque_management', 5)->nullable();
            $table->string('receive_cheques_operations', 5)->nullable();
            $table->string('payment_cheques_operations', 5)->nullable();
            $table->string('security', 5)->nullable();
            $table->string('facilities', 5)->nullable();

            $table->string('taraf_hesab', 5)->nullable();
            $table->string('taraf_hesab_group', 5)->nullable();
            $table->string('staff', 5)->nullable();
            $table->string('warehouse', 5)->nullable();
            $table->string('product_no_unit', 5)->nullable();
            $table->string('product_farei_asli', 5)->nullable();
            $table->string('products', 5)->nullable();
            $table->string('services', 5)->nullable();
            $table->string('arzesh_afzoude_groups', 5)->nullable();
            $table->string('banks_types', 5)->nullable();
            $table->string('bank_accounts', 5)->nullable();
            $table->string('cities', 5)->nullable();
            $table->string('fund', 5)->nullable();
            $table->string('account_group', 5)->nullable();
            $table->string('account_headings', 5)->nullable();
            $table->string('sell_factor', 5)->nullable();
            $table->string('buy_factor', 5)->nullable();
            $table->string('return_sell_factor', 5)->nullable();
            $table->string('return_buy_factor', 5)->nullable();
            $table->string('sell_factor_advanced', 5)->nullable();
            $table->string('wastage_factor', 5)->nullable();
            $table->string('benefit_loss_bill', 5)->nullable();
            $table->string('ttms', 5)->nullable();
            $table->string('factors_types_report', 5)->nullable();
            $table->string('period_report', 5)->nullable();
            $table->string('sell_report', 5)->nullable();
            $table->string('sell_statistics_report', 5)->nullable();
            $table->string('customer_report', 5)->nullable();
            $table->string('buy_report', 5)->nullable();
            $table->string('buy_statistics_report', 5)->nullable();
            $table->string('taraf_hesab_buy_report', 5)->nullable();
            $table->string('products_benefit', 5)->nullable();
            $table->string('factors_benefit', 5)->nullable();
            $table->string('taraf_hesab_benefit', 5)->nullable();
            $table->string('warehouse_moves', 5)->nullable();
            $table->string('riali_report', 5)->nullable();
            $table->string('products_barcode', 5)->nullable();
            $table->string('cardex', 5)->nullable();
            $table->string('inventory_warehouse', 5)->nullable();
            $table->string('inventory_products', 5)->nullable();
            $table->string('ordering_products', 5)->nullable();
            $table->string('accounting_documents', 5)->nullable();
            $table->string('receive_from_the_account', 5)->nullable();
            $table->string('payment_to_account', 5)->nullable();
            $table->string('pay', 5)->nullable();
            $table->string('fund_to_bank', 5)->nullable();
            $table->string('bank_to_fund', 5)->nullable();
            $table->string('bank_to_bank', 5)->nullable();
            $table->string('receive_miscellaneous_income', 5)->nullable();
            $table->string('withdrawal_partner', 5)->nullable();
            $table->string('investment', 5)->nullable();
            $table->string('transfer_person', 5)->nullable();
            $table->string('fund_period', 5)->nullable();
            $table->string('bank_accounts_period', 5)->nullable();
            $table->string('taraf_hesab_period', 5)->nullable();
            $table->string('receive_cheques', 5)->nullable();
            $table->string('pay_cheques', 5)->nullable();
            $table->string('inventory_products_period')->nullable();
            $table->string('cheque_book', 5)->nullable();
            $table->string('cheque_book_report', 5)->nullable();
            $table->string('receive_cheques_report', 5)->nullable();
            $table->string('pay_cheques_report', 5)->nullable();
            $table->string('circulation_receive_cheque', 5)->nullable();
            $table->string('circulation_pay_cheque_report', 5)->nullable();
            $table->string('deposit', 5)->nullable();
            $table->string('notification', 5)->nullable();
            $table->string('manual', 5)->nullable();
            $table->string('returning_cheque', 5)->nullable();
            $table->string('announcement', 5)->nullable();
            $table->string('spent_cheque', 5)->nullable();
            $table->string('cheque_return', 5)->nullable();
            $table->string('receipt_cheque', 5)->nullable();
            $table->string('pay_returning_cheque', 5)->nullable();
            $table->string('cashing_cheque', 5)->nullable();
            $table->string('cancel_cheque', 5)->nullable();
            $table->string('users', 5)->nullable();
            $table->string('profile', 5)->nullable();
            $table->string('roles', 5)->nullable();
            $table->string('phone_book', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
