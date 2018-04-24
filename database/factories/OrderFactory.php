<?php

use App\User;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //'total_price' => $faker->numberBetween(5, 50),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
