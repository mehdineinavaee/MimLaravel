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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // کد کالا
            $table->string('main_group')->nullable(); // گروه اصلی
            $table->string('sub_group')->nullable(); // گروه فرعی
            $table->string('product_name')->nullable(); // نام کالا
            $table->string('sell_price')->nullable(); // فی فروش
            $table->string('value_added_group')->nullable(); // گروه ارزش افزوده
            $table->string('chk_active')->nullable(); // فعال
            $table->string('introduce_date')->nullable(); // تاریخ معرفی
            $table->string('latest_buy_price')->nullable(); // آخرین قیمت خرید
            $table->string('main_barcode')->nullable(); // بارکد اصلی
            $table->string('order_point')->nullable(); // نقطه سفارش
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
        Schema::dropIfExists('products');
    }
};
