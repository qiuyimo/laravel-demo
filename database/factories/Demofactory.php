<?php

use Faker\Generator as Faker;

$factory->define(App\Demo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(1, 80),
        'description' => $faker->text,
    ];
});
