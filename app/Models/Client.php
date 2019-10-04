<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package Sms\Models
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $description
 * @property string $address
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Client extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'clients';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'description',
        'address',
    ];

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
