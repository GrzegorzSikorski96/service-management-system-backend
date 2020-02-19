<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Service;

/** @var Factory $factory */
$factory->define(
    Service::class,
    function (Faker $faker) {
        return [
            'name' => $faker->company,
            'description' => $faker->text(100),
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->safeEmail,
            'NIP' => random_int(100, 999) . '-' . random_int(100, 999) . '-' . random_int(1, 99) . '-' . random_int(1, 99),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
