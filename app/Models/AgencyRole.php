<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AgencyRole extends Model
{
    protected $table = 'agency_roles';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agency_employees', 'agency_role_id');
    }
}
