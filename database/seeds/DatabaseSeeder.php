<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TicketStatusesTableSeeder::class);
        $this->call(AgencyRolesTableSeeder::class);
        $this->call(AdminAccountSeeder::class);

        if (app()->environment('local')) {
            $this->call(ServicesTableSeeder::class);
            $this->call(AgenciesTableSeeder::class);
            $this->call(AgencyDevicesTableSeeder::class);
            $this->call(AgencyClientsTableSeeder::class);
            $this->call(AgencyTicketsTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(NotesTableSeeder::class);
        }
    }
}
