<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\TicketStatusService;

class TicketStatusController extends Controller
{
    private $ticketStatusService;

    public function __construct(ApiResponse $apiResponse, TicketStatusService $ticketStatusService)
    {
        parent::__construct($apiResponse);
        $this->ticketStatusService = $ticketStatusService;
    }

    /**
     * @return JsonResponse
     */
    public function statuses(): JsonResponse
    {
        $statuses = $this->ticketStatusService->statuses();

        return $this->apiResponse
            ->setData([
                'ticket_statuses' => $statuses,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
