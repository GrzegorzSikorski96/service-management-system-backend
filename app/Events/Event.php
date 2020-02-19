<?php

declare(strict_types=1);

namespace Sms\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Event extends BaseEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return $this->channels;
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return $this->event;
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return $this->data;
    }
}
