<?php

declare(strict_types=1);

namespace Sms\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sms\Models\Note;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CheckNoteAuthor
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
        $note = Note::findOrFail($request->id);

        if (auth()->id() == $note->author_id) {
            return $next($request);
        }

        throw new AccessDeniedHttpException();
    }
}
