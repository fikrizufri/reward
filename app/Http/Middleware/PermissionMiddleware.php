<?php

namespace App\Http\Middleware;

use App\Traits\HasPermissionsTrait;
use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($request->user()->hasRole('superadmin')) {
            return $next($request);
        }
        if (!$request->user()->can($permission)) {
            abort(503);
        }

        return $next($request);
    }
}
