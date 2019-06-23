<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Client;

/** @var Factory $factory */
$factory->define(
    /**
    * @param Faker $faker
    * @return array
    */
    Client::class,
    function (Faker $faker) {
        return [
            'name' => $faker->firstName,
            'email' => $faker->lastName,
            'phone_number' => $faker->phoneNumber,
            'description' => $faker->text(30),
            'address' => $faker->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
