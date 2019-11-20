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
     * @throws Exception
     */
    public function run(): void
    {
        foreach (Agency::all() as $agency) {
            for ($i = 0; $i < 5; $i++) {
                $agency->tickets()->attach(factory(Ticket::class, random_int(1, 6))->create([
                    'client_id' => $agency->clients()->inRandomOrder()->first(),
                    'device_id' => $agency->devices()->inRandomOrder()->first(),
                ]));
            }
        }
    }
}
