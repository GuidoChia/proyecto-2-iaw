<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reactive;
use Faker\Generator as Faker;

$factory->define(Reactive::class, function (Faker $faker) {
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $imageDataBLOB = base64_encode($generator->getBarcode($faker->numerify('############'), $generator::TYPE_CODE_128));

    return [
        'name' => $faker->unique()->numerify('Reactive ###'),
        'description' => $faker->sentence(),
        'barcode' => $imageDataBLOB,
    ];
});
