<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    $maxId = \App\Reactive::max('id');
        return [
            'reactive_id'=> $faker->numberBetween(1,$maxId),
            'expiration'=>$faker->dateTimeBetween('now', '+1 years'),
            'type'=>'up',
        ];
});
