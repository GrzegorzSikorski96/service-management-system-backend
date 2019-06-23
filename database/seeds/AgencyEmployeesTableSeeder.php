<?php

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\User;

class AgencyEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $user->agencies()->attach(Agency::inRandomOrder()->first());
            $user->save();
        }
    }
}
