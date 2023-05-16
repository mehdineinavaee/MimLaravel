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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('service_code'); // کد خدمات
            $table->string('service_name'); // نام خدمات
            $table->string('price'); // قیمت ارائه خدمات
            $table->string('group'); // گروه ارزش افزوده
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
        Schema::dropIfExists('services');
    }
};
