<?php

declare(strict_types=1);

namespace Sms\Services;

use Sms\Models\User;

/**
 * Class BaseService
 * @package Sms\Services
 */
class BaseService
{
    /**
     * @var AgencyService
     */
    protected $agencyService;

    /**
     * BaseService constructor.
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    /**
     * @return User
     */
    protected function currentUser(): User
    {
        return auth()->user();
    }
}
