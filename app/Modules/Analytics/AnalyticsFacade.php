<?php

namespace App\Modules\Analytics;

use App\Modules\Shared\Base\BaseFacade;
use Illuminate\Support\Collection;

/**
 * @method \App\Modules\Analytics\AnalyticsFactory getFactory()
 */
class AnalyticsFacade extends BaseFacade implements AnalyticsFacadeInterface
{
    /**
     * @param array $data
     * @return Collection
     */
    public function getAnalytics(array $data): Collection
    {
        return $this->getFactory()
            ->createAnalyticsRetriever()
            ->get($data);
    }
}
