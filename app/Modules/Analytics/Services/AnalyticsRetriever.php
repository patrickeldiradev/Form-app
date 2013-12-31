<?php

namespace App\Modules\Analytics\Services;

use App\Modules\Analytics\Repositories\AnalyticsRepository;
use Illuminate\Support\Collection;

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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function get(): Collection
    {
        return $this->analyticsRepository->getAnalytics();
    }
}
