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
        Schema::create('product_sell_factor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('sell_factor_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sell_factor_id')
                ->references('id')
                ->on('sell_factors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('total'); // مبلغ کل
            $table->string('amount'); // مقدار
            $table->string('discount'); // تخفیف
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
        Schema::dropIfExists('product_sell_factor');
    }
};
