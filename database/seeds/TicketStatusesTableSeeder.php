<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\TicketStatus;

/**
 * Class TicketStatusesTableSeeder
 */
class TicketStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $statuses = [
            TicketStatus::PENDING => 'oczekujące',
            TicketStatus::DURING => 'w trakcie',
            TicketStatus::READY => 'gotowe',
            TicketStatus::ENDED => 'zakończone',
            TicketStatus::CANCELED => 'anulowane',
        ];

        foreach ($statuses as $key => $value) {
            TicketStatus::firstOrCreate([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}
