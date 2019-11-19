<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Sms\Events\DeviceCreate;
use Sms\Events\DeviceUpdate;
use Sms\Models\AgencyRole;
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
        $user = Auth::user();

        if ($user->role->id == AgencyRole::ADMINISTRATOR) {
            return Device::all();
        }

        return $user->agency->devices;
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

    /**
     * @param array $data
     * @return Device
     */
    public function addBySerialNumber(array $data): Device
    {
        $agency = Auth::user()->agency;

        $device = Device::where('serial_number', $data['serial_number'])->firstOrFail();

        $agency->devices()->syncWithoutDetaching($device);
        $agency->tickets()->syncWithoutDetaching($device->tickets);

        $agency->save();

        return $device;
    }
}
