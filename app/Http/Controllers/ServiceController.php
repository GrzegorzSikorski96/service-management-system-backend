<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Service;
use Sms\Services\ServiceService;

/**
 * Class ServiceController
 * @package Sms\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * @var ServiceService
     */
    protected $serviceService;

    /**
     * ServiceController constructor.
     * @param ApiResponse $apiResponse
     * @param ServiceService $serviceService
     */
    public function __construct(ApiResponse $apiResponse, ServiceService $serviceService)
    {
        parent::__construct($apiResponse);
        $this->serviceService = $serviceService;
    }

    /**
     * @param Service $data
     * @return JsonResponse
     */
    public function initialize(Service $data): JsonResponse
    {
        $service = $this->serviceService->initialize($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.service.create.success'))
            ->setData([
                'service' => $service,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function service(): JsonResponse
    {
        $service = $this->serviceService->service();

        return $this->apiResponse
            ->setData([
                'service' => $service,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function isInitialized(): JsonResponse
    {
        $initialized = $this->serviceService->isInitialized();

        return $this->apiResponse
            ->setData([
                'initialized' => $initialized,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Service $data
     * @return JsonResponse
     */
    public function edit(Service $data): JsonResponse
    {
        $edited = $this->serviceService->edit($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.service.edit.success'))
            ->setData([
                'service' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
