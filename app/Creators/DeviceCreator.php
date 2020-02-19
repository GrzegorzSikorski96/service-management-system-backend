<?php

declare(strict_types=1);

namespace Sms\Creators;

use Exception;
use Sms\Models\Device;

/**
 * Class DeviceCreator
 * @package Sms\Creators
 */
class DeviceCreator
{
    /**
     * @param int $id
     * @param int $agencyId
     * @return void
     * @throws Exception
     */
    public function createOrReplaceDevice(int $id, int $agencyId = 1): void
    {
        $device = Device::withTrashed()->firstOrCreate(
            ['id' => $id],
            [
                'name' => 'testName',
                'description' => 'Testowy opis',
                'serial_number' => substr(md5(strval(random_int(1, 10000))), 0, 8),
            ]
        );

        $device->agencies()->sync([$agencyId]);
        $device->deleted_at = null;

        $device->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function removeDeviceIfExists(int $id): void
    {
        Device::where('id', $id)->delete();
    }
}
