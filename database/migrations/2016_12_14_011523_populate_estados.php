<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('estados')->insert([
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'nuevo',
                'color'=>'#0000CC'
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'enviado',
                'color'=>'#00CC00'
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'pendiente',
                'color'=>'#666600'
            ],
            [
                'created_at'=>'2016-12-12 00:00:00',
                'updated_at'=>'2016-12-12 00:00:00',
                'descripcion'=>'finalizado',
                'color'=>'#880088'
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
        DB::table('estados')->delete();
    }
}
