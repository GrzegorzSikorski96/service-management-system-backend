<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Events\Event;
use Sms\Models\Device;

/**
 * Class DeviceService
 * @package Sms\Services
 */
class DeviceService extends BaseService
{
    /**
     * @param array $request
     * @return Device
     */
    public function create(array $request): Device
    {
        $device = new Device($request);
        $device->save();

        if (!array_key_exists('agency_id', $request)) {
            $request['agency_id'] = auth()->user()->agency->id;
        }

        $agency = $this->agencyService->agency($request['agency_id']);
        $agency->devices()->attach($device);
        $agency->save();

        event(new Event(["devices"], 'update'));
        event(new Event(["agency-$agency->id"], 'statistics'));

        return $device;
    }

    /**
     * @param int $deviceId
     * @return Device
     */
    public function device(int $deviceId): Device
    {
        if ($this->currentUser()->isAdmin()) {
            return Device::with(['tickets.ticketStatus'])->findOrFail($deviceId);
        }

        return $this->currentUser()->agency->devices()->with('tickets.ticketStatus')->findOrFail($deviceId);
    }

    /**
     * @return Collection
     */
    public function devices(): Collection
    {
        if ($this->currentUser()->isAdmin()) {
            return Device::all();
        }

        return $this->currentUser()->agency->devices;
    }

    /**
     * @param array $data
     * @return Device
     */
    public function edit(array $data): Device
    {
        $device = $this->device($data['id']);
        $device->fill($data);
        $device->save();

        event(new Event(["device-$device->id"], 'update', ['device' => $device]));
        event(new Event(["devices"], 'update'));

        return $device;
    }

    /**
     * @param int $deviceId
     */
    public function remove(int $deviceId): void
    {
        $device = Device::findOrFail($deviceId);
        $device->delete();

        event(new Event(["devices"], 'update'));
        event(new Event(["device-$device->id"], 'remove'));
        event(new Event($this->agencyService->createAgenciesForEvents($device->agencies), 'statistics'));
    }

    /**
     * @param array $data
     * @return Device
     */
    public function addBySerialNumber(array $data): Device
    {
        $device = Device::where('serial_number', $data['serial_number'])->firstOrFail();

        $agency = $this->agencyService->agency($data['agency_id']);
        $agency->devices()->syncWithoutDetaching($device);
        $agency->tickets()->syncWithoutDetaching($device->tickets);

        foreach ($device->tickets as $ticket) {
            $agency->clients()->syncWithoutDetaching($ticket->client);
        }

        $agency->save();

        event(new Event(["devices"], 'update'));
        event(new Event(["agency-$agency->id"], 'statistics'));

        return $device;
    }
}
