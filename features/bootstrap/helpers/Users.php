<?php

declare(strict_types=1);

namespace BehatTests\helpers;

use Carbon\Carbon;
use Exception;
use Sms\Creators\UserCreator;
use Sms\Models\Agency;
use Sms\Models\AgencyRole;
use Sms\Models\User;

/**
 * Trait Users
 * @package BehatTests\helpers
 */
trait Users
{
    /**
     * @Given user with email :email and password :password exists
     * @Given user with email :email exists
     * @param string $email
     * @param string $password
     * @return void
     * @throws Exception
     */
    public function userWithEmailAndPasswordExists(string $email, string $password = 'secret'): void
    {
        /** @var UserCreator $creator */
        $creator = app()->make(UserCreator::class);
        $creator->createOrReplaceUser($email, $password);
    }

    /**
     * @Given user with email :email not exists
     * @param string $email
     * @return void
     * @throws Exception
     */
    public function userWithEmailNotExists(string $email): void
    {
        /** @var UserCreator $creator */
        $creator = app()->make(UserCreator::class);
        $creator->removeUserIfExists($email);
    }

    /**
     * @Given authenticated by email :email and password :password
     * @param string $email
     * @param string $password
     */
    public function authenticatedByEmailAndPassword(string $email, string $password): void
    {
        $jwtToken = auth()->attempt(['email' => $email, 'password' => $password]);

        $this->request->headers->add(['Authorization' => 'Bearer ' . $jwtToken]);
    }

    /**
     * @Given user with email :email are blocked
     * @param $email
     */
    public function userWithEmailAreBlocked(string $email): void
    {
        $user = User::where('email', $email)->firstOrFail();
        $user->blocked_at = Carbon::now();
        $user->save();
    }

    /**
     * @Given user role is :roleName
     * @param $roleName
     */
    public function userRoleIs($roleName): void
    {
        $role = AgencyRole::where('name', $roleName)->firstOrFail();

        $user = auth()->user();
        $user->agency_role_id = $role->id;

        $user->save();
    }

    /**
     * @Given user is unauthenticated
     */
    public function userIsUnauthenticated(): void
    {
        if (auth()->check()) {
            auth()->logout();
        }
    }

    /**
     * @Given user agency id :id
     * @param int $id
     */
    public function userAgencyId(int $id): void
    {
        $agency = Agency::findOrFail($id);

        auth()->user()->agency_id = $agency->id;
    }
}
