<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
      "nombre" => $faker->word(),
      "descripcion" => $faker->paragraph(),
      "precio" => $faker->numberBetween(800,20000),
      "imagen" => 'producto' . strval(rand(1,20)) . '.jpg',
      "categoria_id" => $faker->numberBetween(1,4),
      "marca_id" => $faker->numberBetween(1,4),
    ];
});
