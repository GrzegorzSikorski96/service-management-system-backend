<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Pagination\LengthAwarePaginator;
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
     * @return LengthAwarePaginator
     */
    public function notes(int $userId): LengthAwarePaginator
    {
        $user = $this->userService->user($userId);

        return $user->notes()->with('author', 'ticket')->orderByDesc('created_at')->paginate(5);
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
