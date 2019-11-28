<?php

declare(strict_types=1);

namespace Sms\Services;

use Exception;
use Sms\Events\Event;
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
        $note->author_id = auth()->id();
        $note->save();

        event(new Event(["ticket-$note->ticket_id"], 'notes'));

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
     * @return Note
     */
    public function edit(array $data): Note
    {
        $note = $this->note($data['id']);

        $note->content = $data['content'];
        $note->save();

        event(new Event(["ticket-$note->ticket_id"], 'notes'));

        return $note;
    }

    /**
     * @param Note $note
     * @throws Exception
     */
    public function remove(Note $note): void
    {
        $note->delete();

        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }
}
