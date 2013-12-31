<?php

namespace App\Modules\Analytics\Services;

use Illuminate\Support\Collection;

interface AnalyticsRetrieverInterface
{
    /**
     * @param array $data
     * @return Collection
     */
    public function get(array $data): Collection;
}
