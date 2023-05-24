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
        Schema::create('pay_returning_cheques', function (Blueprint $table) {
            $table->id();
            $table->string('form_date'); // تاریخ فرم
            $table->string('form_number')->nullable(); // شماره فرم
            $table->string('serial_number'); // شماره سریال چک
            $table->string('total'); // مبلغ چک
            $table->string('wage'); // کارمزد
            $table->string('due_date'); // سر رسید
            $table->string('bank_account_details'); // مشخصات حساب بانکی
            $table->string('receiver'); // دریافت کننده
            $table->string('considerations'); // ملاحظات
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
        Schema::dropIfExists('pay_returning_cheques');
    }
};
