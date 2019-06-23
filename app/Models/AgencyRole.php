<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class AgencyRole
 * @package Sms\Models
 */
class AgencyRole extends Model
{
    /**
     * @var string
     */
    protected $table = 'agency_roles';
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var integer
     */
    const MANAGER = 1;
    /**
     * @var integer
     */
    const SERVICEMAN = 2;

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agency_employees', 'agency_role_id');
    }
}
