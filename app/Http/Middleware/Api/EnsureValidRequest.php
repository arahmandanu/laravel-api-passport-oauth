<?php

namespace App\Http\Middleware\Api;

use App\Traits\Api\MyResponse;
use Closure;
use Illuminate\Http\Request;

class EnsureValidRequest
{
    use MyResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->header('accept'), ['application/json'])) {
            return $next($request);
        }

        return $this->apiResponse(null, false, 'Not valid request!', 404);
    }
}
