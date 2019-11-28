<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Agency;

/**
 * Class AgenciesTableSeeder
 */
class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Agency::class, 10)->create();
    }
}
