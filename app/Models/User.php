<?php

declare(strict_types=1);

namespace Sms\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package Sms\Models
 * @mixin Eloquent\
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $phone_number
 * @property int $agency_id
 * @property int $agency_role_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $blocked_at
 * @property Carbon $deleted_at
 */
class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes;
    use Notifiable;
    use SoftCascadeTrait;

    /**
     * @var array
     */
    protected $softCascade = ['notes'];

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'agency_role_id',
        'agency_id',
        'phone_number',
        'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(AgencyRole::class, 'agency_role_id');
    }

    /**
     * @return BelongsTo
     */
    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role->id == AgencyRole::ADMINISTRATOR;
    }

    /**
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->role->id == AgencyRole::MANAGER || $this->role->id == AgencyRole::ADMINISTRATOR;
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
