<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Note;
use Sms\Models\Ticket;
use Sms\Models\User;

/** @var Factory $factory */
$factory->define(
    /**
    * @param Faker $faker
    * @return array
    */
    Note::class,
    function (Faker $faker) {
        return [
            'content' => $faker->text(50),
            'author_id' => User::inRandomOrder()->first(),
            'ticket_id' => Ticket::inRandomOrder()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
