<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker){
    return [
        'email' => $faker->email,
        'nombre' => $faker->name,
        'telefono' => $faker->phoneNumber,
    ];
});

$factory->define(App\Presupuesto::class, function (Faker\Generator $faker){
    return [
        'comentario' => $faker->sentence(12),
        'clave' => crearClave(10),
        'cliente_id' =>  function () {
            return factory(App\Cliente::class)->create()->id;
        },
        'estado_id' => 1,
        'estadoant_id' => null,
    ];
});
    
    $factory->state(App\Presupuesto::class, 'existingUser', function (Faker\Generator $faker){
        return [
            'cliente_id' => App\Cliente::orderByRaw("RAND()")->first()->id,
        ];
    });

    $factory->state(App\Presupuesto::class, 'noUser', function (Faker\Generator $faker){
        return [
            'cliente_id' => null,
        ];
    });

$factory->define(App\DatosPresupuesto::class, function (Faker\Generator $faker) {
    return [ 
        'nombre' => $faker->name,
        'telefono' => $faker->phoneNumber,
        'presupuesto_id' => function () {
            return factory(App\Presupuesto::class)->states('noUser')->create()->id;
        }
    ];
});

$factory->define(App\Precio::class, function (Faker\Generator $faker){
    return [
        'presupuesto_id' => App\Presupuesto::orderByRaw("RAND()")->first()->id,
        'producto' => $faker->word,
        'falla' => $faker->sentence(9),
        'precio' => $faker->numberBetween(100, 900),
        'comentario' => $faker->sentence(7),
        'tiempo' => $faker->numberBetween(1,10),
        'estado_id' => 2,
    ];
});