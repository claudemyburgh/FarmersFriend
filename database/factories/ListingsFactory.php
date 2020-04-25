<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Listing::class, function (Faker $faker) {


    return [
        'title' => $faker->colorName,
        'body' => $faker->paragraph(rand(2,5)),
        'live' => Arr::random([Carbon::now(), null]),
//        'created_at' => \Carbon\Carbon::now()->addDays(rand(1, 120))->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60)),
//        'updated_at' => \Carbon\Carbon::now()->addDays(rand(1, 120))->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60)),
        'area_id' => rand(10, 700),
        'category_id' => rand(1, 20),
        'user_id' => 1
    ];
});
