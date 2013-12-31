<?php

namespace App\Modules\Analytics\Repositories;

use App\Modules\Analytics\Mapper\RequestLogMapper;
use App\Modules\Analytics\Models\RequestLog;
use App\Modules\Analytics\QueryPipelines\SortByMethod;
use App\Modules\Analytics\QueryPipelines\SortByPath;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;

class AnalyticsRepository
{
    protected RequestLogMapper $requestLogMapper;

    /**
     * @param RequestLogMapper $requestLogMapper
     */
    public function __construct(RequestLogMapper $requestLogMapper)
    {
        $this->requestLogMapper = $requestLogMapper;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAnalytics(): Collection
    {
        $dataCollection =  app(Pipeline::class)
            ->send(RequestLog::query())
            ->through([
                SortByPath::class,
                SortByMethod::class,
            ])
            ->thenReturn()
            ->get();

        return $this->requestLogMapper->mapCollection($dataCollection);
    }
}
