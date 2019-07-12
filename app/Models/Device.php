<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Device
 * @package Sms\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $serial_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
