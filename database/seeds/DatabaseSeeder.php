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
        $this->call(ClientsTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(AgencyRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(AgenciesTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(AgencyEmployeesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(AgencyDevicesTableSeeder::class);
        $this->call(AgencyClientsTableSeeder::class);
        $this->call(AgencyTicketsTableSeeder::class);
    }
}
