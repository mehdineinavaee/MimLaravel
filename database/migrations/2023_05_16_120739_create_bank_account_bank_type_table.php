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
        Schema::create('bank_account_bank_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_account_id');
            $table->foreignId('bank_type_id');

            $table->foreign('bank_account_id')
                ->references('id')
                ->on('bank_accounts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('bank_type_id')
                ->references('id')
                ->on('bank_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('bank_account_bank_type');
    }
};
