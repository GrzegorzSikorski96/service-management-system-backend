<?php

use Illuminate\Database\Seeder;
use Sms\Models\Agency;
use Sms\Models\Device;

class AgencyDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Device::all() as $device) {
            $device->agencies()->attach(Agency::inRandomOrder()->first());
            $device->save();
        }
    }
}
