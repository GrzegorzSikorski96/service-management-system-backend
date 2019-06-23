<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\AgencyRole;
use Sms\Models\User;

/** @var Factory $factory */
$factory->define(
    /**
    * @param Faker $faker
    * @return array
    */
    User::class,
    function (Faker $faker) {
        return [
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'agency_role_id' => AgencyRole::SERVICEMAN,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
);
