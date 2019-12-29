<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Entry::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'subject' => $faker->text(50),
        'description' => $faker->text(200),
        'URL' => $faker->text(50),
        'cost' => $faker->text(50)
    ];
});
