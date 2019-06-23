<?php

declare(strict_types=1);

namespace Sms\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'created_by');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(AgencyRole::class, 'agency_role_id');
    }

    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class, 'agency_employees');
    }
}
