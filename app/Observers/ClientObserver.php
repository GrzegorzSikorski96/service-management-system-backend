<?php

declare(strict_types=1);

namespace Sms\Observers;

use Sms\Events\Event;
use Sms\Models\Client;
use Sms\Services\AgencyService;

class ClientObserver
{
    protected $agencyService;

    /**
     * ClientObserver constructor.
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    public function created(Client $client): void
    {
        event(new Event(["clients"], 'update'));
    }

    public function updated(Client $client): void
    {
        event(new Event(["client-$client->id"], 'update', ['client' => $client]));
        event(new Event(["clients"], 'update'));
    }

    public function deleted(Client $client): void
    {
        event(new Event(["clients"], 'update'));
        event(new Event(["client-$client->id"], 'remove'));
        event(new Event($this->agencyService->createAgenciesForEvents($client->agencies), 'statistics'));
    }
}
