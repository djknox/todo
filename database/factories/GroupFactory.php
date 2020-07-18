<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'day_id' => factory(App\Day::class)->create()->id,
        'name' => $faker->text($maxNbChars = 200),
    ];
});
