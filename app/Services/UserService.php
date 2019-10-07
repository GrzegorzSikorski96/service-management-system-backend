<?php

declare(strict_types=1);

namespace Sms\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
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
        return User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => $this->hashPassword($request['password']),
            'agency_role_id' => $request['agency_role_id'],]);
    }

    public function hashPassword(string $password): string
    {
        return Hash::make($password);
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

        $user->name = $data['name'];
        $user->surname = $data['surname'];

        if ($user->email != $data['email']) {
            $user->email = $data['email'];
        }


        $user->agency_role_id = $data['agency_role_id'];
        $user->password = $this->hashPassword($data['password']);
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

    public function notes(int $userId): Collection
    {
        $user = $this->user($userId);

        return $user->notes()
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
