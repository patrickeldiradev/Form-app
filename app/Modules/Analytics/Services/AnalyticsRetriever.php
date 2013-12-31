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
     * @param array $data
     * @return Collection
     */
    public function get(array $data): Collection
    {
        return $this->analyticsRepository->getAnalytics($data);
    }
}
