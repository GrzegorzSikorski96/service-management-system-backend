<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Service
 * @package Sms\Models
 */
class Service extends Model
{
    /**
     * @var string
     */
    protected $table = 'services';

    /**
     * @return HasMany
     */
    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
