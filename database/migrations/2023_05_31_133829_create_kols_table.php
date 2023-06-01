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
        Schema::create('kols', function (Blueprint $table) {
            $table->id();
            $table->string('account_code')->nullable(); // کد حساب کل
            $table->string('account_name')->nullable(); // نام حساب کل
            $table->string('account_nature')->nullable(); // ماهیت حساب
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
        Schema::dropIfExists('kols');
    }
};
