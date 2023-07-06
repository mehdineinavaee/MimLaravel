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
        Schema::table('fund_periods', function (Blueprint $table) {
            $table->foreignId('fund_id')->after('amount');
            $table->foreign('fund_id')
                ->references('id')
                ->on('funds')
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
        Schema::table('fund_periods', function (Blueprint $table) {
            //
        });
    }
};
