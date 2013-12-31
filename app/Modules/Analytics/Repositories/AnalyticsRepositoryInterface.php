<?php

namespace App\Modules\Analytics\Repositories;

use App\Modules\Analytics\Mapper\RequestLogMapper;
use App\Modules\Analytics\Models\RequestLog;
use App\Modules\Analytics\QueryPipelines\SortByMethod;
use App\Modules\Analytics\QueryPipelines\SortByPath;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;

interface AnalyticsRepositoryInterface
{
    /**
     * @param array $data
     * @return Collection
     */
    public function getAnalytics(array $data): Collection;
}
