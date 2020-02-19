<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Agency;
use Sms\Services\AgencyService;

/**
 * Class AgencyController
 * @package Sms\Http\Controllers
 */
class AgencyController extends Controller
{
    /**
     * @var AgencyService
     */
    protected $agencyService;

    /**
     * AgencyController constructor.
     * @param ApiResponse $apiResponse
     * @param AgencyService $agencyService
     */
    public function __construct(ApiResponse $apiResponse, AgencyService $agencyService)
    {
        parent::__construct($apiResponse);
        $this->agencyService = $agencyService;
    }

    /**
     * @param Agency $data
     * @return JsonResponse
     */
    public function create(Agency $data): JsonResponse
    {
        $agency = $this->agencyService->create($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.agency.create.success'))
            ->setData([
                'agency' => $agency,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function agency(int $agencyId): JsonResponse
    {
        $agency = $this->agencyService->agency($agencyId);

        return $this->apiResponse
            ->setData([
                'agency' => $agency,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function agencies(): JsonResponse
    {
        $agencies = $this->agencyService->agencies();

        return $this->apiResponse
            ->setData([
                'agencies' => $agencies,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Agency $data
     * @return JsonResponse
     */
    public function edit(Agency $data): JsonResponse
    {
        $edited = $this->agencyService->edit($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.agency.edit.success'))
            ->setData([
                'agency' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $agencyId
     * @return JsonResponse
     */
    public function remove(int $agencyId): JsonResponse
    {
        $this->agencyService->remove($agencyId);

        return $this->apiResponse
            ->setMessage(__('messages.agency.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
