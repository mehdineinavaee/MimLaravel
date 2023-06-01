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
            $table->string('chk_seller')->nullable(); // فروشنده
            $table->string('chk_buyer')->nullable(); // خریدار
            $table->string('chk_broker')->nullable(); // واسطه فروش
            $table->string('chk_investor')->nullable(); // سرمایه گذار
            $table->string('chk_block_list')->nullable(); // بد حساب (لیست سیاه)
            $table->string('chk_active')->nullable(); // فعال
            $table->string('chk_move_phone')->nullable(); // انتقال به دفترچه تلفن
            $table->string('code'); // کد
            $table->string('fullname')->nullable(); // نام و نام خانوادگی
            $table->string('zip_code')->nullable(); // کد پستی
            $table->string('phone'); // موبایل
            // city_id رابطه با جدول شهرها
            $table->string('broker')->nullable(); // واسطه فروش
            $table->string('commission')->nullable(); // پور سانت
            $table->string('address')->nullable(); // آدرس
            $table->string('person_type')->nullable(); // نوع شخص
            $table->string('ceo_fullname')->nullable(); // نام مدیر عامل
            $table->string('national_code')->nullable(); // کد ملی
            $table->string('birthdate')->nullable(); // تاریخ تولد
            $table->string('occupation')->nullable(); // شغل
            $table->string('fax')->nullable(); // فاکس
            $table->string('tel')->nullable(); // تلفن
            $table->string('activity_type')->nullable(); // نوع فعالیت
            $table->string('economic_code')->nullable(); // کد اقتصادی
            $table->string('email')->nullable(); // ایمیل
            $table->string('website')->nullable(); // وب سایت
            $table->string('credit_limit')->nullable(); // سقف اعتبار
            $table->string('opt_warning')->nullable(); // فقط هشداری
            $table->string('opt_prohibition_sale')->nullable(); // منع فروش
            $table->string('opt_uncleared')->nullable(); // چک های پاس نشده
            $table->string('opt_customer_balance')->nullable(); // مانده مشتری
            $table->string('not_spent')->nullable(); // چک های خرج نشده
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
