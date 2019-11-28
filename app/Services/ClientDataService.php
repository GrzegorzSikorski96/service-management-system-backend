<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ClientDataService
 * @package Sms\Services
 */
class ClientDataService
{
    /**
     * @var AgencyService
     */
    protected $clientService;

    /**
     * ClientDataService constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * @param int $clientId
     * @return LengthAwarePaginator
     */
    public function tickets(int $clientId): LengthAwarePaginator
    {
        $client = $this->clientService->client($clientId);

        return $client->tickets()->with('ticketStatus')->paginate(5);
    }
}
