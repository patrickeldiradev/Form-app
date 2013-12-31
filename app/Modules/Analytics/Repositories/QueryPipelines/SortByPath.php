<?php

namespace App\Modules\Analytics\Repositories\QueryPipelines;

use Closure;

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
