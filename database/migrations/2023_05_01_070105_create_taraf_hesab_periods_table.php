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
        Schema::create('taraf_hesab_periods', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable(); // مبلغ
            $table->string('opt_debtor')->nullable(); // بدهکار
            $table->string('opt_creditor')->nullable(); // بستانکار
            $table->string('considerations')->nullable(); // ملاحظات
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
        Schema::dropIfExists('taraf_hesab_periods');
    }
};
