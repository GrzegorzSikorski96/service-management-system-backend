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
            factory(Note::class, random_int(1, 7))->create([
                'ticket_id' => $ticket->id
            ]);
        }
    }
}
