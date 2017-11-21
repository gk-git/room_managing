<?php

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "phone" => $faker->name,
    ];
});
