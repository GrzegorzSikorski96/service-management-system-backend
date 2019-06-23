<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Client;

/**
 * Class AgencyClientsTableSeeder
 */
class AgencyClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Client::all() as $client) {
            $client->agencies()->attach(Agency::inRandomOrder()->first());
            $client->save();
        }
    }
}
