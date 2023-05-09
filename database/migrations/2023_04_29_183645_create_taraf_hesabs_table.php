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
        Schema::create('taraf_hesabs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(); // کد
            $table->string('fullname')->nullable(); // نام و نام خانوادگی
            $table->string('tel')->nullable(); // تلفن
            $table->string('phone')->nullable(); // موبایل
            $table->string('seller')->nullable(); // فروشنده
            $table->string('buyer')->nullable(); // خریدار
            $table->string('middleman')->nullable(); // واسطه
            $table->string('address')->nullable(); // آدرس
            $table->string('active')->nullable(); // فعال
            $table->string('introduce_date')->nullable(); // تاریخ معرفی
            $table->string('national_code')->nullable(); // کد ملی
            $table->string('economic_code')->nullable(); // کد اقتصادی
            $table->string('zip_code')->nullable(); // کد پستی
            $table->string('province')->nullable(); // استان
            $table->string('city')->nullable(); // شهر
            $table->string('broker')->nullable(); // واسطه فروش
            $table->string('commission')->nullable(); // پور سانت
            $table->string('person_type')->nullable(); // نوع شخص
            $table->string('ceo_fullname')->nullable(); // نام مدیر عامل
            $table->string('birthdate')->nullable(); // تاریخ تولد
            $table->string('occupation')->nullable(); // شغل
            $table->string('fax')->nullable(); // فاکس
            $table->string('activity_type')->nullable(); // نوع فعالیت
            $table->string('email')->nullable(); // ایمیل
            $table->string('website')->nullable(); // وب سایت
            $table->string('credit_limit')->nullable(); // سقف اعتبار
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
        Schema::dropIfExists('taraf_hesabs');
    }
};
