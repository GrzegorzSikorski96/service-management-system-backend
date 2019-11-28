<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Note;

class NoteObserver
{
    public function created(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }

    public function updated(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }

    public function deleted(Note $note): void
    {
        event(new Event(["ticket-$note->ticket_id"], 'notes'));
    }
}
