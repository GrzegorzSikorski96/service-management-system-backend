<?php

declare(strict_types=1);

namespace Sms\Creators;

use Illuminate\Support\Facades\Hash;
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
                'agency_role_id' => AgencyRole::SERVICEMAN
            ]
        );

        $user->deleted_at = null;

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
