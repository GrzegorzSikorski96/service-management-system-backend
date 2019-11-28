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
        if (random_int(1, 15) % 5) {
            $nip = random_int(100, 999) . '-' . random_int(100, 999) . '-' . random_int(1, 99) . '-' . random_int(1, 99);
        } else {
            $nip = null;
        }

        return [
            'name' => $faker->firstName,
            'email' => $faker->safeEmail,
            'phone_number' => $faker->phoneNumber,
            'NIP' => $nip,
            'description' => $faker->text(30),
            'address' => $faker->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
