<?php

namespace Tests\Unit;

use App\User;
use App\Presupuesto;
use App\Cliente;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresupuestoTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function user()
    {
        return factory(User::class)->create();
    }

    public function presupuesto()
    {
        return factory(Presupuesto::class)->create();
    }

    public function testShowPres()
    {   
        $presupuesto = $this->presupuesto();

        $this->actingAs($this->user())
             ->get('/admin/presupuestos/'.$presupuesto->id)
             ->assertSee($presupuesto->comentario)
             ->assertSee($presupuesto->cliente->email);
    }

    public function testDeletePres()
    {   
        $presupuesto = $this->presupuesto();

        $this->actingAs($this->user())
             ->delete('/admin/presupuestos/'.$presupuesto->id);
        $this->assertNull(Presupuesto::find($presupuesto->id));     
    }

    public function testUpdatePres()
    {  
        $presupuesto = $this->presupuesto();

        $this->actingAs($this->user())
             ->patch('/admin/presupuestos/'.$presupuesto->id, ['comentario' => 'prueba']);
        $this->assertDatabaseHas('presupuestos', ['comentario' => 'prueba']);
    }

    public function testStorePres()
    {
        $faker = \Faker\Factory::create();

        // Testeo presupuesto con cliente existente
        factory(Cliente::class)->create(['email' => 'seperezf@gmail.com']);
        $comentario = $faker->sentence();

        $this->actingAs($this->user())
             ->post('/admin/presupuesto', [
                    'comentario' => $comentario,
                    'email' => 'seperezf@gmail.com',
                    'nombre' => 'Sebastián Perez'
                ]);

        $cliente = Cliente::where('email', 'like', 'seperezf@gmail.com')->first();
        $this->assertDatabaseHas('presupuestos', ['comentario' => $comentario, 'cliente_id' => $cliente->id]);

        //Testeo presupuesto con cliente nuevo
        $comentario = $faker->sentence();

        $this->actingAs($this->user())
             ->post('/admin/presupuesto', [
                    'comentario' => $comentario,
                    'email' => 'juancito@example.com',
                    'nombre' => 'Juancito'
                ]);

        $cliente = Cliente::where('email', 'like', 'juancito@example.com')->first();
        $this->assertDatabaseHas('presupuestos', ['comentario' => $comentario, 'cliente_id' => $cliente->id]);

        //Testeo prespuesto sin cliente
        $comentario = $faker->sentence();
        $nombre = 'Gonzalo';

        $this->actingAs($this->user())
             ->post('/admin/presupuesto', [
                    'comentario' => $comentario,
                    'nombre' => $nombre
                ]);
        $this->assertDatabaseHas('presupuestos', ['comentario' => $comentario]);
        $this->assertDatabaseHas('datos_presupuestos', ['nombre' => $nombre]);
    }
}
