<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Device;
use Sms\Services\DeviceService;
use Sms\Services\TicketService;

/**
 * Class TicketController
 * @package Sms\Http\Controllers
 */
class DeviceController extends Controller
{
    /**
     * @var TicketService
     */
    protected $deviceService;

    /**
     * TicketController constructor.
     * @param ApiResponse $apiResponse
     * @param DeviceService $deviceService
     */
    public function __construct(ApiResponse $apiResponse, DeviceService $deviceService)
    {
        parent::__construct($apiResponse);
        $this->deviceService = $deviceService;
    }

    /**
     * @param Device $data
     * @return JsonResponse
     */
    public function create(Device $data): JsonResponse
    {
        $device = $this->deviceService->create($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.device.create.success'))
            ->setData([
                'device' => $device,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function device(int $id): JsonResponse
    {
        $device = $this->deviceService->device($id);

        return $this->apiResponse
            ->setData([
                'device' => $device,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function devices(): JsonResponse
    {
        $devices = $this->deviceService->devices();

        return $this->apiResponse
            ->setData([
                'devices' => $devices,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Device $data
     * @param int $id
     * @return JsonResponse
     */
    public function edit(Device $data, int $id): JsonResponse
    {
        $edited = $this->deviceService->edit($data->all(), $id);

        return $this->apiResponse
            ->setMessage(__('messages.device.edit.success'))
            ->setData([
                'device' => $edited,
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
        $this->deviceService->remove($id);

        return $this->apiResponse
            ->setMessage(__('messages.device.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
