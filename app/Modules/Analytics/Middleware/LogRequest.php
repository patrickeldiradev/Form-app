<?php

namespace App\Modules\Analytics\Middleware;

use App\Modules\Analytics\Models\RequestLog;
use Closure;
use Illuminate\Http\Request;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();
        $requestMethod = $request->method();

        RequestLog::where([
            'name'  => $routeName,
            'method'  => $requestMethod,
        ])
            ->increment('hits');

        return $next($request);
    }
}
