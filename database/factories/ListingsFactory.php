<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->colorName,
        'body' => $faker->paragraph(rand(2,5)),
        'live' => Carbon::now(),
        'area_id' => rand(10, 700),
        'category_id' => rand(10, 20),
        'user_id' => 1
    ];
});
