<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\User;

/**
 * Class AgencyEmployeesTableSeeder
 */
class AgencyEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (User::all() as $user) {
            $user->agencies()->attach(Agency::inRandomOrder()->first());
            $user->save();
        }
    }
}
