<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketStatus extends Model
{
    protected $table = 'ticket_statuses';
    public $timestamps = false;

    const PENDING = 1;
    const DURING = 2;
    const READY = 3;
    const ENDED = 4;
    const CANCELED = 5;

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
