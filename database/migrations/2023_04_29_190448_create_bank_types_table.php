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
        Schema::create('bank_types', function (Blueprint $table) {
            $table->id();
            $table->string('chk_active')->nullable(); // فعال
            $table->string('bank_code')->nullable(); // کد بانک
            $table->string('bank_name')->nullable(); // نام بانک
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
        Schema::dropIfExists('bank_types');
    }
};
