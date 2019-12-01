<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\AgencyRoleService;

/**
 * Class AgencyRoleController
 * @package Sms\Http\Controllers
 */
class AgencyRoleController extends Controller
{
    /**
     * @var AgencyRoleService
     */
    protected $agencyRoleService;

    /**
     * AgencyRoleController constructor.
     * @param ApiResponse $apiResponse
     * @param AgencyRoleService $agencyRoleService
     */
    public function __construct(ApiResponse $apiResponse, AgencyRoleService $agencyRoleService)
    {
        parent::__construct($apiResponse);
        $this->agencyRoleService = $agencyRoleService;
    }

    /**
     * @return JsonResponse
     */
    public function roles(): JsonResponse
    {
        $roles = $this->agencyRoleService->roles();

        return $this->apiResponse
            ->setData([
                'roles' => $roles,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
