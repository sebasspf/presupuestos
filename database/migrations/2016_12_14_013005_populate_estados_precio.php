<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateEstadosPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('estados_precio')->insert([
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'aceptado',
                'color'=>'#00CC00',
                'email'=>0
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'nuevo',
                'color'=>'#0000CC',
                'email'=>0
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'rechazado',
                'color'=>'#CC0000',
                'email'=>0
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'finalizado',
                'color'=>'#888800',
                'email'=>1
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'imposible',
                'color'=>'#880088',
                'email'=>1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('estados_precio')->delete();
    }
}
