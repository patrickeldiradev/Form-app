<?php

namespace App\Modules\Analytics\QueryPipelines;

use Closure;

use function request;

class SortByPath
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! request()->has('endpoint')) {
            return $next($request);
        }

        $param = str_replace("'", "", request()->input('endpoint'));

        return $next($request)->where('path', $param);
    }
}
