<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Client;
use Sms\Services\ClientService;
use Sms\Services\TicketService;

/**
 * Class TicketController
 * @package Sms\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * @var TicketService
     */
    protected $clientService;

    /**
     * TicketController constructor.
     * @param ApiResponse $apiResponse
     * @param ClientService $clientService
     */
    public function __construct(ApiResponse $apiResponse, ClientService $clientService)
    {
        parent::__construct($apiResponse);
        $this->clientService = $clientService;
    }

    /**
     * @param Client $data
     * @return JsonResponse
     */
    public function create(Client $data): JsonResponse
    {
        $client = $this->clientService->create($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.client.create.success'))
            ->setData([
                'client' => $client,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function client(int $id): JsonResponse
    {
        $client = $this->clientService->client($id);

        return $this->apiResponse
            ->setData([
                'client' => $client,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function clients(): JsonResponse
    {
        $clients = $this->clientService->clients();

        return $this->apiResponse
            ->setData([
                'clients' => $clients,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Client $data
     * @param int $id
     * @return JsonResponse
     */
    public function edit(Client $data, int $id): JsonResponse
    {
        $edited = $this->clientService->edit($data->all(), $id);

        return $this->apiResponse
            ->setMessage(__('messages.client.edit.success'))
            ->setData([
                'client' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function remove(int $id): JsonResponse
    {
        $this->clientService->remove($id);

        return $this->apiResponse
            ->setMessage(__('messages.client.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
