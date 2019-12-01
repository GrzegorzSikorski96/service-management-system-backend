<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Note;

/**
 * Class NoteObserver
 * @package Sms\Observers
 */
class NoteObserver
{
    /**
     * @param Note $note
     */
    public function created(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }

    /**
     * @param Note $note
     */
    public function updated(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }

    /**
     * @param Note $note
     */
    public function deleted(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }
}
