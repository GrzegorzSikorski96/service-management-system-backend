<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\User;
use Sms\Services\UserService;

/**
 * Class UserController
 * @package Sms\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     * @param ApiResponse $apiResponse
     * @param UserService $userService
     */
    public function __construct(ApiResponse $apiResponse, UserService $userService)
    {
        parent::__construct($apiResponse);
        $this->userService = $userService;
    }

    /**
     * @param User $data
     * @return JsonResponse
     */
    public function create(User $data): JsonResponse
    {
        $this->userService->create($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.user.create.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function user(int $userId): JsonResponse
    {
        $user = $this->userService->user($userId);

        return $this->apiResponse
            ->setData([
                'user' => $user,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function users(): JsonResponse
    {
        $users = $this->userService->users();

        return $this->apiResponse
            ->setData([
                'users' => $users,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param User $data
     * @return JsonResponse
     */
    public function edit(User $data): JsonResponse
    {
        $edited = $this->userService->edit($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.user.edit.success'))
            ->setData([
                'user' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    public function block(int $userId): JsonResponse
    {
        $this->userService->block($userId);

        return $this->apiResponse
            ->setMessage(__('messages.user.block.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    public function unblock(int $userId): JsonResponse
    {
        $this->userService->unblock($userId);

        return $this->apiResponse
            ->setMessage(__('messages.user.unblock.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function remove(int $userId): JsonResponse
    {
        $this->userService->remove($userId);

        return $this->apiResponse
            ->setMessage(__('messages.user.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
