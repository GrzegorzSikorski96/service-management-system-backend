<?php

use Illuminate\Database\Seeder;
use Sms\Models\Agency;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agency::class, 10)->create();
    }
}
