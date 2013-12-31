<?php

namespace App\Modules\Analytics\QueryPipelines;

use Closure;

class SortByMethod
{
    /**
     * @var string
     */
    protected ?string $method;

    /**
     * @param string $method
     */
    public function __construct(?string $method)
    {
        $this->method = $method;
    }


    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($this->method)) {
            return $next($request);
        }

        return $next($request)->where('method', $this->method);
    }
}
