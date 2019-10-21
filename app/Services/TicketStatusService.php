<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\TicketStatus;

/**
 * Class TicketStatusService
 * @package Sms\Services
 */
class TicketStatusService
{
    /**
     * @return Collection
     */
    public function statuses(): Collection
    {
        return TicketStatus::all();
    }
}
