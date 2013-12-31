<?php

namespace App\Modules\Analytics;

use App\Modules\Analytics\Mapper\RequestLogMapper;
use App\Modules\Analytics\Repositories\AnalyticsRepository;
use App\Modules\Analytics\Services\AnalyticsRetriever;

class AnalyticsFactory
{
    /**
     * @return AnalyticsRetriever
     */
    public function createAnalyticsRetriever(): AnalyticsRetriever
    {
        return new AnalyticsRetriever(
            $this->createAnalyticsRepository(),
        );
    }

    /**
     * @return AnalyticsRetriever
     */
    public function createAnalyticsRepository(): AnalyticsRepository
    {
        return new AnalyticsRepository(
            $this->createRequestLogMapper(),
        );
    }

    public function createRequestLogMapper(): RequestLogMapper
    {
        return new RequestLogMapper();
    }
}
