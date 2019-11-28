<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\AgencyRole;

/**
 * Class AgencyRoleService
 * @package Sms\Services
 */
class AgencyRoleService
{
    /**
     * @return Collection
     */
    public function roles(): Collection
    {
        return AgencyRole::all();
    }
}
