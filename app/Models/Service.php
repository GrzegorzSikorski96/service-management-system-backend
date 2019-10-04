<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Service
 * @package Sms\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property int $owner_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Service extends Model
{
    /**
     * @var string
     */
    protected $table = 'services';

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
     * @return HasMany
     */
    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
