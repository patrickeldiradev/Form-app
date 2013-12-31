<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['middleware' => 'log'], function () {
        Route::post('form', 'FormsController@storeForm')->name('form.store');
        Route::get('form/{form:uuid}', 'FormsController@getForm')->name('form.get');
        Route::post('questionnaire', 'FormsController@storeQuestionnaire')->name('form.storeQuestionnaire');
    });

    Route::get('analytics', 'AnalyticsController@getStatistics')->name('analytics.getStatistics');
});
