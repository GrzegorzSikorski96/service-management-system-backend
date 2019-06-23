<?php

use Illuminate\Database\Seeder;
use Sms\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 100)->create();
    }
}
