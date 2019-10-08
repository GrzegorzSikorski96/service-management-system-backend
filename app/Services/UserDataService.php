<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;

/**
 * Class UserDataService
 * @package Sms\Services
 */
class UserDataService
{
    /**
     * @var AgencyService
     */
    protected $userService;

    /**
     * UserDataService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function notes(int $userId): Collection
    {
        $user = $this->userService->user($userId);

        return $user->notes;
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function agencies(int $userId): Collection
    {
        $user = $this->userService->user($userId);

        return $user->agencies;
    }
}
