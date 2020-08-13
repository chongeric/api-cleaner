<?php

namespace ChongEric\ApiCleaner\Middleware;

use Closure;

class ApiAuthMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $status true/false 当满足条件时会进入 if 操作，否则按照 laravel 预定的执行。
//        $status = true;
        $status = false;
        if ($status) {
            return 'api中间件验证不通过';
        }
        return $next($request);
    }

}
