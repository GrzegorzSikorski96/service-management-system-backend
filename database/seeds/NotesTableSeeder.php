<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Note;
use Sms\Models\Ticket;

/**
 * Class NotesTableSeeder
 */
class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        foreach (Ticket::all() as $ticket) {
            $agency = $ticket->agencies()->inRandomOrder()->first();

            for ($i = 0; $i < random_int(1, 7); $i++) {
                factory(Note::class)->create([
                    'author_id' => $agency->employees()->inRandomOrder()->firstOrFail(),
                    'ticket_id' => $ticket->id
                ]);
            }
        }
    }
}
