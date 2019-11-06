<?php

declare(strict_types=1);

namespace Sms\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Sms\Models\Device;

class DeviceUpdate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function broadcastOn()
    {
        return ["device-{$this->device->id}"];
    }

    public function broadcastAs()
    {
        return 'deviceUpdate';
    }

    public function broadcastWith()
    {
        return [
            'device' => $this->device
        ];
    }
}
