<?php

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "customer_id" => factory('App\Customer')->create(),
        "room_id" => factory('App\Room')->create(),
        "start" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "end" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "paid" => 0,
        "status" => $faker->name,
    ];
});
