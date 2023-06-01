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
        Schema::create('phone_books', function (Blueprint $table) {
            $table->id();
            $table->string('contact')->nullable(); // نام مخاطب
            $table->string('main_contact')->nullable(); // مخاطب اصلی
            $table->string('occupation')->nullable(); // شغل
            $table->string('mobile')->nullable(); // موبایل
            $table->string('fax')->nullable(); // فاکس
            $table->string('tel')->nullable(); // تلفن ها
            $table->string('activity_type')->nullable(); // نوع فعالیت
            $table->string('email')->nullable(); // ایمیل
            $table->string('website')->nullable(); // وب سایت
            $table->string('address')->nullable(); // آدرس
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
        Schema::dropIfExists('phone_books');
    }
};
