<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\AgencyRole;
use Sms\Models\User;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
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
            User::firstOrCreate([
                'name' => 'Manager' . $agency->id,
                'surname' => 'Manager' . $agency->id,
                'email' => 'manager' . $agency->id . '@example.com',
                'phone_number' => random_int(111111111, 999999999),
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'agency_role_id' => AgencyRole::MANAGER,
                'agency_id' => $agency->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            factory(User::class, random_int(3, 10))->create([
                'agency_id' => $agency->id,
            ]);
        }
    }
}
