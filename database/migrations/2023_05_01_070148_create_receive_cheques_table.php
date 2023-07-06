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
        Schema::create('receive_cheques', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable(); // مبلغ چک
            $table->string('issue_date')->nullable(); // تاریخ صدور
            $table->string('due_date')->nullable(); // تاریخ سر رسید
            $table->string('serial_number')->nullable(); // شماره سریال چک
            $table->string('bank_name')->nullable(); // نام بانک و شعبه
            $table->string('account_number')->nullable(); // شماره حساب
            $table->string('considerations')->nullable(); // ملاحظات
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
        Schema::dropIfExists('receive_cheques');
    }
};
