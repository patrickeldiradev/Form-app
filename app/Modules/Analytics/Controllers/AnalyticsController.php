<?php

namespace App\Modules\Analytics\Controllers;

use App\Facades\AnalyticsFacadeHandler;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    public function getStatistics()
    {
        return AnalyticsFacadeHandler::getAnalytics();
    }
}
