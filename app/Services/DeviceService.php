<?php

declare(strict_types=1);

namespace Sms\Services;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Sms\Models\Device;

/**
 * Class TicketService
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

        return $device;
    }

    /**
     * @param int $id
     * @return Device
     * @throws ModelNotFoundException
     */
    public function device(int $id): Device
    {
        return Device::findOrFail($id);
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
     * @param int $id
     * @return Device
     */
    public function edit(array $data, int $id): Device
    {
        $device = $this->device($id);
        $device->fill($data);
        $device->save();

        return $device;
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function remove(int $id): void
    {
        $device = Device::findOrFail($id);
        $device->delete();
    }
}
