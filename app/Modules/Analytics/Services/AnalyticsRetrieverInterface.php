<?php

namespace App\Modules\Analytics\Services;

use App\Modules\Analytics\Repositories\AnalyticsRepository;
use App\Modules\Analytics\Repositories\AnalyticsRepositoryInterface;
use Illuminate\Support\Collection;

interface AnalyticsRetrieverInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function get(): Collection;
}
