<?php

declare(strict_types=1);

namespace BehatTests\helpers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Sms\Creators\DeviceCreator;
use Sms\Models\Device;

/**
 * Trait Devices
 * @package BehatTests\helpers
 */
trait Devices
{
    /**
     * @Given device with id :deviceId exist
     * @param int $deviceId
     * @throws BindingResolutionException
     */
    public function deviceWithIdExist(int $deviceId): void
    {
        $creator = app()->make(DeviceCreator::class);
        $creator->createOrReplaceDevice($deviceId);
    }

    /**
     * @Given device with id :id has serial number :serialNumber
     * @param int $id
     * @param string $serialNumber
     */
    public function deviceWithIdHasSerialNumber(int $id, string $serialNumber): void
    {
        $device = Device::findOrFail($id);
        $device->serial_number = $serialNumber;

        $device->save();
    }
}
