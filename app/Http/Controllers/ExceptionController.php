<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Class ExceptionController
 * @package Carina\Http\Controllers
 */
class ExceptionController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getNotFoundResponse(): JsonResponse
    {
        return $this->apiResponse
            ->setMessage(__('messages.not_found'))
            ->setFailureStatus(404)
            ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    public function getEmptyResponse(): JsonResponse
    {
        return $this->apiResponse
            ->setSuccessStatus()
            ->getResponse();
    }
}
