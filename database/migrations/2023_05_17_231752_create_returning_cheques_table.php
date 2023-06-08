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
        Schema::create('returning_cheques', function (Blueprint $table) {
            $table->id();
            $table->string('form_date'); // تاریخ فرم
            $table->string('form_number')->nullable(); // شماره فرم
            $table->string('mark_back'); // پشت نمره
            $table->string('serial_number'); // شماره سریال چک
            $table->string('total'); // مبلغ چک
            $table->string('due_date'); // سر رسید
            $table->string('payer'); // پرداخت کننده
            $table->string('considerations'); // ملاحظات
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
        Schema::dropIfExists('returning_cheques');
    }
};
