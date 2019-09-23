<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Services\TokenService;

/**
 * Class AuthController
 * @package Sms\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var TokenService
     */
    protected $tokenService;

    /**
     * Create a new AuthController instance.
     *
     * @param ApiResponse $apiResponse
     * @param TokenService $tokenService
     */
    public function __construct(ApiResponse $apiResponse, TokenService $tokenService)
    {
        parent::__construct($apiResponse);
        $this->tokenService = $tokenService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password', ]);

        if (!$token = auth()->attempt($credentials)) {
            return $this->apiResponse
                ->setMessage(__('messages.login.fail'))
                ->setFailureStatus(401)
                ->getResponse();
        }

        $user = $this->guard()->user();

        return $this->apiResponse
            ->setMessage(__('messages.login.success'))
            ->setData([
                'token' => $token,
                'user' => $user,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->apiResponse
            ->setMessage(__('messages.logout.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->apiResponse
            ->setData([
                'token' => auth()->refresh(),
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
