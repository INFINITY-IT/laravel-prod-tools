<?php

namespace Mohamedhk2\LaravelProdTools\Middlewares;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use LaravelNonWwwRedirect\LaravelNonWwwRedirectMiddleware as LaravelNonWwwRedirectMiddlewareBase;

class LaravelNonWwwRedirectMiddleware extends LaravelNonWwwRedirectMiddlewareBase
{
    /**
     * @param Request $request
     * @param \Closure $next
     *
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if (config('no-www.redirect_to_www', false))
            return parent::handle($request, $next);
        return $next($request);
    }
}
