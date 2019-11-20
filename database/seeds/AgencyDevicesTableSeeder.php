<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Device;

/**
 * Class AgencyDevicesTableSeeder
 */
class AgencyDevicesTableSeeder extends Seeder
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
            $agency->devices()->attach(factory(Device::class, random_int(1, 13))->create());
        }
    }
}
