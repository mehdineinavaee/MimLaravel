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
        Schema::table('pay_cheques', function (Blueprint $table) {
            $table->foreignId('receiver_id')->after('bank_account_id');
            $table->foreign('receiver_id')
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
        Schema::table('pay_cheques', function (Blueprint $table) {
            //
        });
    }
};
