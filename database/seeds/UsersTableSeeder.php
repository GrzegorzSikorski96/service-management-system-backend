<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;
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
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Administrator',
            'surname' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'agency_role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        factory(User::class, 50)->create();
    }
}
