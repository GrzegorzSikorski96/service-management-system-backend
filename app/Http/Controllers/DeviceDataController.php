<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\AgencyDataService;
use Sms\Services\DeviceDataService;

/**
 * Class DeviceDataController
 * @package Sms\Http\Controllers
 */
class DeviceDataController extends Controller
{
    /**
     * @var AgencyDataService
     */
    protected $deviceDataService;

    /**
     * DeviceDataController constructor.
     * @param ApiResponse $apiResponse
     * @param DeviceDataService $deviceDataService
     */
    public function __construct(ApiResponse $apiResponse, DeviceDataService $deviceDataService)
    {
        parent::__construct($apiResponse);
        $this->deviceDataService = $deviceDataService;
    }

    /**
     * @param int $deviceId
     * @return JsonResponse
     */
    public function tickets(int $deviceId): JsonResponse
    {
        $tickets = $this->deviceDataService->tickets($deviceId);

        return $this->apiResponse
            ->setData([
                'tickets' => $tickets,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
