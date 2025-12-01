<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();   

        // Kalo belum login -> tolak
        if (!$user) {
            abort(403, 'Forbidden');
        }

        // ADMIN bebas akses apa aja
        if ($user->role == 'admin') {
            return $next($request);
        }

        // GURU cuma boleh tolak route tertentu:
        if ($user->role == 'guru') {
            // misal user-management
            if ($request->is('user-management*')) {
                abort(403, 'Forbidden');
            }

            // selain user-management boleh
            return $next($request);
        }

        // SISWA dilarang total
        if ($user->role == 'siswa') {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
