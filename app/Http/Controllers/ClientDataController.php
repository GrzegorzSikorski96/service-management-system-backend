<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\AgencyDataService;
use Sms\Services\ClientDataService;

/**
 * Class ClientDataController
 * @package Sms\Http\Controllers
 */
class ClientDataController extends Controller
{
    /**
     * @var AgencyDataService
     */
    protected $clientDataService;

    /**
     * ClientDataController constructor.
     * @param ApiResponse $apiResponse
     * @param ClientDataService $clientDataService
     */
    public function __construct(ApiResponse $apiResponse, ClientDataService $clientDataService)
    {
        parent::__construct($apiResponse);
        $this->clientDataService = $clientDataService;
    }

    /**
     * @param int $clientId
     * @return JsonResponse
     */
    public function tickets(int $clientId): JsonResponse
    {
        $tickets = $this->clientDataService->tickets($clientId);

        return $this->apiResponse
            ->setData([
                'tickets' => $tickets,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
