<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\TicketDataService;

/**
 * Class TicketDataController
 * @package Sms\Http\Controllers
 */
class TicketDataController extends Controller
{
    /**
     * @var TicketDataService
     */
    protected $ticketDataService;

    /**
     * TicketDataController constructor.
     * @param ApiResponse $apiResponse
     * @param TicketDataService $ticketDataService
     */
    public function __construct(ApiResponse $apiResponse, TicketDataService $ticketDataService)
    {
        parent::__construct($apiResponse);
        $this->ticketDataService = $ticketDataService;
    }

    /**
     * @param int $ticketId
     * @return JsonResponse
     */
    public function notes(int $ticketId): JsonResponse
    {
        $tickets = $this->ticketDataService->notes($ticketId);

        return $this->apiResponse
            ->setData([
                'tickets' => $tickets,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param string $token
     * @return JsonResponse
     */
    public function status(string $token): JsonResponse
    {
        $status = $this->ticketDataService->status($token);

        return $this->apiResponse
            ->setData([
                'status' => $status,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
