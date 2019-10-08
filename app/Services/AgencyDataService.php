<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;

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

        return $agency->employees;
    }
}
