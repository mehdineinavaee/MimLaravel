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
        Schema::table('fund_to_banks', function (Blueprint $table) {
            $table->foreignId('bank_type_id')->after('id');
            $table->foreign('bank_type_id')
                ->references('id')
                ->on('bank_types')
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
        Schema::table('fund_to_banks', function (Blueprint $table) {
            //
        });
    }
};