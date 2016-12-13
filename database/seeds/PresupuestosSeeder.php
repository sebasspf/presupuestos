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

        factory(App\Presupuesto::class)->states('noUser')->create()->each(function ($u) {
            $u->precios()->save(factory(App\Precio::class)->make());
        });
    }
}
