<?php

namespace App\Modules\Analytics\Service;

use App\Modules\Analytics\Repositories\AnalyticsRepository;

class AnalyticsRetriever
{
    protected AnalyticsRepository $analyticsRepository;

    /**
     * @param AnalyticsRepository $analyticsRepository
     */
    public function __construct(AnalyticsRepository $analyticsRepository)
    {
        $this->analyticsRepository = $analyticsRepository;
    }

    public function get()
    {
        return $this->analyticsRepository->getAnalytics();
    }
}
