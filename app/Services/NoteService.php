<?php

declare(strict_types=1);

namespace Sms\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Sms\Models\Note;

/**
 * Class NoteService
 * @package Sms\Services
 */
class NoteService
{
    /**
     * @param array $request
     * @return Note
     */
    public function create(array $request): Note
    {
        $note = new Note($request);
        $note->author_id = Auth::id();
        $note->save();

        return $note;
    }

    /**
     * @param int $noteId
     * @return Note
     */
    public function note(int $noteId): Note
    {
        return Note::findOrFail($noteId);
    }

    /**
     * @param array $data
     * @param Note $note
     * @return Note
     */
    public function edit(array $data, Note $note): Note
    {
//        $note = $this->note($noteId);
        $note->fill($data);
        $note->save();

        return $note;
    }

    /**
     * @param Note $note
     * @throws Exception
     */
    public function remove(Note $note): void
    {
        $note->delete();
    }
}
