<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $table = 'statuses';

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
