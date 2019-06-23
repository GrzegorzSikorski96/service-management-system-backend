<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Device;

/**
 * Class DevicesTableSeeder
 */
class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Device::class, 50)->create();
    }
}
