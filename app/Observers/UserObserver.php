<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\User;
use Sms\Services\AgencyService;

class UserObserver
{
    protected $agencyService;

    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    public function created(User $user): void
    {
        event(new Event(["users"], 'update'));
        event(new Event(["agency-$user->agency_id"], 'statistics'));
    }

    public function updated(User $user): void
    {
        event(new Event(["user-$user->id"], 'update', ['user' => $user]));
        event(new Event(["users"], 'update'));
    }

    public function deleted(User $user): void
    {
        event(new Event(["users"], 'update'));
        event(new Event(["agency-$user->agency_id"], 'statistics'));
    }
}
