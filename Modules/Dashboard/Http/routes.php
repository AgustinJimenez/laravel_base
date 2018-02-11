<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
    Route::get('/', 
    [
        'as' => 'admin.dashboard.index',
        'uses' => 'DashboardController@index'
    ]);
});
