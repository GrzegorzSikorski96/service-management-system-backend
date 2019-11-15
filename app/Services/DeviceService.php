<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Events\DeviceCreate;
use Sms\Events\DeviceUpdate;
use Sms\Models\Device;

/**
 * Class DeviceService
 * @package Sms\Services
 */
class DeviceService
{
    /**
     * @param array $request
     * @return Device
     */
    public function create(array $request): Device
    {
        $device = new Device($request);
        $device->save();

        event(new DeviceCreate($device));

        return $device;
    }

    /**
     * @param int $deviceId
     * @return Device
     */
    public function device(int $deviceId): Device
    {
        return Device::with(['tickets.ticketStatus'])->findOrFail($deviceId);
    }

    /**
     * @return Collection
     */
    public function devices(): Collection
    {
        return Device::all();
    }

    /**
     * @param array $data
     * @param int $deviceId
     * @return Device
     */
    public function edit(array $data): Device
    {
        $device = $this->device($data['id']);
        $device->fill($data);
        $device->save();

        event(new DeviceUpdate($device));

        return $device;
    }

    /**
     * @param int $deviceId
     */
    public function remove(int $deviceId): void
    {
        $device = Device::findOrFail($deviceId);
        $device->delete();
    }
}
