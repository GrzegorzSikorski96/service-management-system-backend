<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Client;

/**
 * Class ClientsTableSeeder
 */
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Client::class, 50)->create();
    }
}
