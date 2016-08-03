<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAceptadoPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precios', function (Blueprint $table) {
            $table->dropColumn('aceptado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precios', function (Blueprint $table) {
            $table->boolean('aceptado')->default(0);
        });
    }
}
