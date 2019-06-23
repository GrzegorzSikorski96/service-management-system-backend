<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Device;

/* @var $factory Factory */
$factory->define(Device::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'description' => $faker->text(30),
        'serial_number' => $faker->phoneNumber,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
