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
            $table->string('buyer')->nullable(); // خریدار
            $table->string('factor_no')->nullable(); // شماره فاکتور
            $table->string('factor_date')->nullable(); // تاریخ فاکتور
            $table->string('broker')->nullable(); // واسطه فروش
            $table->string('commission')->nullable(); // پورسانت
            $table->string('amount')->nullable(); // مقدار
            $table->string('discount')->nullable(); // درصد تخفیف
            $table->string('total')->nullable(); // مبلغ کل
            $table->string('warehouse_name')->nullable(); // نام انبار
            $table->string('considerations')->nullable(); // ملاحظات
            $table->string('settlement_deadline')->nullable(); // مهلت تسویه
            $table->string('settlement_date')->nullable(); // تاریخ تسویه
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
