<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proposal;
use Faker\Factory as Factory;
use Faker\Generator as Faker;

$factory->define(Proposal::class, function (Faker $faker) {

    return [
        'title' => $faker->realText('20'),
        'content' => $faker->realText('300'),
        'is_closed' => rand(0, 1),
        'user_id' => rand(2, 20)
    ];
});
