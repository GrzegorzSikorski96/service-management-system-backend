<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\TicketStatus;

/**
 * Class AgencyDataService
 * @package Sms\Services
 */
class AgencyDataService
{
    /**
     * @var AgencyService
     */
    protected $agencyService;

    /**
     * AgencyDataService constructor.
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    /**
     * @param int $agencyId
     * @return Collection
     */
    public function clients(int $agencyId): Collection
    {
        $agency = $this->agencyService->agency($agencyId);

        return $agency->clients;
    }

    /**
     * @param int $agencyId
     * @return array
     */
    public function statistics(int $agencyId): array
    {
        $agency = $this->agencyService->agency($agencyId);

        $ticketStatuses = [];

        foreach (TicketStatus::all() as $status) {
            $ticketStatuses[$status->name] = $agency->tickets()->where('ticket_status_id', $status->id)->count();
        }

        $statistics = [
            'employees' => $agency->employees()->count(),
            'clients' => $agency->clients()->count(),
            'devices' => $agency->devices()->count(),
            'tickets' => $agency->tickets()->count(),
            'ticketStatuses' => $ticketStatuses
        ];

        return $statistics;
    }

    /**
     * @param int $agencyId
     * @return Collection
     */
    public function devices(int $agencyId): Collection
    {
        $agency = $this->agencyService->agency($agencyId);

        return $agency->devices;
    }

    /**
     * @param int $agencyId
     * @return Collection
     */
    public function tickets(int $agencyId): Collection
    {
        $agency = $this->agencyService->agency($agencyId);

        return $agency->tickets;
    }

    /**
     * @param int $agencyId
     * @return Collection
     */
    public function employees(int $agencyId): Collection
    {
        $agency = $this->agencyService->agency($agencyId);

        return $agency->employees()->with('role')->get();
    }
}
