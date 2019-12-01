<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Ticket;
use Sms\Services\AgencyService;

/**
 * Class TicketObserver
 * @package Sms\Observers
 */
class TicketObserver
{
    /**
     * @var AgencyService
     */
    protected $agencyService;

    /**
     * TicketObserver constructor.
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    /**
     * @param Ticket $ticket
     */
    public function created(Ticket $ticket): void
    {
        event(new Event($this->agencyService->createAgenciesForEvents($ticket->device->agencies), 'statistics'));
        event(new Event(["tickets"], 'update'));
        event(new Event(["client-$ticket->client_id"], 'tickets'));
        event(new Event(["device-$ticket->device_id"], 'tickets'));
    }

    /**
     * @param Ticket $ticket
     */
    public function updated(Ticket $ticket): void
    {
        event(new Event(["ticket-$ticket->id"], 'update', ['ticket' => $ticket]));
        event(new Event(["tickets"], 'update'));
        event(new Event(["client-$ticket->client_id"], 'tickets'));
        event(new Event(["device-$ticket->device_id"], 'tickets'));
    }

    /**
     * @param Ticket $ticket
     */
    public function deleted(Ticket $ticket): void
    {
        event(new Event(["tickets"], 'update'));
        event(new Event(["ticket-$ticket->id"], 'remove'));
        event(new Event(["client-$ticket->client_id"], 'tickets'));
        event(new Event(["device-$ticket->device_id"], 'tickets'));
        event(new Event($this->agencyService->createAgenciesForEvents($ticket->agencies), 'statistics'));
    }
}
