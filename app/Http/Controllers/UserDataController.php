<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\UserDataService;

/**
 * Class UserDataController
 * @package Sms\Http\Controllers
 */
class UserDataController extends Controller
{
    /**
     * @var UserDataService
     */
    protected $userDataService;

    /**
     * UserDataController constructor.
     * @param ApiResponse $apiResponse
     * @param UserDataService $userDataService
     */
    public function __construct(ApiResponse $apiResponse, UserDataService $userDataService)
    {
        parent::__construct($apiResponse);
        $this->userDataService = $userDataService;
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function notes(int $userId): JsonResponse
    {
        $notes = $this->userDataService->clients($userId);

        return $this->apiResponse
            ->setData([
                'notes' => $notes,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function agencies(int $userId): JsonResponse
    {
        $agencies = $this->userDataService->agencies($userId);

        return $this->apiResponse
            ->setData([
                'agencies' => $agencies,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
