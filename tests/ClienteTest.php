<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClienteTest extends TestCase
{

    public function testApiCliente()
    {
        $admin = App\User::find('1');

        $this->actingAs($admin)
             ->json('GET', '/api/getcliente/seperezf@gmail.com')
             ->seeJson(['nombre' =>'Sebastián Perez Ferretti']);
    }
}
