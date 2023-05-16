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
        Schema::create('sell_factors', function (Blueprint $table) {
            $table->id();
            $table->string('customer_type')->nullable(); // نوع مشتری
            $table->string('fullname')->nullable(); // نام و نام خانوادگی
            $table->string('factor_no')->nullable(); // شماره فاکتور
            $table->string('factor_date')->nullable(); // تاریخ فاکتور
            $table->string('intermediary')->nullable(); // واسطه
            $table->string('commission')->nullable(); // پورسانت
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
        Schema::dropIfExists('sell_factors');
    }
};
