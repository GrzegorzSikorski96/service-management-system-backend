<?php

use Illuminate\Database\Seeder;
use Sms\Models\AgencyRole;

class AgencyRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            AgencyRole::MANAGER => 'manager',
            AgencyRole::SERVICEMAN => 'serwisant'
        ];

        foreach ($roles as $key => $value) {
            AgencyRole::firstOrCreate([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}
