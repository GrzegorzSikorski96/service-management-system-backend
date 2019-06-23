<?php

use Illuminate\Database\Seeder;
use Sms\Models\Note;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Note::class, 300)->create();
    }
}
