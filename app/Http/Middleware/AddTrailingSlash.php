<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
{
    $uri = $request->getRequestUri();

    if ($uri !== '/' && substr($uri, -1) !== '/') {
        return redirect($uri . '/', 301);
    }

    return $next($request);
}

}
