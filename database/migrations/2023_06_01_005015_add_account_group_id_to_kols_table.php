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
        Schema::table('kols', function (Blueprint $table) {
            $table->foreignId('account_group_id')->after('id');
            $table->foreign('account_group_id')
                ->references('id')
                ->on('account_groups')
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
        Schema::table('kols', function (Blueprint $table) {
            //
        });
    }
};
