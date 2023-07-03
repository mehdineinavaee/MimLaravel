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
        Schema::create('product_warehouse_move', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('warehouse_move_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('warehouse_move_id')
                ->references('id')
                ->on('warehouse_moves')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('amount'); // مقدار
            $table->string('pre_transmitter'); // موجودی انبار فرستنده قبل از انتقال
            $table->string('next_transmitter'); // موجودی انبار فرستنده بعد از انتقال
            $table->string('pre_receiver'); // موجودی انبار گیرنده قبل از انتقال
            $table->string('next_receiver'); // موجودی انبار گیرنده بعد از انتقال
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
        Schema::dropIfExists('product_warehouse_move');
    }
};
