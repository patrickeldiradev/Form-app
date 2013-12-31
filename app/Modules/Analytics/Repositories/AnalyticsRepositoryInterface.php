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
     * @return \Illuminate\Support\Collection
     */
    public function getAnalytics(): Collection;
}
