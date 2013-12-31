<?php

namespace App\Modules\Analytics\Controllers;

use App\Facades\AnalyticsFacadeHandler;
use App\Http\Controllers\Controller;
use App\Modules\Analytics\Requests\FindEndPointAnalyticsRequest;

/**
 * @method \App\Modules\Analytics\AnalyticsFacade getAnalytics()
 */
class AnalyticsController extends Controller
{
    public function getStatistics(FindEndPointAnalyticsRequest $request)
    {
        return AnalyticsFacadeHandler::getAnalytics();
    }
}
