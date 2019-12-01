<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use Sms\Models\Agency;
use Sms\Models\Ticket;
use Sms\Models\TicketStatus;

/** @var Factory $factory */
$factory->define(
    Ticket::class,
    function (Faker $faker) {
        $agency = Agency::inRandomOrder()->first();

        return [
            'description' => $faker->text(80),
            'additional_information' => $faker->text(30),
            'message' => $faker->text(50),
            'token' => Str::random(15),
            'client_id' => $agency->clients()->inRandomOrder()->first(),
            'device_id' => $agency->devices()->inRandomOrder()->first(),
            'ticket_status_id' => TicketStatus::inRandomOrder()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
