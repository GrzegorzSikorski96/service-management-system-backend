<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Events\Event;
use Sms\Models\Agency;
use Sms\Models\Service;

/**
 * Class AgencyService
 * @package Sms\Services
 */
class AgencyService
{
    /**
     * @param array $request
     * @return Agency
     */
    public function create(array $request): Agency
    {
        $agency = new Agency($request);
        $agency->service_id = Service::firstOrFail()->id;
        $agency->save();

        event(new Event(["agencies"], 'update'));

        return $agency;
    }

    /**
     * @param int $agencyId
     * @return Agency
     */
    public function agency(int $agencyId): Agency
    {
        return Agency::findOrFail($agencyId);
    }

    /**
     * @return Collection
     */
    public function agencies(): Collection
    {
        return Agency::all();
    }

    /**
     * @param array $request
     * @return Agency
     */
    public function edit(array $request): Agency
    {
        $agency = $this->agency($request['id']);
        $agency->fill($request);
        $agency->save();

        event(new Event(["agency-$agency->id"], 'update', ['agency' => $agency]));
        event(new Event(["agencies"], 'update'));

        return $agency;
    }

    /**
     * @param int $agencyId
     */
    public function remove(int $agencyId): void
    {
        $agency = Agency::findOrFail($agencyId);
        $agency->delete();

        event(new Event(["agency-$agency->id"], 'remove'));
        event(new Event(["agencies"], 'update'));
    }

    /**
     * @param array $agencies
     * @return array
     */
    public function createAgenciesForEvents(array $agencies)
    {
        $agencyStrings = [];

        foreach ($agencies as $agency) {
            $agencyStrings[] = "agency-$agency->id";
        }

        return $agencyStrings;
    }
}
