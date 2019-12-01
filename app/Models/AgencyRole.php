<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class AgencyRole
 * @package Sms\Models
 * @property int $id
 * @property string $name
 *
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
    const ADMINISTRATOR = 1;
    /**
     * @var integer
     */
    const MANAGER = 2;
    /**
     * @var integer
     */
    const SERVICEMAN = 3;

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'agency_employees', 'agency_role_id');
    }
}
