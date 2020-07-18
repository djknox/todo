<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'group_id' => factory(App\Group::class)->create()->id,
        'description' => $faker->text,
    ];
});
