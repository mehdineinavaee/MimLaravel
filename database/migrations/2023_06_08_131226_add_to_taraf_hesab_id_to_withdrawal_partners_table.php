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
        Schema::table('withdrawal_partners', function (Blueprint $table) {
            $table->foreignId('to_taraf_hesab_id')->after('from_taraf_hesab_id');
            $table->foreign('to_taraf_hesab_id')
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
        Schema::table('withdrawal_partners', function (Blueprint $table) {
            //
        });
    }
};
