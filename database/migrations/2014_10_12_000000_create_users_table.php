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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('chk_messenger')->nullable(); // پیک
            $table->string('cover')->nullable(); // تصویر کاربر
            $table->string('national_code')->nullable(); // شماره شناسنامه
            $table->string('first_name'); // نام
            $table->string('last_name'); // نام خانوادگی
            $table->string('father')->nullable(); // نام پدر
            $table->string('opt_sex')->nullable(); // جنسیت
            $table->string('birthdate')->nullable(); // تاریخ تولد
            $table->string('occupation')->nullable(); // شغل
            $table->string('email')->unique(); // ایمیل
            $table->timestamp('email_verified_at')->nullable(); // تأییدیه ایمیل
            $table->string('password'); // رمز عبور
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
