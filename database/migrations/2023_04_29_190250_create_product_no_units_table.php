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
        Schema::create('product_no_units', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // کد واحد
            $table->string('title'); // نام واحد کالا
            $table->string('chk_active')->nullable(); // فعال
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
        Schema::dropIfExists('product_no_units');
    }
};
