<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Ticket;
use Sms\Services\TicketService;

/**
 * Class TicketController
 * @package Sms\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * TicketController constructor.
     * @param ApiResponse $apiResponse
     * @param TicketService $ticketService
     */
    public function __construct(ApiResponse $apiResponse, TicketService $ticketService)
    {
        parent::__construct($apiResponse);
        $this->ticketService = $ticketService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $ticket = $this->ticketService->create($request->all());

        return $this->apiResponse
            ->setMessage(__('messages.ticket.create.success'))
            ->setData([
                'ticket' => $ticket,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function ticket(int $id): JsonResponse
    {
        $ticket = $this->ticketService->ticket($id);

        return $this->apiResponse
            ->setData([
                'ticket' => $ticket,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function tickets(): JsonResponse
    {
        $tickets = $this->ticketService->tickets();

        return $this->apiResponse
            ->setData([
                'ticket' => $tickets,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function remove(int $id): void
    {
        $this->ticketService->remove($id);
    }
}
