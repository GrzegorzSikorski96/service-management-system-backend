<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Device;
use Sms\Services\DeviceService;

/**
 * Class DeviceController
 * @package Sms\Http\Controllers
 */
class DeviceController extends Controller
{
    /**
     * @var DeviceService
     */
    protected $deviceService;

    /**
     * DeviceController constructor.
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
     * @param int $deviceId
     * @return JsonResponse
     */
    public function device(int $deviceId): JsonResponse
    {
        $device = $this->deviceService->device($deviceId);

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
     * @param int $deviceId
     * @return JsonResponse
     */
    public function edit(Device $data): JsonResponse
    {
        $edited = $this->deviceService->edit($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.device.edit.success'))
            ->setData([
                'device' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $deviceId
     * @return JsonResponse
     */
    public function remove(int $deviceId): JsonResponse
    {
        $this->deviceService->remove($deviceId);

        return $this->apiResponse
            ->setMessage(__('messages.device.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
