<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Client
 * @package Sms\Models
 */
class Client extends Model
{
    /**
     * @var string
     */
    protected $table = 'clients';

    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * @return BelongsToMany
     */
    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class, 'agency_clients');
    }
}
