<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Client;
use Sms\Services\ClientService;

/**
 * Class ClientController
 * @package Sms\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    protected $clientService;

    /**
     * ClientController constructor.
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
     * @param int $clientId
     * @return JsonResponse
     */
    public function client(int $clientId): JsonResponse
    {
        $client = $this->clientService->client($clientId);

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
     * @return JsonResponse
     */
    public function edit(Client $data): JsonResponse
    {
        $edited = $this->clientService->edit($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.client.edit.success'))
            ->setData([
                'client' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $clientId
     * @return JsonResponse
     */
    public function remove(int $clientId): JsonResponse
    {
        $this->clientService->remove($clientId);

        return $this->apiResponse
            ->setMessage(__('messages.client.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addByNumber(Request $request): JsonResponse
    {
        $client = $this->clientService->addByNumber($request->all());

        return $this->apiResponse
            ->setData([
                'client' => $client,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
