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
        Schema::create('cheque_books', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(); // کد
            $table->string('receive_date'); // تاریخ دریافت
            $table->string('quantity'); // تعداد برگه
            $table->string('cheque_from'); // از شماره
            $table->string('cheque_to'); // تا شماره
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
        Schema::dropIfExists('cheque_books');
    }
};
