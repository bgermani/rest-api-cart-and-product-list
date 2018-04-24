<?php

use App\Order;
use App\Product;
use App\Order_Detail;
use Faker\Generator as Faker;

$factory->define(Order_Detail::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first()->id,
    	'quantity' => $faker->numberBetween(1, 10),
    	'price' => $faker->numberBetween(5, 50),
    	'order_id' => Order::inRandomOrder()->first()->id,
    ];
});
