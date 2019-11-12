<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Login;
use Sms\Models\User;
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
     * @param Login $request
     * @return JsonResponse
     */
    public function login(Login $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->only(['email', 'password',]))) {
            return $this->apiResponse
                ->setMessage(__('messages.login.fail'))
                ->setFailureStatus(400)
                ->getResponse();
        }

        $user = User::with('role')->find(Auth::id());

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
    public function logout(): JsonResponse
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
    public function refresh(): JsonResponse
    {
        return $this->apiResponse
            ->setData([
                'token' => auth()->refresh(),
            ])
            ->setSuccessStatus()
            ->getResponse();
    }
}
