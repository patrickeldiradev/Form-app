<?php

namespace App\Modules\Analytics\Services;

use App\Modules\Analytics\Repositories\AnalyticsRepository;
use App\Modules\Analytics\Repositories\AnalyticsRepositoryInterface;
use Illuminate\Support\Collection;

class AnalyticsRetriever implements AnalyticsRetrieverInterface
{
    /**
     * @var AnalyticsRepositoryInterface
     */
    protected AnalyticsRepositoryInterface $analyticsRepository;

    /**
     * @param AnalyticsRepositoryInterface $analyticsRepository
     */
    public function __construct(AnalyticsRepositoryInterface $analyticsRepository)
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
