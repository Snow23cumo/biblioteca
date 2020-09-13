<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Admin\Permiso;
use Faker\Generator as Faker;

$factory->define(Permiso::class, function (Faker $faker) {
    // Poblar la DB con datos de prueba
    return [
        'nombre' => $faker->word,
        'slug' => $faker->word,
    ];
});
