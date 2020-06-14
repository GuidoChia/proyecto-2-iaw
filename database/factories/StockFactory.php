<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
        return [
            'reactive_id'=> $faker->numberBetween(1,1),
            'amount' => $faker->randomNumber(),
            'expiration'=>$faker->date(),
        ];
});
