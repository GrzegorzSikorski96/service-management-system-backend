<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $table = 'services';

    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
