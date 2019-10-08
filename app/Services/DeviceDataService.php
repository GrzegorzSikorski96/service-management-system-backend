<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;

/**
 * Class DeviceDataService
 * @package Sms\Services
 */
class DeviceDataService
{
    /**
     * @var AgencyService
     */
    protected $deviceService;

    /**
     * DeviceDataService constructor.
     * @param DeviceService $deviceService
     */
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * @param int $deviceId
     * @return Collection
     */
    public function tickets(int $deviceId): Collection
    {
        $device = $this->deviceService->device($deviceId);

        return $device->tickets;
    }
}
