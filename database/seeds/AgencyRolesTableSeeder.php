<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\AgencyRole;

/**
 * Class AgencyRolesTableSeeder
 */
class AgencyRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
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
