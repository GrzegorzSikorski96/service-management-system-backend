<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\AgencyDataService;

/**
 * Class AgencyDataController
 * @package Sms\Http\Controllers
 */
class AgencyDataController extends Controller
{
    /**
     * @var AgencyDataService
     */
    protected $agencyDataService;

    /**
     * AgencyDataController constructor.
     * @param ApiResponse $apiResponse
     * @param AgencyDataService $agencyDataService
     */
    public function __construct(ApiResponse $apiResponse, AgencyDataService $agencyDataService)
    {
        parent::__construct($apiResponse);
        $this->agencyDataService = $agencyDataService;
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function clients(int $agencyId): JsonResponse
    {
        $clients = $this->agencyDataService->clients($agencyId);

        return $this->apiResponse
            ->setData([
                'clients' => $clients,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function statistics(int $agencyId): JsonResponse
    {
        $statistics = $this->agencyDataService->statistics($agencyId);

        return $this->apiResponse
            ->setData(
                $statistics
            )
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function devices(int $agencyId): JsonResponse
    {
        $devices = $this->agencyDataService->devices($agencyId);

        return $this->apiResponse
            ->setData([
                'devices' => $devices,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function employees(int $agencyId): JsonResponse
    {
        $employees = $this->agencyDataService->employees($agencyId);

        return $this->apiResponse
            ->setData([
                'employees' => $employees,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function tickets(int $agencyId): JsonResponse
    {
        $tickets = $this->agencyDataService->tickets($agencyId);

        return $this->apiResponse
            ->setData([
                'tickets' => $tickets,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
