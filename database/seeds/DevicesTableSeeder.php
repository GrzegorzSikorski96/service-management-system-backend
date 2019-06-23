<?php

use Illuminate\Database\Seeder;
use Sms\Models\Device;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Device::class, 50)->create();
    }
}
