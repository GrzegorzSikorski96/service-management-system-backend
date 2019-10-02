<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agency
 * @package Sms\Models
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Agency extends Model
{
    use SoftDeletes;

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
