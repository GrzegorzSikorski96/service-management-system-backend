<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Agency
 * @package Sms\Models
 */
class Agency extends Model
{
    /**
     * @var string
     */
    protected $table = 'agencies';

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return BelongsToMany
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'agency_clients');
    }

    /**
     * @return BelongsToMany
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class, 'agency_devices');
    }

    /**
     * @return BelongsToMany
     */
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class, 'agency_tickets');
    }

    /**
     * @return BelongsToMany
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agency_employees');
    }
}
