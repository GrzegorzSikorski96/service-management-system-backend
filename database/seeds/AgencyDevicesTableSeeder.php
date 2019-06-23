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
     */
    public function run(): void
    {
        foreach (Device::all() as $device) {
            $device->agencies()->attach(Agency::inRandomOrder()->first());
            $device->save();
        }
    }
}
