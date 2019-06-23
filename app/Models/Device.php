<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Device
 * @package Sms\Models
 */
class Device extends Model
{
    /**
     * @var string
     */
    protected $table = 'devices';

    /**
     * @return BelongsToMany
     */
    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class, 'agency_devices');
    }

    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
