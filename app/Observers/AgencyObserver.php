<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Agency;

/**
 * Class AgencyObserver
 * @package Sms\Observers
 */
class AgencyObserver
{
    /**
     * @param Agency $agency
     */
    public function created(Agency $agency): void
    {
        event(new Event(["agencies"], 'update'));
    }

    /**
     * @param Agency $agency
     */
    public function updated(Agency $agency): void
    {
        event(new Event(["agency-$agency->id"], 'update', ['agency' => $agency]));
        event(new Event(["agencies"], 'update'));
    }

    /**
     * @param Agency $agency
     */
    public function deleted(Agency $agency): void
    {
        event(new Event(["agency-$agency->id"], 'remove'));
        event(new Event(["agencies"], 'update'));
    }
}
