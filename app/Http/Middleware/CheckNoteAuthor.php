<?php

declare(strict_types=1);

namespace Sms\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Sms\Models\Note;

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
        $note = Note::findOrFail($request->route('noteId'));

        if (Auth::id() == $note->author_id) {
            $request['note'] = $note;
            return $next($request);
        }

        throw new UnauthorizedException();
    }
}
