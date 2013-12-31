<?php

namespace App\Modules\Analytics\Controllers;

use App\Facades\AnalyticsFacadeHandler;
use App\Http\Controllers\Controller;
use App\Modules\Analytics\Requests\FindEndPointAnalyticsRequest;
use App\Modules\Analytics\Resources\AnalyticsResource;

/**
 * @method \App\Modules\Analytics\AnalyticsFacade getAnalytics()
 */
class AnalyticsController extends Controller
{
    /**
     * @param FindEndPointAnalyticsRequest $request
     * @return mixed
     */
    public function getStatistics(FindEndPointAnalyticsRequest $request)
    {
        return AnalyticsResource::collection(
            AnalyticsFacadeHandler::getAnalytics($request->validated())
        );
    }
}
