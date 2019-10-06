<?php

declare(strict_types=1);

namespace Sms\Services;

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
     * @param int $noteId
     * @return Note
     */
    public function edit(array $data, int $noteId): Note
    {
        $note = $this->note($noteId);
        $note->fill($data);
        $note->save();

        return $note;
    }

    /**
     * @param int $noteId
     */
    public function remove(int $noteId): void
    {
        $note = Note::findOrFail($noteId);
        $note->delete();
    }
}
