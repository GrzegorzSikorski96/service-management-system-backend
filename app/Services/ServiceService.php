<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Validation\UnauthorizedException;
use Sms\Models\Service;

/**
 * Class ServiceService
 * @package Sms\Services
 */
class ServiceService
{
    /**
     * @param array $request
     * @return Service
     */
    public function initialize(array $request): Service
    {
        if (Service::first()) {
            throw new UnauthorizedException();
        }

        $service = new Service($request);
        $service->save();

        return $service;
    }

    public function service(): Service
    {
        return Service::first();
    }

    /**
     * @param array $data
     * @return Service
     */
    public function edit(array $data): Service
    {
        $service = $this->service();
        $service->fill($data);
        $service->save();

        return $service;
    }
}
