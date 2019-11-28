<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Device;
use Sms\Services\AgencyService;

class DeviceObserver
{
    protected $agencyService;

    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    public function created(Device $device): void
    {
        event(new Event(["devices"], 'update'));
    }

    public function updated(Device $device): void
    {
        event(new Event(["device-$device->id"], 'update', ['device' => $device]));
        event(new Event(["devices"], 'update'));
    }

    public function deleted(Device $device): void
    {
        event(new Event(["devices"], 'update'));
        event(new Event(["device-$device->id"], 'remove'));
        event(new Event($this->agencyService->createAgenciesForEvents($device->agencies), 'statistics'));
    }
}
