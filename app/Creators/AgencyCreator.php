<?php

declare(strict_types=1);

namespace Sms\Creators;

use Exception;
use Sms\Models\Agency;
use Sms\Models\Device;
use Sms\Models\Service;

/**
 * Class AgencyCreator
 * @package Sms\Creators
 */
class AgencyCreator
{
    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function createOrReplaceAgency(int $id): void
    {
        $agency = Agency::withTrashed()->firstOrCreate(
            ['id' => $id],
            [
                'name' => 'testName',
                'address' => 'testowy adres',
                'service_id' => Service::firstOrFail(),
                'phone_number' => '12312312312',
            ]
        );

        $agency->deleted_at = null;
        $agency->save();
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
