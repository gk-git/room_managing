<?php

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "size" => $faker->name,
    ];
});
