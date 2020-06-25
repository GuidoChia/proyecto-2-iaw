<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reactive;
use Faker\Generator as Faker;

$factory->define(Reactive::class, function (Faker $faker) {
    $imageDataBLOB = base64_encode(file_get_contents('https://barcode.tec-it.com/barcode.ashx?data='.$faker->numerify('#########')));

    return [
        'name' => $faker->unique()->numerify('Reactive ###'),
        'description' => $faker->sentence(),
        'barcode' => $imageDataBLOB,
    ];
});
