<?php

/* @var $factory Factory */

use App\Signature;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Signature::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->sentence,
    ];
});
