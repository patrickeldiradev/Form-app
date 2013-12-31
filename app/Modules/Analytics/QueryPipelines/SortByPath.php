<?php

namespace App\Modules\Analytics\QueryPipelines;

use Closure;

class SortByPath
{
    /**
     * @var string
     */
    protected ?string $path;

    /**
     * @param string $path
     */
    public function __construct(?string $path)
    {
        $this->path = $path;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($this->path)) {
            return $next($request);
        }

        $param = str_replace("'", "", $this->path);

        return $next($request)->where('path', $param);
    }
}
