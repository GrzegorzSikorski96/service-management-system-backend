<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\AgencyRoleService;

class AgencyRoleController extends Controller
{
    protected $agencyRoleService;

    public function __construct(ApiResponse $apiResponse, AgencyRoleService $agencyRoleService)
    {
        parent::__construct($apiResponse);
        $this->agencyRoleService = $agencyRoleService;
    }

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
