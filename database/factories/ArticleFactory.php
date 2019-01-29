<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    $storeId = \App\Models\Store::inRandomOrder()->first();
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 10, 1500),
        'total_in_shelf' => $faker->randomDigit,
        'total_in_vault' => $faker->randomDigit,
        'store_id' => $storeId->id,
    ];
});
