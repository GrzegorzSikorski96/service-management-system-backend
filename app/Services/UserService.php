<?php

declare(strict_types=1);

namespace Sms\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Sms\Models\User;

/**
 * Class AgencyService
 * @package Sms\Services
 */
class UserService
{
    /**
     * @param array $request
     * @return User
     */
    public function create(array $request): User
    {
        $user = new User($request);
        $user->save();

        return $user;
    }

    /**
     * @param int $userId
     * @return User
     */
    public function user(int $userId): User
    {
        return User::findOrFail($userId);
    }

    /**
     * @return Collection
     */
    public function users(): Collection
    {
        return User::all();
    }

    /**
     * @param array $data
     * @param int $userId
     * @return User
     */
    public function edit(array $data, int $userId): User
    {
        $user = $this->user($userId);
        $user->fill($data);
        $user->save();

        return $user;
    }

    /**
     * @param int $userId
     */
    public function remove(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->delete();
    }

    public function block(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->blocked_at = Carbon::now();
        $user->save();
    }

    public function unblock(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->blocked_at = null;
        $user->save();
    }
}
