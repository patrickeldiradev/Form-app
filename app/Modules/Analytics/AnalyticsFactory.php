<?php

namespace App\Modules\Analytics;

use App\Modules\Analytics\Mapper\RequestLogMapper;
use App\Modules\Analytics\Repositories\AnalyticsRepository;
use App\Modules\Analytics\Repositories\AnalyticsRepositoryInterface;
use App\Modules\Analytics\Services\AnalyticsRetriever;
use App\Modules\Analytics\Services\AnalyticsRetrieverInterface;

class AnalyticsFactory
{
    /**
     * @return AnalyticsRetriever
     */
    public function createAnalyticsRetriever(): AnalyticsRetrieverInterface
    {
        return new AnalyticsRetriever(
            $this->createAnalyticsRepository(),
        );
    }

    /**
     * @return AnalyticsRepositoryInterface
     */
    public function createAnalyticsRepository(): AnalyticsRepositoryInterface
    {
        return new AnalyticsRepository(
            $this->createRequestLogMapper(),
        );
    }

    /**
     * @return RequestLogMapper
     */
    public function createRequestLogMapper(): RequestLogMapper
    {
        return new RequestLogMapper();
    }
}
