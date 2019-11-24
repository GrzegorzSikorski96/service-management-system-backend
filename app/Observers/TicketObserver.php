<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Models\Ticket;
use Sms\Services\NoteService;

class TicketObserver
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function created(Ticket $ticket): void
    {
        if (auth()->id()) {
            $this->noteService->create([
                'content' => 'Utworzono zgłoszenie.',
                'ticket_id' => $ticket->id
            ]);
        }
    }
}
