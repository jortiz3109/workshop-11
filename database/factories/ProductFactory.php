<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->randomNumber(5),
        'name' => $faker->words(3, true),
        'price' => $faker->randomNumber(),
        'description' => $faker->paragraph(3, true),
        'stock' => $faker->randomNumber(2),
    ];
});
