<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\Agency;

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
        $agency->save();

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
     * @param array $data
     * @param int $agencyId
     * @return Agency
     */
    public function edit(array $data, int $agencyId): Agency
    {
        $agency = $this->agency($agencyId);
        $agency->fill($data);
        $agency->save();

        return $agency;
    }

    /**
     * @param int $agencyId
     */
    public function remove(int $agencyId): void
    {
        $agency = Agency::findOrFail($agencyId);
        $agency->delete();
    }
}
