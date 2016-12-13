<?php

use Illuminate\Database\Seeder;

class PresupuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Presupuesto::class, 2)->create()->each(function ($u) {
            $u->precios()->save(factory(App\Precio::class)->make());
        });

        factory(App\DatosPresupuesto::class)->create()->each(function ($u){
            $u->presupuesto->precios()->save(factory(App\Precio::class)->make());
        });
    }
}
