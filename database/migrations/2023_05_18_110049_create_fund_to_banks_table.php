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
        Schema::create('fund_to_banks', function (Blueprint $table) {
            $table->id();
            $table->string('form_date')->nullable(); // تاریخ فرم
            $table->string('form_number')->nullable(); // شماره فرم
            $table->string('cash_amount')->nullable(); // مبلغ نقدی
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
        Schema::dropIfExists('fund_to_banks');
    }
};
