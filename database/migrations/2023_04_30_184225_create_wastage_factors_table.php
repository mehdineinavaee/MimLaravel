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
        Schema::create('wastage_factors', function (Blueprint $table) {
            $table->id();
            $table->string('national_code')->nullable(); // کد ملی
            $table->string('viator')->nullable(); // رهگذر
            $table->string('tel')->nullable(); // تلفن
            $table->string('address')->nullable(); // آدرس
            $table->string('wastage_type'); // نوع ضایعات
            $table->string('customer_type')->nullable(); // نوع مشتری
            $table->string('factor_no'); // شماره فاکتور
            $table->string('factor_date'); // تاریخ فاکتور
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
        Schema::dropIfExists('wastage_factors');
    }
};
