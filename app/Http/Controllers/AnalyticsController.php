<?php

namespace App\Http\Controllers;

use App\Facades\AnalyticsFacadeHandler;

class AnalyticsController extends Controller
{
    public function getStatistics()
    {
        return AnalyticsFacadeHandler::getAnalytics();
    }
}
