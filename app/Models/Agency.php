<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Agency extends Model
{
    protected $table = 'agencies';

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'agency_clients');
    }

    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class, 'agency_devices');
    }

    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class, 'agency_tickets');
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agency_employees');
    }
}
