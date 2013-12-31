<?php

namespace App\Modules\Analytics\Repositories;

use App\Models\RequestLog;
use App\Modules\Analytics\Mapper\RequestLogMapper;

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
     * @return void
     */
    public function getAnalytics()
    {
        $dataCollection = RequestLog::all();

        return $this->requestLogMapper->map($dataCollection);
    }
}
