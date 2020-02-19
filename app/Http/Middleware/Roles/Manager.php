<?php

declare(strict_types=1);

namespace Sms\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sms\Models\AgencyRole;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $available = [
            AgencyRole::ADMINISTRATOR,
            AgencyRole::MANAGER,
        ];

        if (in_array(Auth::user()->role->id, $available)) {
            return $next($request);
        }

        throw new AccessDeniedHttpException();
    }
}
