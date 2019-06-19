<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    protected $table = 'devices';

    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class, 'agency_devices');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
