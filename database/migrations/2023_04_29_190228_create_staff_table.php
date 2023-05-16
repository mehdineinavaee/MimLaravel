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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('chk_messenger')->nullable(); // پیک
            $table->string('opt_sex')->nullable(); // جنسیت
            $table->string('first_name')->nullable(); // نام
            $table->string('last_name')->nullable(); // نام خانوادگی
            $table->string('father')->nullable(); // نام پدر
            $table->string('birthdate')->nullable(); // تاریخ تولد
            $table->string('national_code')->nullable(); // شماره شناسنامه
            $table->string('occupation')->nullable(); // شغل
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
        Schema::dropIfExists('staff');
    }
};
