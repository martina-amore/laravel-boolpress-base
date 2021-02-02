<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInformation;
use Faker\Generator as Faker;

$factory->define(PostInformation::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 30),
        'description' => $faker->paragraph,
        'slug' => $faker->slug
    ];
});
