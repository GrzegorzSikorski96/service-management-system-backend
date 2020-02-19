<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return LengthAwarePaginator
     */
    public function tickets(int $deviceId): LengthAwarePaginator
    {
        $device = $this->deviceService->device($deviceId);

        return $device->tickets()->with('ticketStatus')->orderByDesc('created_at')->paginate(5);
    }
}
