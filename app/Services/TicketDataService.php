<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Sms\Models\Ticket;
use Sms\Models\TicketStatus;

/**
 * Class TicketDataService
 * @package Sms\Services
 */
class TicketDataService
{
    /**
     * @var AgencyService
     */
    protected $ticketService;

    /**
     * TicketDataService constructor.
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * @param int $ticketId
     * @return LengthAwarePaginator
     */
    public function notes(int $ticketId): LengthAwarePaginator
    {
        $ticket = $this->ticketService->ticket($ticketId);

        return $ticket->notes()->with('author')->orderByDesc('created_at')->paginate(5);
    }

    /**
     * @param string $token
     * @return TicketStatus
     */
    public function status(string $token): TicketStatus
    {
        $ticket = Ticket::whereToken($token)->firstOrFail();

        return $ticket->ticketStatus;
    }
}
