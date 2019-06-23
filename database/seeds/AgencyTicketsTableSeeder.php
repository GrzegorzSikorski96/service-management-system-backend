<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Ticket;

/**
 * Class AgencyTicketsTableSeeder
 */
class AgencyTicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Ticket::all() as $ticket) {
            $ticket->agencies()->attach(Agency::inRandomOrder()->first());
            $ticket->save();
        }
    }
}
