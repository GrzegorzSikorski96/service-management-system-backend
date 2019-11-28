<?php

declare(strict_types=1);

namespace Sms\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Sms\Events\Event;
use Sms\Models\AgencyRole;
use Sms\Models\User;

/**
 * Class AgencyService
 * @package Sms\Services
 */
class UserService extends BaseService
{
    /**
     * @param array $request
     * @return User
     */
    public function create(array $request): User
    {
        $user = new User($request);
        $user->save();

        event(new Event(["users"], 'update'));
        event(new Event(["agency-$user->agency_id"], 'statistics'));

        return $user;
    }

    /**
     * @param string $password
     * @return string
     */
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
        if ($this->currentUser()->role->id == AgencyRole::ADMINISTRATOR) {
            return User::with('role')->findOrFail($userId);
        }

        return $this->currentUser()->agency->employees()->findOrFail($userId);
    }

    /**
     * @return Collection
     */
    public function users(): Collection
    {
        if ($this->currentUser()->role->id == AgencyRole::ADMINISTRATOR) {
            return User::with('role')->get();
        }

        return $this->currentUser()->agency->employees()->with('role')->get();
    }

    /**
     * @param array $data
     * @return User
     */
    public function edit(array $data): User
    {
        $user = $this->user($data['id']);

        $user->name = $data['name'];
        $user->surname = $data['surname'];

        if ($user->email != $data['email']) {
            $user->email = $data['email'];
        }

        $user->phone_number = $data['phone_number'];
        $user->agency_role_id = $data['agency_role_id'];

        if (array_key_exists('password', $data)) {
            $user->password = $this->hashPassword($data['password']);
        }

        $user->save();

        event(new Event(["user-$user->id"], 'update', ['user' => $user]));
        event(new Event(["users"], 'update'));

        return $user;
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function remove(int $userId): bool
    {
        if (auth()->user()->isAdmin()) {
            $user = User::findOrFail($userId);
        } else {
            $user = auth()->user()->agency->employees()->findOrFail($userId);
        }

        if (auth()->id() != $userId && auth()->user()->isManager()) {
            $user->delete();

            event(new Event(["users"], 'update'));
            event(new Event(["agency-$user->agency_id"], 'statistics'));

            return true;
        }

        return false;
    }

    /**
     * @param int $userId
     */
    public function block(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->blocked_at = Carbon::now();
        $user->save();

        event(new Event(["user-$user->id"], 'update'));
        event(new Event(["users"], 'update'));
    }

    /**
     * @param int $userId
     */
    public function unblock(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->blocked_at = null;
        $user->save();

        event(new Event(["user-$user->id"], 'update'));
        event(new Event(["users"], 'update'));
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function notes(int $userId): Collection
    {
        $user = $this->user($userId);

        return $user->notes()
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
