<?php

use Illuminate\Database\Seeder;
use Sms\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class, 1)->create();
    }
}
