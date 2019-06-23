<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Client;
use Sms\Models\Device;
use Sms\Models\Ticket;
use Sms\Models\TicketStatus;

/** @var Factory $factory */
$factory->define(
    /**
    * @param Faker $faker
    * @return array
    */
    Ticket::class,
    function (Faker $faker) {
        return [
            'description' => $faker->text(80),
            'note' => $faker->text(30),
            'message' => $faker->text(50),
            'client_id' => Client::inRandomOrder()->first(),
            'ticket_status_id' => TicketStatus::inRandomOrder()->first(),
            'device_id' => Device::inRandomOrder()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
