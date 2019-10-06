<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
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
     * @param Ticket $request
     * @return JsonResponse
     */
    public function create(Ticket $request): JsonResponse
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
     * @param int $ticketId
     * @return JsonResponse
     */
    public function ticket(int $ticketId): JsonResponse
    {
        $ticket = $this->ticketService->ticket($ticketId);

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
     * @param Ticket $data
     * @param int $ticketId
     * @return JsonResponse
     */
    public function edit(Ticket $data, int $ticketId): JsonResponse
    {
        $edited = $this->ticketService->edit($data->all(), $ticketId);

        return $this->apiResponse
            ->setMessage(__('messages.ticket.edit.success'))
            ->setData([
                'client' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $ticketId
     * @return JsonResponse
     */
    public function remove(int $ticketId): JsonResponse
    {
        $this->ticketService->remove($ticketId);

        return $this->apiResponse
            ->setMessage(__('messages.ticket.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    public function notes(int $ticketId): JsonResponse
    {
        $notes = $this->ticketService->notes($ticketId);

        return $this->apiResponse
            ->setData([
                'notes' => $notes,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
