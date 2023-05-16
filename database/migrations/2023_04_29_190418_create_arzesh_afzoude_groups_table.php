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
        Schema::create('arzesh_afzoude_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->nullable(); // نام گروه
            $table->string('financial_year')->nullable(); // سال مالی
            $table->string('avarez')->nullable(); // عوارض
            $table->string('maliyat')->nullable(); // مالیات
            $table->string('saghfe_moamelat')->nullable(); // سقف معاملات
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
        Schema::dropIfExists('arzesh_afzoude_groups');
    }
};
