<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Service;

/**
 * Class ServicesTableSeeder
 */
class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Service::class, 1)->create();
    }
}
