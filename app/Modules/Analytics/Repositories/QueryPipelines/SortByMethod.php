<?php

namespace App\Modules\Analytics\Repositories\QueryPipelines;

use Closure;

class SortByMethod
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! request()->has('method')) {
            return $next($request);
        }

        return $next($request)->where('method', request()->input('method'));
    }
}
