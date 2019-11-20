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
     * @throws Exception
     */
    public function run(): void
    {
        foreach (Agency::all() as $agency) {
            $agency->clients()->attach(factory(Client::class, random_int(3, 12))->create());
        }
    }
}
