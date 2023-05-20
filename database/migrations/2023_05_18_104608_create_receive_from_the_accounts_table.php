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
        Schema::create('receive_from_the_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('taraf_hesab_name')->nullable(); // نام طرف حساب
            $table->string('form_date')->nullable(); // تاریخ فرم
            $table->string('form_number')->nullable(); // شماره فرم
            $table->string('cash_amount')->nullable(); // مبلغ نقدی
            $table->string('considerations1')->nullable(); // ملاحظات
            $table->string('date')->nullable(); // تاریخ
            $table->string('bank_account_details')->nullable(); // مشخصات حساب بانکی
            $table->string('deposit_amount')->nullable(); // مبلغ واریزی
            $table->string('wage')->nullable(); // کارمزد
            $table->string('issue_tracking')->nullable(); // شماره پیگیری
            $table->string('considerations2')->nullable(); // ملاحظات
            $table->string('paid_discount')->nullable(); // تخفیف پرداختی
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
        Schema::dropIfExists('receive_from_the_accounts');
    }
};
