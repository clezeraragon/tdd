<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pathology;
use Faker\Generator as Faker;

$factory->define(Pathology::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['Variula','Febre Amarela','Covid-19']),
        'gravity' => $faker->randomElement(['Mediana','Alta','Baixa']),
        'cured' => $faker->randomElement(['Yes','No'])
    ];
});
