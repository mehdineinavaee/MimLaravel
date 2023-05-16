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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('chk_system')->nullable(); // سیستمی
            $table->string('form_type')->nullable(); // نوع فرم
            $table->string('daramad_code')->nullable(); // کد درآمد
            $table->string('daramad_name')->nullable(); // نام درآمد
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
        Schema::dropIfExists('funds');
    }
};
