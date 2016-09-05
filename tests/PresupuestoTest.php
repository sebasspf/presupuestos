<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresupuestoTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Pruebas relacionadas con la creación de presupuestos
     *
     * @return void
     */
    public function testAddPresupuesto()
    {
        $faker = Faker\Factory::create();
        $admin = App\User::find('1');

        $email = $faker->email();
        $name = $faker->name();
        $sentence = $faker->sentence();

        $this->actingAs($admin)
             ->visit('/admin/presupuesto')
             ->type($email,'email')
             ->type($name,'nombre')
             ->type($sentence, 'comentario')
             ->press('enviar')
             ->seeInDatabase('presupuestos', ['comentario' => $sentence, ])
             ->seeInDatabase('clientes', ['email' => $email, 'nombre' => $name]);
    }

}
