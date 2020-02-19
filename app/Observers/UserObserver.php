<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\User;
use Sms\Services\AgencyService;

/**
 * Class UserObserver
 * @package Sms\Observers
 */
class UserObserver
{
    /**
     * @var AgencyService
     */
    protected $agencyService;

    /**
     * UserObserver constructor.
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    /**
     * @param User $user
     */
    public function created(User $user): void
    {
        event(new Event(["users"], 'update'));
        event(new Event(["agency-$user->agency_id"], 'statistics'));
    }

    /**
     * @param User $user
     */
    public function updated(User $user): void
    {
        event(new Event(["user-$user->id"], 'update', ['user' => $user]));
        event(new Event(["users"], 'update'));
    }

    /**
     * @param User $user
     */
    public function deleted(User $user): void
    {
        event(new Event(["users"], 'update'));
        event(new Event(["agency-$user->agency_id"], 'statistics'));
    }
}
