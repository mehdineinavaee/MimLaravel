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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('account_type')->nullable(); // نوع حساب
            $table->string('account_number')->nullable(); // شماره حساب
            $table->string('shaba_number')->nullable(); // شماره شبا
            $table->string('cart_number')->nullable(); // شماره کارت
            $table->string('branch_name')->nullable(); // نام شعبه
            $table->string('branch_address')->nullable(); // آدرس شعبه
            $table->string('cheque_print_type')->nullable(); // نوع چاپ چک
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
        Schema::dropIfExists('bank_accounts');
    }
};
