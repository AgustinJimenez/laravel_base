<?php

Route::group(['middleware' => 'web', 'prefix' => 'templates', 'namespace' => 'Modules\Templates\Http\Controllers'], function()
{
    Route::get('/', 'TemplatesController@index');
});
