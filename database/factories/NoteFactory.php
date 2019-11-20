<?php

declare(strict_types=1);

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Sms\Models\Agency;
use Sms\Models\Note;

/** @var Factory $factory */
$factory->define(
    /**
     * @param Faker $faker
     * @return array
     */
    Note::class,
    function (Faker $faker) {
        $agency = Agency::inRandomOrder()->first();

        return ['content' => $faker->text(50),
            'author_id' => $agency->employees()->inRandomOrder()->first(),
            'ticket_id' => $agency->tickets()->inRandomOrder()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
);
