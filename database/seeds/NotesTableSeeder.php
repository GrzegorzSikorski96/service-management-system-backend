<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Sms\Models\Note;

/**
 * Class NotesTableSeeder
 */
class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Note::class, 300)->create();
    }
}
