<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presupuesto_id')->unsigned()->index();
            $table->string('producto');
            $table->string('falla');
            $table->double('precio', 15, 2);
            $table->text('comentario')->nullable();
            $table->integer('tiempo');
            $table->boolean('aceptado')->default(0);
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
        Schema::drop('precios');
    }
}
