<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;

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
     * @return Collection
     */
    public function tickets(int $clientId): Collection
    {
        $client = $this->clientService->client($clientId);

        return $client->tickets;
    }
}
