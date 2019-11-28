<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Agency;
use Sms\Models\Service;

/** @var Factory $factory */
$factory->define(
    /**
     * @param Faker $faker
     * @return array
     */
    Agency::class,
    function (Faker $faker) {
        return [
            'name' => $faker->company,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'service_id' => Service::first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
);
