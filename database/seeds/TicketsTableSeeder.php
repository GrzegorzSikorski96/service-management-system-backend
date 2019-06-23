<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Ticket;

/**
 * Class TicketsTableSeeder
 */
class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Ticket::class, 100)->create();
    }
}
