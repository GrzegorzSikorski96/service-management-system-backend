<?php

declare(strict_types=1);

namespace Sms\Events;

/**
 * Class BaseEvent
 * @package Sms\Events
 */
class BaseEvent
{
    /**
     * @var array
     */
    public $channels;
    /**
     * @var string
     */
    public $event;
    /**
     * @var array
     */
    public $data;

    /**
     * Create a new event instance.
     *
     * @param array $channels
     * @param string $event
     * @param array $data
     */
    public function __construct(array $channels, string $event, array $data = [])
    {
        $this->channels = $channels;
        $this->event = $event;
        $this->data = $data;
    }
}
