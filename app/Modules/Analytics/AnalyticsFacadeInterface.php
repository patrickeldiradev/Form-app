<?php

namespace App\Modules\Analytics;

use Illuminate\Support\Collection;

interface AnalyticsFacadeInterface
{
    /**
     * @return Collection
     */
    public function getAnalytics(): Collection;
}
