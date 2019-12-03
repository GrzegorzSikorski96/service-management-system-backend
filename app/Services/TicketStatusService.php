<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\Ticket;
use Sms\Models\TicketStatus;

/**
 * Class TicketStatusService
 * @package Sms\Services
 */
class TicketStatusService
{
    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * TicketStatusService constructor.
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * @return Collection
     */
    public function statuses(): Collection
    {
        return TicketStatus::all();
    }

    /**
     * @param int $ticketId
     * @param int $statusId
     * @return Ticket
     */
    public function changeTicketStatus(int $ticketId, int $statusId): Ticket
    {
        $ticket = $this->ticketService->ticket($ticketId);
        $status = TicketStatus::findOrFail($statusId);

        $ticket->ticket_status_id = $status->id;
        $ticket->save();

        return $ticket;
    }

    /**
     * @param int $ticketId
     * @return Collection
     */
    public function availableTicketStatuses(int $ticketId): Collection
    {
        $ticket = $this->ticketService->ticket($ticketId);

        switch ($ticket->ticketStatus->id) {
            case TicketStatus::PENDING:
                $available = [
                    TicketStatus::PENDING,
                    TicketStatus::DURING,
                    TicketStatus::CANCELED,
                ];
                break;
            case TicketStatus::DURING:
                $available = [
                    TicketStatus::DURING,
                    TicketStatus::READY,
                    TicketStatus::CANCELED,
                ];
                break;
            case TicketStatus::READY:
                $available = [
                    TicketStatus::READY,
                    TicketStatus::ENDED,
                ];
                break;
            case TicketStatus::ENDED:
                $available = [
                    TicketStatus::ENDED,
                ];
                break;
            case TicketStatus::CANCELED:
                $available = [
                    TicketStatus::CANCELED,
                ];
                break;
            default:
                $available = [];
                break;
        }

        return TicketStatus::whereIn('id', $available)->get();
    }
}
