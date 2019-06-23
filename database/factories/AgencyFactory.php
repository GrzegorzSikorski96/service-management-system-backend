<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Agency;

/* @var $factory Factory */
$factory->define(Agency::class, function (Faker $faker) {
    return array(
        'name' => $faker->company,
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'service_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    );
});
