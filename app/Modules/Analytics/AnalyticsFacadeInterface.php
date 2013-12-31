<?php

namespace App\Modules\Analytics;

use Illuminate\Support\Collection;

interface AnalyticsFacadeInterface
{
    /**
     * @param array $data
     * @return Collection
     */
    public function getAnalytics(array $data): Collection;
}
