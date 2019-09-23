<?php

declare(strict_types=1);

namespace Sms\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Sms\Http\Controllers\Controller;
use Sms\Http\Requests\Register;
use Sms\Models\User;

/**
 * Class RegisterController
 * @package Carina\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /**
     * @param Register $request
     * @return JsonResponse
     */
    public function register(Register $request): JsonResponse
    {
        $this->create($request->only(['name', 'email', 'password', ]));

        return $this->registered()
            ?: $this->apiResponse
                ->setMessage(__('messages.registration.failed'))
                ->setFailureStatus(400)
                ->getResponse();
    }

    /**
     * @return JsonResponse
     */
    protected function registered(): JsonResponse
    {
        return $this->apiResponse
            ->setMessage(__('messages.registration.success'))
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param array $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
