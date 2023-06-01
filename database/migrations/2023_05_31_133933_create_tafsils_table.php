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
        Schema::create('tafsils', function (Blueprint $table) {
            $table->id();
            $table->string('kol_account_name')->nullable(); // نام حساب کل
            $table->string('moein_account_name')->nullable(); // نام حساب معین
            $table->string('account_code')->nullable(); // کد حساب تفصیل
            $table->string('account_name')->nullable(); // نام حساب تفصیل
            $table->string('active')->nullable(); // فعال
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
        Schema::dropIfExists('tafsils');
    }
};
