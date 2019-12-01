<?php

declare(strict_types=1);

namespace Sms\Services;

use Sms\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

/**
 * Class TokenService
 * @package Sms\Services
 */
class TokenService
{
    /**
     * @param User $user
     * @return string
     */
    public function generateToken(User $user): string
    {
        return JWTAuth::fromUser($user);
    }

    /**
     * @throws JWTException
     */
    public function deactivateToken(): void
    {
        JWTAuth::parseToken()->invalidate();
    }
}
