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
        Schema::create('transfer_people', function (Blueprint $table) {
            $table->id();
            $table->string('from_taraf_hesab')->nullable(); // از طرف حساب
            $table->string('to_taraf_hesab')->nullable(); // به طرف حساب
            $table->string('form_date')->nullable(); // تاریخ فرم
            $table->string('form_number')->nullable(); // شماره فرم
            $table->string('cash_amount')->nullable(); // مبلغ نقدی
            $table->string('considerations')->nullable(); // شرح سند
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
        Schema::dropIfExists('transfer_people');
    }
};
