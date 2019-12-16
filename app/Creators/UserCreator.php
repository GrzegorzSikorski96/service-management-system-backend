<?php

declare(strict_types=1);

namespace Sms\Creators;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Sms\Models\Agency;
use Sms\Models\AgencyRole;
use Sms\Models\User;

/**
 * Class UserCreator
 * @package Sms\Creators
 */
class UserCreator
{
    /**
     * @param string $email
     * @param string $password
     * @return void
     */
    public function createOrReplaceUser(string $email, string $password): void
    {
        $user = User::withTrashed()->firstOrCreate(
            ['email' => $email],
            [
                'name' => 'testName',
                'surname' => 'testSurname',
                'password' => Hash::make($password),
                'agency_role_id' => AgencyRole::SERVICEMAN,
                'phone_number' => '000-000-000',
                'agency_id' => Agency::firstOrFail()->id,
            ]
        );

        $user->blocked_at = null;
        $user->deleted_at = null;

        $user->save();
    }

    /**
     * @param string $email
     */
    public function blockUser(string $email): void
    {
        $user = User::where('email', $email)->firstOrFail();
        $user->blocked_at = Carbon::now();

        $user->save();
    }

    /**
     * @param string $email
     */
    public function unblockUser(string $email): void
    {
        $user = User::where('email', $email)->firstOrFail();
        $user->blocked_at = null;

        $user->save();
    }

    /**
     * @param string $email
     * @return void
     */
    public function removeUserIfExists(string $email): void
    {
        User::where('email', $email)->delete();
    }
}
