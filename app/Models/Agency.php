<?php

declare(strict_types=1);

namespace Sms\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agency
 * @package Sms\Models
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property int $service_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Agency extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    /**
     * @var array
     */
    protected $softCascade = ['tickets', 'clients', 'devices', ];

    /**
     * @var string
     */
    protected $table = 'agencies';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'service_id',
    ];

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
        return $this->belongsToMany(Client::class, 'agency_clients')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class, 'agency_devices')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class, 'agency_tickets')->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
