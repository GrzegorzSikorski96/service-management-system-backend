<?php

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Ticket;

class AgencyTicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Ticket::all() as $ticket) {
            $ticket->agencies()->attach(Agency::inRandomOrder()->first());
            $ticket->save();
        }
    }
}
