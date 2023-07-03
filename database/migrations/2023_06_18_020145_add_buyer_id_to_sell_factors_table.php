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
        Schema::table('sell_factors', function (Blueprint $table) {
            $table->foreignId('buyer_id')->after('customer_type')->nullable();
            $table->foreign('buyer_id')
                ->references('id')
                ->on('taraf_hesabs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sell_factors', function (Blueprint $table) {
            //
        });
    }
};
