<?php

/* @var $factory Factory */

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Note;
use Sms\Models\Ticket;
use Sms\Models\User;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'content' => $faker->text(50),
        'created_by' => User::inRandomOrder()->first(),
        'ticket_id' => Ticket::inRandomOrder()->first(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
