<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TicketStatus
 * @package Sms\Models
 * @property int $id
 * @property string $name
 */
class TicketStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'ticket_statuses';
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var integer
     */
    const PENDING = 1;
    /**
     * @var integer
     */
    const DURING = 2;
    /**
     * @var integer
     */
    const READY = 3;
    /**
     * @var integer
     */
    const ENDED = 4;
    /**
     * @var integer
     */
    const CANCELED = 5;

    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
