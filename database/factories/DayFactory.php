<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Day;
use Faker\Generator as Faker;

$factory->define(Day::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
