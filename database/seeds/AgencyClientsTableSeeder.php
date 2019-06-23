<?php

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Client;

class AgencyClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Client::all() as $client) {
            $client->agencies()->attach(Agency::inRandomOrder()->first());
            $client->save();
        }
    }
}
