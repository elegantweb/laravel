<?php

namespace App\Http\Middleware;

use Closure;

class CheckForAssetsUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = config('app.assets_url');

        if (starts_with($request->url(), $url)) {
            return redirect(config('app.url'), 301);
        } else {
            return $next($request);
        }
    }
}
