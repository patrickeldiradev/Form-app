<?php

namespace App\Modules\Analytics\Repositories;

use App\Modules\Analytics\Mapper\RequestLogMapper;
use App\Modules\Analytics\Models\RequestLog;
use App\Modules\Analytics\QueryPipelines\SortByMethod;
use App\Modules\Analytics\QueryPipelines\SortByPath;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;

class AnalyticsRepository implements AnalyticsRepositoryInterface
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
     * @param array $data
     * @return Collection
     */
    public function getAnalytics(array $data): Collection
    {
        $endpoint = $data['endpoint'] ?? null;
        $method = $data['method'] ?? null;

        $dataCollection =  app(Pipeline::class)
            ->send(RequestLog::query())
            ->through([
                new SortByPath($endpoint),
                new SortByMethod($method),
            ])
            ->thenReturn()
            ->get();

        return $this->requestLogMapper->mapCollection($dataCollection);
    }
}
